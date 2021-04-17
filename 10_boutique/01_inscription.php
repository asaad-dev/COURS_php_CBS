<?php
   require_once 'inc/init.php';
   // jePrintr($_SESSION);

   //traitement du formulaire
   // $contenu est dans la page init.php
if (!empty($_POST)) { // Si des données sont en POST
   jePrintr($_POST); 
   // GESTION DES DONNEES POST ENVOYEES
   // strlen pour mesurer la longueur, le nombre de caractères // isset veut dire il est etablit
   if (!isset($_POST['pseudo']) || strlen($_POST['pseudo']) <4 || strlen($_POST['pseudo']) >20 ) {
       $contenu .= '<div class="alert alert-danger">Le pseudo doit contenir entre 4 et 20 caractères.</div>';
   } // fin du if isset pseudo
   if (!isset($_POST['mdp']) || strlen($_POST['mdp']) <4 || strlen($_POST['mdp']) >20 ) {
       $contenu .= '<div class="alert alert-danger">Le mot de passe doit contenir entre 4 et 20 caractères.</div>';
   } // fin du if isset mdp
   if (!isset($_POST['nom']) || strlen($_POST['nom']) <2 || strlen($_POST['nom']) >20 ) {
       $contenu .= '<div class="alert alert-danger">Le nom doit contenir entre 2 et 20 caractères.</div>';
   } // fin du if isset nom
   if (!isset($_POST['prenom']) || strlen($_POST['prenom']) <2 || strlen($_POST['prenom']) >20 ) {
       $contenu .= '<div class="alert alert-danger">Le prénom doit contenir entre 2 et 20 caractères.</div>';
   } // fin du if isset prenom
   if (!isset($_POST['email']) || strlen($_POST['email']) > 50 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
       // filter_var -> filtre de variable // dans ce filtre on passe la fonction préféfinie FILTER_VALIDATE_EMAIL (c'est une constante elle est écrite en majuscule. Cette fonction vérifie que le format est bien un format email)
       $contenu .='<div class="alert alert-danger">Votre email n\'est pas conforme.</div>';// 
   }// fin if !isset email
   if (!isset($_POST['civilite']) || ($_POST['civilite']) != 'm' && ($_POST['civilite']) != 'f' ) {
       $contenu .= '<div class="alert alert-danger">La civilité n\'est pas valable.</div>';
   } // fin du if isset civilite
   if (!isset($_POST['adresse']) || strlen($_POST['adresse']) <6 || strlen($_POST['adresse']) >50 ) {
       $contenu .= '<div class="alert alert-danger">L\'adresse est elle complète?</div>';
   } // fin du if isset adresse
   // vérifier que la saisie soit bien des chiffres avec des expressions régulières
   if (!isset($_POST['code_postal']) || !preg_match( '#^[0-9]{5}$#', $_POST['code_postal']) >5 ) { // est ce que le code postal correspond à l'expression régulière précisée
       $contenu .= '<div class="alert alert-danger">Le code postal n\'est pas conforme.</div>';
   } // fin du if isset code_postal
   if (!isset($_POST['ville']) || strlen($_POST['ville']) <1 || strlen($_POST['ville']) >20 ) {
       $contenu .= '<div class="alert alert-danger">La ville doit contenir entre 1 et 20 caractères.</div>';
   } // fin du if isset ville
   if (empty($contenu)) { // si la variable est vide c'est qu'il n'y a pas d'erreur sur le form
       $membre = executeRequete( " SELECT * FROM membre WHERE pseudo = :pseudo",
       array(':pseudo' => $_POST['pseudo']));
       if ($membre->rowCount() > 0) { // si la requête retourne des lignes c'est que le pseudo existe déjà
           $contenu .= '<div class="alert alert-danger">le pseudo est indisponible veuillez en choisir un autre</div>';
       } else { // si on inscrit le membre en BDD
           $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);// cette fonction prédéfinie permet de hasher/crypter le mot de passe selon l'algorithme actuel "bcrypt" dans la BDD.  Il faudra lors de la connexion comparer le hash de la BDD avec celui du mdp de l'intérieur
           $succes = executeRequete(" INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, adresse, code_postal, ville,  statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :adresse, :code_postal, :ville,  0)", 
               array(
                   ':pseudo' => $_POST['pseudo'],
                   ':mdp' => $mdp, //on prend le mot de passe hashé
                   ':nom' => $_POST['nom'],
                   ':prenom' => $_POST['prenom'],
                   ':email' => $_POST['email'],
                   ':civilite' => $_POST['civilite'],
                   ':adresse' => $_POST['adresse'],
                   ':code_postal' => $_POST['code_postal'],
                   ':ville' => $_POST['ville'],
           ));
           if ($succes) {
               $contenu .= '<div class="alert alert-success">Vous êtes inscrit <a href="02_connexion.php">Cliquez ici pour vous connecter</a></div>'; 
           } else {
               $contenu .= '<div class="alert alert-danger">Erreur lors de l`\enregistrement !</div>';
           }//fin du if $succes
       } // fin du if ... else
   } // fin empty $contenu
} // fin du if !empty $_POST
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>La Boutique - Inscription</title>
    <!-- Mes styles -->
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
    <main class="container bg-white m-4 mx-auto p-4">
      <div class="row">
         <div class="col-sm-12 col-md-4 border border-success mx-auto m-4 p-4">
            <h1 class="text-center">La Boutique</h1>
         </div>
      </div>
      <!-- formulaire d'inscription-->
      <div class="row  p-3">            
         <div class="container col-8 border bordered p-5 shadow">
            <h2 class="text-center">Inscrivez-vous</h2>
            <?php echo $contenu; ?>
            <form method="POST" action="" class="p-4">
            <div class="form-group mt-2">
                <label for="pseudo">Choisissez un pseudo *</label>
                <input type="text" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>" class="form-control"> 
            </div>
            <div class="form-group mt-2">
                <label for="mdp">Mot de passe *</label>
                <input type="password" name="mdp" id="mdp" value="" class="form-control">
                <small class="bg-warning">votre mot de passe doit contenir entre 4 et 20 caractères</small>
            </div>
            <div class="form-group mt-2">
                <label for="nom">Nom *</label>
                <input type="text" name="nom" id="nom" value="<?php echo $_POST['nom'] ?? ''; ?>" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="prenom">Prénom *</label>
                <input type="text" name="prenom" id="prenom" value="<?php echo $_POST['prenom'] ?? ''; ?>" class="form-control"> 
            </div>
            <div class="form-group mt-2">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" value="<?php echo $_POST['email'] ?? ''; ?>" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="civilite">Civilité *</label>
                <input type="radio" name="civilite" value="m" checked> Homme
                <input type="radio" name="civilite" value="f"<?php if (isset($_POST['civilite']) && $_POST['civilite'] =='f') echo 'checked';?>> Femme            
            </div>
            <div class="form-group mt-2">
                <label for="adresse">Adresse</label>
                <textarea name="adresse" id="adresse" class="form-control"><?php echo $_POST['adresse'] ?? ''; ?></textarea>
            </div>
            <div class="form-group mt-2">
                <label for="code_postal">Code postal</label>
                <input type="text" name="code_postal" id="code_postal" value="<?php echo $_POST['code_postal'] ?? ''; ?>" class="form-control"> 
            </div>
            <div class="form-group mt-2">        
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville" value="<?php echo $_POST['ville'] ?? ''; ?>" class="form-control"> 
            </div>
            <div class="form-group mt-2">
                <input type="submit" value="Inscrivez-vous" class="btn btn-sm btn-success">
                <input type="submit" value="Effacer" class="btn btn-sm btn-warning" type=reset>
            </div>
    </form>
        </div>
        <!-- fin row -->
      </div>
    </main>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>