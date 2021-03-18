<?php require_once '../inc/functions.php';?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - La méthode GET</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">Exo 02 - La méthode GET</h1>
        <p class="lead">$_GET[ ] représente les données qui transitent par l'URL</p>
        <hr class="my-4">
    </div>

    <!-- ============= Contenu principal ============ -->

    <main class="container-md">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2>$_GET[ ]</h2>
                <p>Il s'agit d'une superglobale et comme toutes les superglobales, c'est un taableau.</p>
                <p>superglobales signifie que cette variable est disponible partout dans le script, y compris au sein des fonctions.</p>
                <p>Les informations transitient dans l'url selon la syntaxe suivante <code>mapage.php?indice1=valeur1&indiceN=valeurN</code></p>
                <p>Et enfin quand on récupère les données, $_GET [ ] se remplit selon le chéma suivant : <code>$_GET = array('indice1' => 'valeur1', 'indiceN' => 'valeurN');</code></p>
            </div>
            <!-- fin col -->
               
            <div class="col-sm-12 col-md-6">
                <!-- à partir du ? on envoie des information via l'url à la page 02_method_get.php et elles sont receptionnée par la superglobale -->
                <a href="02_method_get.php?article=jean&couleur=belu&prix=55">Jean bleu</a> -
                <a href="02_method_get.php?article=robe&couleur=rouge&prix=75">Robe rouge</a> -
                <a href="02_method_get.php?article=pull&couleur=blanc&prix=45">Pull blanc</a> 
            
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