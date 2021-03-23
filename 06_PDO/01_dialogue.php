<?php require_once '../inc/functions.php';?>
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
            <div class="col-sm-12">
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

                <?php
                    $pdoDIAL = new PDO('mysql:host=localhost;dbname=dialogue', 
                    'root',
                    '', 
                    array(
                         PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
                         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
                    ));
                      
                    // $requete = $pdoDIAL->query("SELECT * FROM commentaire");
                    // jeVarDump($requete);
                ?>
            </div>
        </div>
        <!-- fin row -->
        <div class="row">
            <div class="col-sm-12">
                <!-- EXO  compter les commentaires-->

                <?php
                    $resultat = $pdoDIAL->query("SELECT * FROM commentaire ");
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
                            echo "<td>" .$commentaire['date_enregistrement']. "</td>";
                            echo "<td>" .$commentaire['message']. "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
                
                
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