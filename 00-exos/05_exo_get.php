<?php require_once '../inc/functions.php';?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - EXO 5 - GIT</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">Exo 05 - La méthode GET</h1>
        <p class="">Votre compte - mise à jour ou suppression</p> 
        <hr class="my-4">
    </div>

    <!-- ============= Contenu principal ============ -->

    <main class="container-md">
        <div class="row">
        <div class="col-md-6 ">
                <a href="05_exo_get.php?action=modification">Modifier mon compte </a>
                <?php
                    // vérification de ce que je récupère en $_GET 1/ l'indice ET 2/ son contenu
                    // jevar_dump($_GET);
                    if ( isset($_GET['action']) && $_GET['action'] == 'modification') {// && indice ET contenu
                      echo "<p class=\"lead alert alert-warning\">Vous modifiez votre compte</p>";
                    }
                  ?>
          </div>
            <div class="col-md-6">
            <a href="05_exo_get.php?action=suppression">Supprimer mon compte </a>
            <?php
                    // jevar_dump($_GET);
                    if ( isset($_GET['action']) && $_GET['action'] == 'suppression') {
                      echo "<p class=\"lead alert alert-danger\">Vous supprimez votre compte</p>";
                    }
                  ?>
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