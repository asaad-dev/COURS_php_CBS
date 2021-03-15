<?php require_once '../inc/functions.php';?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - Les tableaux</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">Exo 02 - Les tableaux</h1>
        <p class="lead"></p>
        <hr class="my-4">
    </div>

    <!-- ============= Contenu principal ============ -->

    <main class="container-md">
        <div class="row">
            <div class="col-sm-12">
            
                <?php

                    //déclaérer un tableau, les valeurs du tableau sont indiqués dans les ()
                
                    $tableau1 = array("Dalio", "Gabin", "Arlety", "Fernandel", "Pauline Carton");

                    //echo $tableau1; erreur de type "array to string convertsion" on ne peut afficher directement un tableau

                    echo "<pre>"; //pour mieux afficher et mieux lire
                    var_dump($tableau1); //var_dump affiche le contenu du tableau
                    echo "</pre>";
                
                    echo "<pre>";
                    print_r($tableau1); //print_r affiche sans les types
                    echo "</pre>";

                    //autre façon de déclarer un array
                    $tableau2 = ['France', 'Espagne', 'Italie', 'Pourtugal'];
                    
                    $tableau2[] = 'Roumanie'; //ajouter un élément dans notre tableau avec des crochets

                    echo "<pre>";
                    var_dump($tableau2);
                    echo "</pre>";

                    // datejour();
                    jeVarDump($tableau1);
                    jePrintr($tableau1);

                    //mini exo avec une boucle foreach parcourrez les deuu tableau de cette page et affichez-les  dans deu ul
                    echo "<ul class=\"w-50 bg-info\">";
                    //on parcourt le tableau $tableau1 par ses valeurs la variable $acteur prend les valeurs du tableau sccessivement à chaque tour de boucle, le mot clef "as" est obligatoire
                    foreach ($tableau1 as $acteur) {
                    echo "<li>" .$acteur. "</li>";
                    }
                    echo "</ul>";

                    echo "<ul class=\"w-50 bg-dark\">";
                    foreach ($tableau1 as $pays) {
                    echo "<li class=\"text-white\">" .$pays. "</li>";
                    }
                    echo "</ul>";

                    // jeVarDump($pays)
                    //la boucle foreach pour parcourir les indices et les valeurs dans une ul
                    echo "<ul>";
                    foreach($tableau1 as $indice => $acteur) { //la boucle parcourt cette fois-ci les indices et les valeur d'abord les indices dans une variable $ indice =>x puis les valeurs
                        echo "<li>Pour $indice, la valeur est $acteur</li>";
                    }
                    echo "</ul>";


                    //mini exo
                    //1- déclarez un tableau associatif $contacts avec les indices suivants : prenom, nom email et téléphone et vous y mettez les valeurs correspondant à un seul contact.
                    $contacts = array(
                        'prenom' => 'David',
                        'nom' => 'Hugo',
                        'email' => 'davidhuggo@gamil.com',
                        'telephone' => '06 25 84 52',
                    );
    
                    //2- puis avec une boucle foreach vous affichez le valeur
                    echo "<ul class=\"w-50 bg-primary\">";
                     foreach ($contacts as $valeur) {
                        echo "<li class=\"text-white\">$valeur</li>";
                    }
                    echo "</ul>";
                    echo "<hr>";

                    //3- puis dans une autre boucle vous affichez les valeurs dans des p sauf le prénom qui doit être dans un h3
                    //#3- avec FOREACH
                    echo "<ul>";
                    foreach ($contacts as $indice => $valeur) {
                        echo "<li>Pour $indice  La valeur est : $valeur </li>";
                    }
                    echo "</ul>";

                    //3- avec IF ... ELSE
                    foreach ($contacts as $indice => $valeur) {
                        if($indice == "nom" || $indice == "prenom") {
                            echo "<h3>$valeur</h3>";
                        } else {
                            echo "<p>$valeur</p>";
                        }
                    }
                    
                    //3- avec SWITCH
                    foreach ($contacts as $key => $value) {
                        switch ($key) {
                            case 'nom' :
                              echo "<p>pour le ".$key ." la valeur est : ". $value."</p>";
                                break ;
                            case 'prenom' :
                                echo "<h3>pour le ".$key ." la valeur est : ". $value."</h3>";
                                break ;
                            case 'email' :
                              echo "<p>pour le ".$key ." la valeur est : ". $value."</p>";
                              break ;
                            case 'telephone' :
                                echo "<p>pour le ".$key ." la valeur est : ". $value."</p>";
                                break ;
                         }
                     }




                ?>
            </div>

            <div class="col-sm12">
               
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