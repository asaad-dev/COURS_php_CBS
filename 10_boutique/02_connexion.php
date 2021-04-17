<?php
   require_once 'inc/init.php';
   // jePrintr($_SESSION);

   //traitement du formulaire
//    if (!empty($_POST)) {
//       $_POST[ 'pseudo' ] = htmlspecialchars($_POST['pseudo']);
//       $_POST[ 'mdp' ] = htmlspecialchars($_POST['mdp']);

//       $resultat = $pdoBOU->prepare( "INSERT INTO membre (pseudo, mdp) VALUES(:pseudo, :mdp)" ); //NOW() renvoie la date d'aujoud'hui
     
//       $resultat->execute ( array (
//           ':pseudo' => $_POST[ 'pseudo' ],
//           ':mdp' => $_POST[ 'mdp' ],
//       ));
//   }// fin du if (!empty($_POST))

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>La Boutique - Connexion</title>
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
            <h2 class="text-center">Connectez-vous</h2>
            <?php echo $contenu; ?>
            <form method="POST" action="" class="p-4">
            <div class="form-group mt-2">
                <label for="pseudo">Pseudo *</label>
                <input type="text" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>" class="form-control"> 
            </div>
            <div class="form-group mt-2">
                <label for="mdp">Mot de passe *</label>
                <input type="password" name="mdp" id="mdp" value="" class="form-control">
                <small class="bg-warning ps-2 pe-2">votre mot de passe doit contenir entre 4 et 20 caractères</small>
            </div>

            <div class="form-group mt-2">
                <input type="submit" value="Connexion" class="btn btn-sm btn-success">
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