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
        <h1 class="display-4">Cours PHP 7 - Les tableaux</h1>
        <p class="lead">Les tableaux représentent un type composé car ils permettent de stocker sous un même nom de variable plusieurs valeurs indépendantes d'un des types de base que vous venez de voir. C'est comme un tiroir divisé en compartiments. Chaque compartiment, que nous nommerons un élément du tableau, est repéré par un indice numérique (le premier ayant par défaut la valeur 0 et non 1). D'où l'expression de tableau indicé.</p>
        <hr class="my-4">
    </div>

    <!-- ============= Contenu principal ============ -->

    <main class="container-md">
        <div class="row">
            <div class="col-sm-12">
                <h2>1- Les tableaux</h2>
                <p>Un tableau applé array en anglais est une variable améliorée dans laquelle on stocke une multitude de valeurs. Ces valeurs peuvent être de n'importe quel type. Elles possdent un indice dont la numérotation commence à 0.</p>
                <blockquote>
                    <p>déclaérer un tableau, les valeurs du tableau sont indiqués dans les ()</p>
                    <code>$tableau1 = array("Dalio", "Gabin", "Arlety", "Fernandel", "Pauline Carton");</code>

                </blockquote>
                <?php 
                    $tab[0] = 2004; // la variable $tab est un taableau par le simple fait que son nom est suivi de crochets
                    $tab[1] = 31.14E7;
                    $tab[2] = "PHP 7";
                    $tab[35] = $tab[2]. " et MySQL"; // les éléments indicés entre 2 et 35 n'exsitent pas
                    $tab[] = "coucou"; // il mettra 36 : avntage ajouter un élément à la fin d'un tableau sans connaître la valeur du premier indice disponible

                    echo "Nombre d'éléments du tableaux ". count($tab);
                    echo "<hr><p> La langage préféré de l'open source est $tab[2] <br>";
                    echo "Utilisez $tab[35]</p>";

                    // jeVarDump($tab);
                    // jePrintr($tab);
                    
                    // echo "<pre>";
                    // print_r($tab);
                    // echo "</pre>";
                ?>
            </div>

            <div class="col-sm-12 col-md-6">
                <h2>Les tableaux associatifs</h2>
                <p>Dans un tableau associatif nous pouvons choisir le nom des indices ou des index, c'est-à-dire que nous asscions un indice crée par nous à sa valeur</p>

            <?php

                $couleurs = array(
                    'b' => 'bleu',
                    'b1' => 'blanc',
                    'r' => 'rose',
                );

                jeVarDump($couleurs);
                //pour afficher une valeur de notre tableau associatif
                echo '<p> La première couleur du tableau est' .$couleurs['b']. '</p>';  // dans des quotes il prend des quotes autour de son indice 
                echo "<p> La première couleur du tableau est $couleurs[b]</p>"; //dans des guillemets il y a une exception, l'indice ne prend plus de quotes ... VOIR

                //mini exo compter le nombre d'élément du tableau
                echo "Nombre d'éléments dans le tableau \$couleurs : " .count($couleurs). "</p>";
                echo "Nombre d'éléments dans le tableau \$couleurs : " .sizeof($couleurs). "</p>";
            ?>
            </div>

            
            <div class="col-sm-12 col-md-6">
                <h2>Les tableaux multi-dimensionnels</h2>
                <p>Un tableau mutli-dimensionne est un tableau qui contiendra une suite de tableau. Chaque tableau présente une "dimension".</p>

                <?php
                    $tableau_multi = array(
                        0 => array(
                            'prenom' => 'Jean',
                            'nom' => 'Dujardin',
                            'telephone' => '01 25 26 36 99'
                        ),
                        1 => array(
                            'prenom' => 'Alexandra',
                            'nom' => 'Lamy',
                            'telephone' => '01 25 26 36 99'
                        ),
                        2 => array(
                            'prenom' => 'John',
                            'nom' => 'Wayne',
                            'telephone' => '01 25 26 36 99'
                        ),
                    );

                    jeVarDump($tableau_multi);

                    //echo "Jean"
                    echo $tableau_multi[0]['prenom']. "<hr>"; //pour afficher Jean on entre d'bord l'indice 0 puis dans le sou-tableau on va à l'indice prenom

                    //pour parcourir le tableau multi-dimensioonel on peut faire une boucle for car ses indices sont numériques
                    echo "<ul>";
                    for ($i=0; $i < count($tableau_multi); $i++) {
                        echo "<li>".$tableau_multi[$i]['prenom']. " " .$tableau_multi[$i]['nom']. "</li>";
                    }
                    echo "</ul>";


                    echo M_PI;
                   


                ?>
            </div>
            <!-- fin col -->
           
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