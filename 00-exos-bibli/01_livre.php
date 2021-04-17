<?php 
    require_once '../inc/functions.php'; 
    require_once 'db.php';
    require_once 'component.php';

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>CRUD - Consulter des livres & Ajouter</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron text-center">
        <!-- <h1 class="display-4">Cours PHP 7 - Consulter des livres & Ajouter des livres</h1> -->
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Consulter des livres & Ajouter</h1>
    </div>
    <!-- ============= Contenu principal ============ -->
    <main class="container">
        <div class="row">
            <div class="col">
               <table class="table table-striped">
                  <thead class="thead-dark">
                     <tr>
                        <th>Id livre</th>
                        <th>Id abonné</th>
                        <th>Date de sortie</th>
                        <th>Date de rendu</th>
                        <th>Modifier</th>
                     </tr>
                  </thead>
                <?php
                    $requete = $pdoBIBLI->query("SELECT * FROM emprunt");
                    $nbr_livres = $requete->rowCount();

                    foreach ( $pdoBIBLI->query( " SELECT * FROM emprunt " ) as $infos ) {
                        echo "<tr>";
                        echo "<td>" .$infos['id_livre']. " </td>";
                        echo "<td>" .$infos['id_abonne']. " </td>";
                        echo "<td>" .$infos['date_sortie']. " </td>";
                        echo "<td>" .$infos['date_rendu']. " </td>";
                        echo "<td><a href=\"01_livre.php?id_livre=".$infos['id_livre']. "\"><i class=\"fas fa-edit\"></i>
                        </a></td>";   
                    echo "</tr>";
                    }
                ?>
               </table>
            </div>
        </div>
        <!-- fin tableau -->
        <!-- formulaire -->
        <div class="row p-3">            
        <div class="container col-8 d-flex justify-content-center border bordered p-5 shadow">
            <form action="" method="post" class="w-50">

                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge'></i>","ID", "id_livre",""); ?>
                </div>

                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>","Titre", "titre",""); ""?>
                </div>

                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-people-carry'></i>","Auteur", "auteur",""); ?>
                    </div>
                </div>

                <div class="d-flex justify-content-center m-3">
                  <?php buttonElement("btn-create","btn btn-success m-2 px-3","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>

                  <?php buttonElement("btn-read","btn btn-primary m-2 px-3","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>

                  <?php buttonElement("btn-update","btn btn-light border m-2 px-3","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>

                  <?php buttonElement("btn-delete","btn btn-danger m-2 px-3","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
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