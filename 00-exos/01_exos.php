<?php
    require_once '../inc/functions.php';
    
    $chaine = "Longtemps je me suis couché ... dans le temps";
    $decimal = "18.74";
    $entier = 500;
    $lib = "liberté";
    $egal = "Egalité";
    $frat = "fraternité";
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Cours PHP 7 - Exos pratiques</title>
</head>
<body>
    <div class="container-md bg-info">
        <div class="row p-5">
            <h1 class="text-white text-center">EXOS PRATIQUE !</h1>
            <?php 
                mnPap();
                echo "<hr>";
            
                dateDuJourEn();
                dateDuJourFr();
                echo "<hr>";

                //cette fonction permet d'analyser dans le navigateur le contenu et le type d'une variable et dans donner la longueur si c'est une string
                var_dump($chaine);

                echo "<hr>";

                print_r("Affiche du contenu avec la fonction print_r");

                // gettype()
                echo gettype($chaine);

                echo "<hr>";
                //mini exo ecrire la phrase suivante la devise de la république est liberté, fraternité (mettre les termes en variables)
                echo "<p>La devise de la république est \"$lib, $egal, $frat\".</p>";

                //mini exo if else si le prix est supérieur à 100 eurs la remise est de 10% sinon la remise est 5% et donnez le montant du prix net 
                echo "<p class=\"alert alert-success\">";
                // $prix = 55;
                // $discount1 = 0.05;
                // $discount2 = 0.1;
                // $_cinqpourcent = $prix * $discount1;
                // $_dixpourcent = $prix * $discount2;

                // if($prix > 100) {
                //     echo "Vous aurez une remise de $_dixpourcent";
                // } else {
                //     echo "Vous avez une remise de $_cinqpourcent"; 
                // }

                $prix = 500;
                $remise50 = $prix * 0.5;
                $remise10 = $prix * 0.9;
                $remise5 = $prix * 0.95;

                //$remise28 = $prix * (28/100);

                if($prix > 100) {
                    echo "Pour un achat de $prix Vous avez une remise de 10% : GRR net = $remise10 €.";
                } else {
                    echo "Pour un achat de $prix Vous avez une remise de 10% : GRR net = $remise5 €.";
                }
                echo "</p>";
                echo "<hr>";


                //exo
                // Si vous achetez un pc à plus de 1000 euros, la remise est de 15%
                // pour un PC de 1000 euros et moins la remise est de 10%
                // si c'est un livre la remise est de 5%
                // pour tous les autres articles articles, la remise est de 2%
                //SI c'est un PC SI le prix est sup ou égal à 1000, la remise est de 15%, SINON la remise est de 10% SINON SI c'est un livre la remise est de 5% SINON c'est autre chose (qu'un PC ou un livre) la remise est de 2%

                $cat = "PC";
                $prix = 500;
                if ($cat == "PC") {
                    if ($prix >= 1000) {
                    echo "Prix du produit $prix € : la remise est de 15% : prix net de votre commande : " .$prix*0.85. " €" ;
                    } else {
                    echo "Prix du produit $prix € : la remise est de 10% : prix net de votre commande : " .$prix*0.90. " €";
                    } 
                }
                else if ($cat == "Livre") {
                    echo "Prix du produit $prix € : livre remise 5% : prix net de votre commande : " .$prix*0.95. " €";
                    } else {
                    echo "Prix du produit $prix € : remise 2 % : prix net de votre commande : " .$prix*0.98. " €";
                    }
                        

                //autre
                // $achat = "livre";
                //     $prixAchat = 1200;
                //     $remise15 = $prixAchat*0.85;
                //     $remise10 = $prixAchat*0.9;
                //     $remise5 = $prixAchat*0.95;
                //     $remise2 = $prixAchat*0.98;
                    
                //     if ($achat == 'PC'){
                //         if($prixAchat > 1000){
                //           echo "Vous avez acheté un PC à $prixAchat €, vous bénéficiez donc d'une remise de 15%. Vous paierez $remise15 €";
                //         }else {
                //           echo "Vous avez acheté un PC à $prixAchat €, vous bénéficiez donc d'une remise de 10%. Vous paierez $remise10 €";
                //         }
                //       }elseif ($achat == 'livre'){
                //         echo "Vous avez acheté un livre à $prixAchat €, vous bénéficiez donc d'une remise de 5%. Vous paierez $remise5 €";
                //       }else {
                //         echo "Vous avez acheté un produit à $prixAchat €, vous bénéficiez donc d'une remise de 2%. Vous paierez $remise2 €";
                //       }
                echo "<hr>";

                /**
                 * Vendredi 12/03
                 * 
                 * Les boucles
                 */

                // boucles WHILE
                //les boucles sont destinées à répeter du code de façon  automatique 
                $i = 0;
                while($i < 25) { // tant que c'est inférieur à 25 on incrémente $i
                    echo $i. " **";
                    $i++;
                }
                echo "<hr>";

                //mini exo 5
                //dans une boucle faire les options d'un élément select en démarrant à 1920 et en s'arrêtant 2021

                $annee = 1920;
                echo "<label for=\"annee\">Année</lable><select name=\"annee\">";
                while($annee <= 2021) {
                    echo  "<option value=\"$annee\">" .$annee. "</option>";
                    $annee++;
                }
                echo "</select>";

                echo "<hr>";

                //mini exo 6 
                //la même chose à rebours

                $annee2 = 2021;
                echo "<label for=\"annee\">Année</lable><select name=\"annee\">";
                while($annee2 >= 1920) {
                    echo  "<option value=\"$annee2\">" .$annee2. "</option>";
                    $annee2--;
                }
                echo "</select>";

                echo "<hr>";

                //DO WHILE
                
               $chamalow = 0; // valeur de la boucle

               //do while
                do {
                    echo "<p>Je fais un petit tour de boucle.</p>";
                    $chamalow++;
                    // var_dump($chamalow);
                } 
                while ($chamalow > 10); // la condition renvoie FALSE tout de suite, pourtant la boucle a trouvé une fois !
                echo "<hr>";

                //mini exo 7
                //si la variable $langue contient espagnol vous dites hola, si c'est anglais vous dites hello si c'est fr bonjour
               echo "<pre>";
                $langue = "fr";
                switch ($langue) {
                    case "es":
                        echo "Hola!";
                        break;

                    case "en":
                        echo "Hello !";
                        break;

                    case "fr":
                        echo "Bonjour !";
                        break;
                }
                echo "<hr>";
                //Avec if
                if ($langue == "es") {
                    echo "Bonjour !";
                } elseif ($langue == "en") {
                    echo "Hello";
                } elseif ($langue == "es") {
                    echo "Hola !";
                } else {
                    echo "langue inconnue";
                }
                echo "</pre>";

                //la boucle FOR
                //afficher les mois de 1 à 12 à l'aide d'une boucle for dans un menu déraluant

                // $mois = 12;
                echo "<label for=\"mois\">Les mois</lable><select>";

                for($mois = 1; $mois <= 12; $mois++) {
                    echo  "<option>" .$mois. "</option>";
                }
                echo "</select>";
                echo "<br>";

                //mini exo
                //faire une boucle for qui affiche 0 à  9 sur la même ligne
                //compléter cette boucle pour mettre les chiffres dans un tableau HTML 
                //création d'un autre tableau
                echo "<table class=\"table\"> <tr>";
                for ($i = 0; $i <= 9; $i++) {
                   echo "<td>" .$i. "</td>"; 
                }
                echo "</tr></table>";
            ?>
           
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>