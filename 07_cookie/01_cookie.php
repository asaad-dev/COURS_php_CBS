<?php require_once '../inc/functions.php';
//2- vérification de l'url ou si l'internaute veitn pour la 1ère ou si on a déjà une langue dans un cookie
if (isset($_GET['langue'])) { //si une langue est passée de l'url, l'internaute a cliqué sur un des liens, on enverra cette langue dans le cookie 
    // jeVarDump($_GET['langue']);
    $langue = $_GET['langue'];
    jePrintr($langue);
    } elseif (isset($_COOKIE['langue'])) { //sinon si on a reçu un cookie applé "langue" alors la valeur du site sera la valeur du cookie
        $langue = $_COOKIE['langue'];
        jePrintr($langue);

    } else { //sinon si l'internaute n'a pas choisi de langue, il arrive pour la 1ère fois on va lui mettre "fr" par défaut
        $langue ="fr";
        jePrintr($langue);
}

// 3- envoie du cookie avec l'information sur la langue
// jePrintr(time()); // time() nous donne la date du jour depuis le début de UNIX date experimée en seondes
$expiration = time() + 365*24*60*60; //je crée ici la date d'expiration de mon cookie un an plus tard
// jeprint($expiration);
// jePrintr($expiration - time());
// jePrintr(time() - $expiration - $expiration);

// setcookie(); fonction qui fabrique le cookie
setcookie('langue', $langue, $expiration); //la fonction envoie un cookie applé "langue" avec la valeur de $langue et pour date d'expiration la valeur de $expiration

//il n'existe pas de fonction prédéfinie qui permette de supprimer un cookie, pour rendre un cookie invalide on utilise setcookie() avec le nom concerné et en mettant une date d'expiration à 0 ou antérieure à aujour'hui ... 

//Firefox > Inspecter > Stockage
//Chrome > Inspecter > Application > Stockage

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - COOKIE</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">Cours PHP 7 - COOKIE</h1>
        <p class="lead">La super globale $_COOKIE : un cookie est un petit fichier de 4ko maxi déposé par le serveur web sur le poste de l'internaute et qui contient des informations.</p> 
        <hr class="my-4">
    </div>

    <!-- ============= Contenu principal ============ -->

    <main class="container-md">
        <div class="row">
            <div class="col-md-6 ">
                <P>Les cookies sont automatiquement renvoyés au serveur web par le navigateur. Lorsque l'internaute navigue dans les pages concernées par le ou les cookies PHP permet de récupérer trés facilement les données contenues dans un cookie ; car les informations sont stockées dans une superglobale $_COOKIE</P>
                <p class="alert alert-danger">Un cookie étant suavegardé sur le poste de l'internaute, il peut être modifié détourné ou volé !!! On n'y met donc aucune informations sensible : ref. bancaires, numéro de sécu, mdp ni même le contenu d'un panier d'achat</p>
                <!-- 1- on envoie la angue choisie par l'url; la valeur "fr", par ex. est récupérée dans la superglobale $_GET -->
                <a href="?langue=fr" class="btn btn-primary">Français</a>
                <a href="?langue=es" class="btn btn-secondary">Espagnol</a>
                <a href="?langue=it" class="btn btn-danger">Italien</a>
                <a href="?langue=ru" class="btn btn-info">Russe</a>

                <?php
                    echo "<h3>Langue du site le site est en ... $langue ...</h3>";
                    echo time(). " La date du jour, ou le timestamp, exprimée en secondes depuis le 1er janvier 1970.";

                ?>
               
            </div>
            <!-- fin col -->
            <div class="col-md-6">
            
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