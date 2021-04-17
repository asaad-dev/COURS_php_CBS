<?php 
    require_once '../inc/functions.php';

    //Connexion à la BDD
    $pdoENT = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', 
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
        ));

        //les fonctions 
        require_once '../inc/functions.php';

    //traitement du formulaire
    if (!empty($_POST)) {
        $_POST[ 'prenom' ] = htmlspecialchars($_POST['prenom']);
        $_POST[ 'nom' ] = htmlspecialchars($_POST['nom']);
        $_POST[ 'sexe' ] = htmlspecialchars($_POST['sexe']);
        $_POST[ 'date_embauche' ] = htmlspecialchars($_POST['date_embauche']);
        $_POST[ 'salaire' ] = htmlspecialchars($_POST['salaire']);

        $resultat = $pdoENT->prepare( "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES(:prenom, :nom, :sexe, :service, :date_embauche, :salaire)" ); //NOW() renvoie la date d'aujoud'hui
       
        $resultat->execute ( array (
            ':prenom' => $_POST[ 'prenom' ],
            ':nom' => $_POST[ 'nom' ],
            ':sexe' => $_POST[ 'sexe' ],
            ':service' => $_POST[ 'service' ],
            ':date_embauche' => $_POST[ 'date_embauche' ],
            ':salaire' => $_POST[ 'salaire' ],
        ));
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

    <title>Cours PHP 7 - Dialogue</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">Cours PHP 7 - Sécurité & PHP</h1>
        <p class="lead"></p> 
        <hr class="my-4">
    </div>
    <!-- ============= Contenu principal ============ -->
    <main class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped table-success">
                   <thead class="thead-dark">
                     <tr>
                        <th scope="col">Nom et prénom</th>
                        <th scope="col">ID</th>
                        <th scope="col">Service</th>
                        <th scope="col">Date d'embauche</th>
                        <th scope="col">Salaire</th>
                        <th scope="col">Voir</th>
                     </tr>
                   </thead>
                   <tbody> 
                     <?php
                        $requete = $pdoENT->query("SELECT * FROM employes");
                        $nbr_employes = $requete->rowCount();

                        foreach ( $pdoENT->query( " SELECT * FROM employes ORDER BY sexe DESC, nom ASC " ) as $infos ) { 
                        echo "<tr>";
                        echo "<td>";
                        if ( $infos['sexe'] == 'f') {
                              echo "<span class=\"badge badge-secondary\">Mme ";
                        } else {
                              echo "<span class=\"badge badge-warning\">M. ";
                        } echo $infos['nom']. " " .$infos['prenom']. "</span></td>";
                        echo "<td>" .$infos['id_employes']. "</td>";
                        echo "<td>" .$infos['service']. " </td>";
                        echo "<td>" .date('d/m/Y', strtotime($infos['date_embauche'])). " </td>";
                        $nombre_format_francais = number_format($infos['salaire'], 2, ',', ' ');
                        echo "<td>" .$nombre_format_francais. " €</td>";
                        echo "<td><a href=\"02_fiche_employes.php?id_employes=".$infos['id_employes']. "\">Voir sa fiche</a></td>";
                        echo "</tr>";
                        }
                     ?>
                  </tbody>
                </table>
            </div>
        </div>
        <!-- fin tableau -->
        <!-- formulaire -->
        <div class="row  p-3">            
            <div class="container col-8 border bordered p-5 shadow">
                <form action="" method="post">  
                    <div class="form-group">
                        <label for="pseudo">Prénom</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" value="">
                    </div>
                    <div class="form-group">
                        <label for="pseudo">Nom</label>
                        <input type="text" class="form-control" name="nom" id="nom" value="">
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label pr-3 py-3" for="sexe" >Sexe :</label>
                        <input class="form-check-input" type="radio" name="sexe" id="sexe" value="m">
                        <label class="form-check-label" for="inlineRadio1">Homme</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" id="sexe" value="f">
                        <label class="form-check-label" for="inlineRadio2">Femme</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Service</label>
                        
                        <select name="service" id="service" class="custom-select">
                            <option selected>Choisir le service</option>
                            <option value="commercial">Commercial</option>
                            <option value="juridique">Juridique</option>
                            <option value="informatique">Informatique</option>
                            <option value="communication">Communication</option>
                            <option value="secretariat">Secrétariat</option>
                            <option value="production">Production</option>
                            <option value="comptabilite">Comptabilité</option>
                            <option value="direction">Direction</option>
                       </select>
                       <!-- avec PHP -->
                       <?php
                            // $requete = $pdoENT->query("SELECT * FROM employes ORDER BY service");
                            // $nbr_services = $requete->rowCount();
                        
                            // //avec select
                            // echo "<label for=\"service\">Service</label><select class=\"form-control  mb-4\">";
                            // foreach ($requete as $indice => $nbr_services) {
                            // echo "<option value=\"$nbr_service\">" .$nbr_services. "</option>";
                            // }
                            // echo "</select>";

                            // // echo "<label for=\"service\">Service</lable><select name=\"service\">";
                            // // while($requete == $nbr_services) {
                            // //     echo  "<option value=\"$requete\">" .$requete. "</option>";
                            // //     $requete++;
                            // // }
                            // // echo "</select>";
                       ?>
                    </div>

                    <div class="form-group">
                        <label for="date_embauche">Date d'embauche</label>
                        <input type="date" class="form-control" name="date_embauche" id="date_embauche" value="">
                    </div>
                    
                    <div class="form-group">
                        <label for="salaire">Salaire</label>
                        <input type="text" class="form-control" name="salaire" id="salaire" value="">
                    </div>
                    
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Envoyer</button>
                    </div>
                
                </form>
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