<?php
   require_once 'inc/init.php';
   // jePrintr($_SESSION);

   //traitement du formulaire
   if (!empty($_POST)) {
      $_POST[ 'pseudo' ] = htmlspecialchars($_POST['pseudo']);
      $_POST[ 'mdp' ] = htmlspecialchars($_POST['mdp']);
      $_POST[ 'nom' ] = htmlspecialchars($_POST['nom']);
      $_POST[ 'prenom' ] = htmlspecialchars($_POST['prenom']);
      $_POST[ 'email' ] = htmlspecialchars($_POST['email']);
      $_POST[ 'civilite' ] = htmlspecialchars($_POST['civilite']);
      $_POST[ 'adresse' ] = htmlspecialchars($_POST['adresse']);
      $_POST[ 'code_postal' ] = htmlspecialchars($_POST['code_postal']);
      $_POST[ 'ville' ] = htmlspecialchars($_POST['ville']);
      // $_POST[ 'statut' ] = htmlspecialchars($_POST['statut']);

      $resultat = $pdoBOU->prepare( "INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, adresse, code_postal, ville) VALUES(:pseudo, :mdp, :nom, :prenom, :email, :civilite, :adresse, :code_postal, :ville)" ); //NOW() renvoie la date d'aujoud'hui
     
      $resultat->execute ( array (
          ':pseudo' => $_POST[ 'pseudo' ],
          ':mdp' => $_POST[ 'mdp' ],
          ':nom' => $_POST[ 'nom' ],
          ':prenom' => $_POST[ 'prenom' ],
          ':email' => $_POST[ 'email' ],
          ':civilite' => $_POST[ 'civilite' ],
          ':adresse' => $_POST[ 'adresse' ],
          ':code_postal' => $_POST[ 'code_postal' ],
          ':ville' => $_POST[ 'ville' ],
         //  ':statut' => $_POST[ 'statut' ],
      ));
  }// fin du if (!empty($_POST))
?>
<!doctype html>
<html lang="en">
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
            <form action="" method="POST">
               <div class="form-group">
                  <label for="pseudo">Pseudo</label>
                  <input type="text" class="form-control" name="pseudo" id="pseudo" value="">
               </div>
               <div class="form-group">
                  <label for="mdp">Mot de passe</label>
                  <input type="password" class="form-control" name="mdp" id="mdp" value="">
                  <small>Votre mot de passe entre 4 et 20 caractères</small>
               </div>    
               <div class="form-group">
                  <label for="nom">Nom</label>
                  <input type="text" class="form-control" name="nom" id="nom" value="">
               </div>
               <div class="form-group">
                  <label for="prenom">Prénom</label>
                  <input type="text" class="form-control" name="prenom" id="prenom" value="">
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" id="email" value="" placeholder="name@example.com">
               </div>
               <div class="form-check form-check-inline">
                  <label for="exampleInputEmail1">Email address</label>
                  <label class="form-check-label pr-3 py-3" for="civilite">Civilité :</label>
                  <input type="radio" name="civilite" value="m" checked class="mx-2"> Homme
                  <input class="mx-2" type="radio" name="civilite" value="f"> Femme    
               </div>
               <div class="form-group">
                  <label for="adresse">Adresse</label>
                  <input type="text" class="form-control" name="adresse" id="adresse" value="">
               </div>
               <div class="form-group">
                  <label for="code_postal">Code postal</label>
                  <input type="text" class="form-control" name="code_postal" id="code_postal" value="">
               </div>
               <div class="form-group">
                  <label for="ville">Ville</label>
                  <input type="text" class="form-control" name="ville" id="ville" value="">
               </div>
               <div class="form-group">
                  <label for="statut">Statut</label>
                  <input type="text" class="form-control" name="statut" id="statut" value="">
               </div>
               <div class="form-group text-center">
                  <button type="submit" class="btn btn-success my-3">S'inscrire</button>
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