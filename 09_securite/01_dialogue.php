<?php 
    require_once '../inc/functions.php';

    //Connexion à la BDD
    $pdoDIAG = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', 
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
        ));

    //traitement du formulaire & insertion dans la BDD
    //ce formulaire n'est pas assez protégé contre les injection SQL !!! >>> ok'); DELETE FROM commentaire; ( Cette phrase peut supprimer toutes les données de la table)
    // if (!empty($_POST)) {
    //     $resultat = $pdoDIAG->query( "INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')" );
    //     // NOW() renvoie la date d'aujourd'hui ATTENTION dans l'exemple l'ordre "mélangé" des indices facilite l'injection SQL
    // }

    /**
     * pour supprimer les commentaires
     * //ok');DELETE FROM commentaire;(
    **/

    //Update -> Prepare
    if (!empty($_POST)) { //pour 
        //pour se prémunir des failles nous faisons ceci
        $_POST[ 'pseudo' ] = htmlspecialchars($_POST['pseudo']);
        $_POST[ 'message' ] = htmlspecialchars($_POST['message']);

        $resultat = $pdoDIAG->prepare( "INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES(:pseudo, NOW(), :message)" ); //NOW() renvoie la date d'aujoud'hui
       
        $resultat->execute ( array (
            ':pseudo' => $_POST[ 'pseudo' ],
            ':message' => $_POST[ 'message' ],
        ));
    }// fin du if (!empty($_POST))
    //le fait de mettre des marqueurs dans la requête permet de ne pas concaténer les instructions SQL d'origine et celles qui seraient injectées. Ainsi elles ne peuvent pas 'exécuter successivement. De plus, en liant les marqueurs à leur valeur dans execute(), PDO les neutralise automatiquement et les transforment en chaînes de caractères inoffensifs.
    
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
        <div class="row p-3">
            <div class="col-sm-12 col-md-6 col-lg-6">
            <!-- il faut faire un formulaire HTML avec action et method ACTION reste vide si nous insérons grâce à cette même page. Et POST va envoyer les infos du from dans la superglobale $_POST-->
                <form action="" method="post">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo" id="pseudo" value="">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" rows="3" id="message" value></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Envoyer</button>
                    </div>
                </form>
            </div>
            <!-- fin col -->
            <div class="col-sm-12 col-md-6 col-lg-6 alert alert-success">
                <p>Création d'une BDD "dialogue" avec les informations suivantes</p>
                <ul class="">
                    <li>Nom de la BDD : dialouge</li>
                    <li>Nom de la table : commentaire</li>
                    <li>La table contient les champs suivants :
                        <ul><li>id_commentaire INT PK AI</li>
                            <li>pseudo : VARCHAR(20)</li>
                            <li>message : TEXT</li>
                            <li>date_enregistrement : DATETIME</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- fin row -->

        <div class="row">
            <div class="col-sm-12">
                <!-- EXO  compter les commentaires-->
                <?php
                   /**
                    *  $resultat = $pdoDIAG->query("SELECT * FROM commentaire");
                    $commentaire = $resultat->rowCount();
                    // jeVarDump($resultat);

                    echo "<table class=\"table table-bordered \">";
                    echo "<thead class=\"thead-dark\">";
                    echo "<tr>";
                        echo "<th scope=\"col\">#</th>";
                        echo "<th scope=\"col\">Pseudo</th>";
                        echo "<th scope=\"col\">Date</th>";
                        echo "<th scope=\"col\">Message</th>";
                    echo "</tr>";
                    echo "</thead>";

                    while ($commentaire = $resultat->fetch(PDO ::FETCH_ASSOC)) {                        
                        echo "<tr>";
                            echo "<td>". $commentaire['id_commentaire']. "</td>";
                            echo "<td>" .$commentaire['pseudo']. "</td>";
                            echo "<td>" .date('d/m/Y', strtotime($commentaire['date_enregistrement'])). " </td>";
                            // echo "<td>" .$commentaire['date_enregistrement']. "</td>";
                            echo "<td>" .$commentaire['message']. "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    */
                ?>
            </div>
        </div>
        <!-- fin row -->

        <!-- PISOLA --> 
        <div class="row">
            <div class="col-sm-12">
                <?php 
                    // Affichage des commentaires avec query et boucle while et compter les enregistrements de la table
                    $resultat = $pdoDIAG->query( " SELECT * FROM commentaire " );
                    // jeprint_r($resultat->rowCount());
                    $nbr_commentaires = $resultat->rowCount();// je compte les résultats et je passe le total dans une nouvelle variable
                ?> 
                <h5 class="alert alert-success">Il y a <?php echo $nbr_commentaires;// je compte les résultats ?> commentaires</h5>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Message</th>
                            <th scope="col">Date d'enregistrement</th>
                        </tr>
                    </thead>
                    <?php 
                        while ( $commentaire = $resultat->fetch( PDO::FETCH_ASSOC ) ) { ?>
                          <tr>
                              <td><?php echo $commentaire['id_commentaire']; ?></td>
                              <td><?php echo $commentaire['pseudo']; ?></td>
                              <td><?php echo $commentaire['message']; ?></td>
                              <td><?php echo $commentaire['date_enregistrement']; ?></td>
                          </tr>
                    <?php } ?> 
            </table>
            </div>
        </div>

    </main>
    <!-- fin container -->

    <?php require '../inc/footer.inc.php'; ?>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>