<?php 
    require_once '../inc/functions.php';

    //Connexion à la BDD
    $pdoBIBLI = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', 
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
        ));

        if (isset($_GET['id_livre'])) { 
         $resultat = $pdoBIBLI->prepare( "SELECT * FROM livre WHERE id_livre = :id_livre" );
         $resultat->execute(array(
             ':id_livre' => $_GET['id_livre'] 
         ));
         if ($resultat->rowCount() == 0) { //si il y a 0 ligne dans $resultat c'est que l'id n'existe pas 
          header( 'location:06_traitement_emprunter_livre.php' ); // on redirige vers une autre page
          exit();
      }
         
 
         $fiche = $resultat->fetch( PDO::FETCH_ASSOC );
         // jePrintr($fiche);
  
     } else { //sinon c'est que l'on a pas demandé un employé en particulier en arrivant sur cette 
         header( 'location:02_employes.php' );
         exit();
     }
     

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - suppression de livre</title>
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
                    
                    echo "<td><a href=\"02_fiche_employes.php?id_tre=".$infos['id_livre']. "\">Voir un livre</a></td>";
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
                <form action="" method="GET">  
                    <div class="form-group">
                        <label for="id_livre">ID</label>
                        <input type="text" class="form-control" name="id_livre" id="id_livre" value="">
                    </div>

                    
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Supprimer</button>
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