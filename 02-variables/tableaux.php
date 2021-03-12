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
                <p>texte à venir</p>
                <blockquote>

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
                ?>
            </div>

            <div class="col-sm12"></div>
           
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