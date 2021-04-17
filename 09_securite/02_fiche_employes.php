<?php 
    require_once '../inc/functions.php';

    //Connexion à la BDD
    $pdoENT = new PDO('mysql:host=localhost;dbname=entreprise', 
                    'root',
                    '', //si vous êtes sur MAC il y un mdp = 'root'
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
        ));

    //les fonctions 
    require_once '../inc/functions.php';

    //traitement des infos reçu par $_GET
    //as-t-on reçu infos par $_GET
    // jePrintr($_GET);

    if (isset($_GET['id_employes'])) { //si existe l'indice "id_employes" dans $_GET, dans l'URL, c'est qu'on a demandé le détail d'un emplyé.
        // jePrintr($_GET);
        $resultat = $pdoENT->prepare( "SELECT * FROM employes WHERE id_employes = :id_employes" );
        $resultat->execute(array(
            ':id_employes' => $_GET['id_employes'] //on associe le marqueur vide à l'id_employes qui provient d l'url
        ));
        // jePrintr($resultat);
        // jePrintr($resultat->rowCount());
        if ($resultat->rowCount() == 0) { //si il y a 0 ligne dans $resultat c'est que l'id n'existe pas 
         header( 'location:02_employes.php' ); // on redirige vers une autre page
         exit(); //on arrête le script
     }
        
        $fiche = $resultat->fetch( PDO::FETCH_ASSOC );
        // jePrintr($fiche);
 
    } else { //sinon c'est que l'on a pas demandé un employé en particulier en arrivant sur cette 
        header( 'location:02_employes.php' );
        exit();
    }
        
    //traitement de mise à jour du formulaire
    if (!empty($_POST)) {
        $_POST[ 'prenom' ] = htmlspecialchars($_POST['prenom']);
        $_POST[ 'nom' ] = htmlspecialchars($_POST['nom']);
        $_POST[ 'sexe' ] = htmlspecialchars($_POST['sexe']);
        $_POST[ 'service' ] = htmlspecialchars($_POST['service']);
        $_POST[ 'date_embauche' ] = htmlspecialchars($_POST['date_embauche']);
        $_POST[ 'salaire' ] = htmlspecialchars($_POST['salaire']);
       
        //Update BDD
        $resultat = $pdoENT->prepare(" UPDATE employes SET  prenom = :prenom, nom = :nom, sexe = :sexe, service = :service, date_embauche = :date_embauche, salaire = :salaire WHERE id_employes = :id_employes");

        $resultat->execute ( array (
            ':prenom' => $_POST[ 'prenom' ],
            ':nom' => $_POST[ 'nom' ],
            ':sexe' => $_POST[ 'sexe' ],
            ':service' => $_POST[ 'service' ],
            ':date_embauche' => $_POST[ 'date_embauche' ],
            ':salaire' => $_POST[ 'salaire' ],
            ':id_employes' => $_GET[ 'id_employes' ],
        ));
        header( 'location:02_employes.php');
        exit();
    }// fin du if (!empty($_POST))
    
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Coursn PHP 7 - Fiche employé <?php echo $fiche['id_employes'];?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">Fiche de l'employé n° <?php echo $fiche['prenom']. " " .$fiche['nom'];?></h1>
        <p class="lead">Contrôle et modification d'un employé</p> 
        <hr class="my-4">
    </div>
    <!-- ============= Contenu principal ============ -->
    <main class="container">
        <div class="row  p-3">
            <div class="col-sm-12 col-md-4">
                <div class="card border-success" style="width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title alert alert-success"> <?php echo $fiche['prenom']. " " .$fiche['nom']; ?> </h4>
                        <p class="card-text alert alert-warning "><?php echo "Service :". " " .$fiche['service']. "<br>Salaire :". " "  .$fiche['salaire']. " €"."<br>Date d'embauche :". " " .date('d/m/Y', strtotime($fiche['date_embauche'])) ; ?></p>
                    </div>
                </div>
                <!-- fin card --> 
            </div>
            <!-- fin col -->
            <div class="container col-8 border bordered p-5 shadow rounded">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="pseudo">Prénom</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $fiche['prenom']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pseudo">Nom</label>
                        <!-- if (isset($_POST['nom']) { echo "..."; } else { echo '';}) si il n'y a rien je mets une chaîne vide : opérateur de coalescence-->
                        <!-- cette opérateur avec $_POST['nom'] et if isset else "résumé" avec l'opérateur de coalescence sera utile si on utilise un seul formulaire pour INSERT et UPDATE-->
                        <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $fiche['nom'] ?? ''; ?>">
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label pr-3 py-3" for="sexe" >Sexe :</label>
                        <!-- pour les boutons radio le 1er bouton sera "checked" es le second le sera si on a l'info du sexe et si cette info est égale à "f" -->
                        <input type="radio" name="sexe" value="m" checked class="mx-2"> Homme
                        <input class="mx-2" type="radio" name="sexe" value="f"<?php if (isset($fiche['sexe']) && $fiche['sexe'] =='f') echo 'checked'; ?>> Femme    
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Service</label>
                        <select id="service" class="form-control" name="service" value="<?php echo $fiche['service']; ?>">
                            <!-- <option selected>Sélectionnez le service</option> -->
                            <option value="assistant" <?php if(!(strcmp("assistant", $fiche['service']))) {echo " selected";} ;?>>assistant</option>
                            <option value="commercial" <?php if(!(strcmp("commercial", $fiche['service']))) {echo " selected";} ;?>>commercial</option>
                            <option value="comptabilite" <?php if(!(strcmp("comptabilite", $fiche['service']))) {echo " selected";} ;?>>comptabilite</option>
                            <option value="communication" <?php if(!(strcmp("communication", $fiche['service']))) {echo " selected";} ;?>>communication</option>
                            <option value="direction" <?php if(!(strcmp("direction", $fiche['service']))) {echo " selected";} ;?>>direction</option>
                            <option value="informatique" <?php if(!(strcmp("informatique", $fiche['service']))) {echo " selected";} ;?>>informatique</option>
                            <option value="juridique" <?php if(!(strcmp("juridique", $fiche['service']))) {echo " selected";} ;?>>juridique</option>
                            <option value="production" <?php if(!(strcmp("production", $fiche['service']))) {echo " selected";} ;?>>production</option>
                            <option value="secretariat" <?php if(!(strcmp("secretariat", $fiche['service']))) {echo " selected";} ;?>>secretariat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_embauche">Date d'embauche</label>
                        <input type="date" class="form-control" name="date_embauche" id="date_embauche" value="<?php echo $fiche['date_embauche']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="salaire">Salaire</label>
                        <input type="text" class="form-control" name="salaire" id="salaire" value="<?php echo $fiche['salaire']; ?>">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Envoyer</button>
                    </div>
                </form>
                <!-- fin formulaire -->
            </div>
        </div>
        <!-- fin row -->
    </main>
    <!-- fin container -->

    <?php require '../inc/footer.inc.php'; ?>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>