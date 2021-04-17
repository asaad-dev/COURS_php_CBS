<?php 
    require_once '../inc/functions.php';

    //Connexion à la BDD
    $pdoBIBLI = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', 
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
        ));

   //les fonctions 
   require_once '../inc/functions.php';

    //traitement du formulaire -> AJOUTER
    if (!empty($_POST)) {
        $_POST[ 'auteur' ] = htmlspecialchars($_POST['auteur']);
        $_POST[ 'titre' ] = htmlspecialchars($_POST['titre']);

        $resultat = $pdoBIBLI->prepare( "INSERT INTO livre (auteur, titre) VALUES(:auteur, :titre)" ); 
       
        $resultat->execute( array (
            ':auteur' => $_POST[ 'auteur' ],
            ':titre' => $_POST[ 'titre' ],
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" 
    crossorigin="anonymous">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>CRUD - bibliotheque</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">CRUD - Exo - Bibliotheque</h1>
        <p class="lead"></p> 
        <hr class="my-4">
    </div>
    <!-- ============= Contenu principal ============ -->
    <main class="container">
        <div class="row">
            <div class="col">
                <?php
                    $requete = $pdoBIBLI->query("SELECT * FROM livre");
                    $nbr_livres = $requete->rowCount();
                    echo "<table class=\"table table-striped  \">";
                    echo "<thead class=\"thead-dark\">";
                    echo "<tr>";
                        echo "<th scope=\"col\">ID</th>";
                        echo "<th scope=\"col\">Auteur</th>";
                        echo "<th scope=\"col\">Titre</th>";
                        echo "<th scope=\"col\">Voir</th>";
                    echo "</tr>";
                    echo "</thead>";

                    foreach ( $pdoBIBLI->query( " SELECT * FROM livre " ) as $infos ) {
                    echo "<tr>";
                    echo "<td>" .$infos['id_livre']. " </td>";
                    echo "<td>" .$infos['auteur']. " </td>";
                    echo "<td>" .$infos['titre']. " </td>";
                    echo "<td><a href=\"01_livre.php?id_employes=".$infos['id_livre']. "\">Voir un livre</a></td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                ?>
            </div>
        </div>
        <!-- fin tableau -->
        <!-- formulaire -->
        <div class="row  p-3">            
            <div class="container col-8 border bordered p-5 shadow">
                <form action="" method="post">  
                    <div class="form-group">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" name="titre" id="titre" value="">
                    </div>
                        <label for="titre">Auteur</label>
                        <input type="text" class="form-control" name="auteur" id="auteur" value="">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Ajouter</button>
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