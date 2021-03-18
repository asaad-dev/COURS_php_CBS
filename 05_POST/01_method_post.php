<?php require_once '../inc/functions.php';?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - La méthode POST</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">Exo 02 - La méthode POST</h1>
        <p class="lead">$_POST[ ] la méthode POST réceptionne les données d'un formaulaire, $_POST  est une superglobales.</p> 
        <hr class="my-4">
    </div>

    <!-- ============= Contenu principal ============ -->

    <main class="container-md">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h5>Formaulaire</h5>

                <ul>
                    <li>Un formulaire doit toujours être dans une balise <code><&#8249;form></code> pour fonctionner.</li>
                    <li>L'attribut "method" indique comment les données vont circuler vers le PHP.</li>
                    <li> L'attribut action indique l'URL de destination des données, si l'attribut action est vide les données vont vers le même script ou la même page.</li>
                    <li>Ensuite sur les "names" il ne faut pas les oublier sur les formulaires ; ils constituent les indices de $_POST qui réceptionne les données</li>
                     <!-- un formulaire doit toujours etre dans une balise <form> pour fonctionner. L'attribut method indique comment le données vont circuler vers le PHP. L'attribut action indique l'URL de destination des données (vide, elles vont vers le meme script). Ensuit =e sur les names, il ne faut pas les oubliers sur les formulaires, ils constituent les indices des $_POST qui récéptionne les données -->
                </ul>
                <form method="POST" action="" class="p-2">
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" >
                </div>
                <div class="form-group">
                    <label for="nom">Nom de famille *</label>
                    <input type="text" class="form-control" name="nom" id="nom" required>
                </div>
                <div class="form-group">
                    <label for="commentaire">Votre commmentaire *</label>
                    <textarea class="form-control" name="commentaire" id="commentaire" cols="30" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-small btn-primary">Envoyer</button>
                </form>

            </div>
            <!-- fin col -->
               
            <div class="col-sm-12 col-md-6">
                <ul>
                    <li>$_POST est une superglobale qui permet de récupérer les données saisies dans un formulaire,</li>
                    <li>$_POST est donc un tableau (array), et il est disponible dans tous les contextes du script,</li>
                    <li>le tableau $_POST se remplit de la manière suivante : 
                                <code>$_POST = array(
                                'name1' => 'valeur1',
                                'nameN' => 'valeurN',
                                );</code></li>
                    <li>donc ou name1 et nameN correspondent aux attributs "name" du formulaire, et où valeur1 et valeurN correspondent aux valeurs saisies par l'internaute.</li>
                </ul>
            <?php 
                if (!empty($_POST)){ // si $_POST n'est pas vide c'est qu'il est rempli et donc que le formulaire a été aenvoyé, notez qu'en l'état on peut l'envoyer avec des champs vides, les valeurs de $_POST étant alore des strings vides? En effet on peut avoir des information non obliigatoires dans un formaulaire et les input ne seront pas remplis 

                    //jeVarDump($_POST);
                echo "<Prenom : <strong>" .$_POST['prenom']. "</strong><br>" ;
                echo "<Nom : <strong>" .$_POST['nom']. "</strong><br>" ;
                echo "<blockquote> Commetaire : <strong>" .$_POST['commentaire']. "</strong></blockquote>" ;
                }
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