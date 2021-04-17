<?php
   /// 1- FONCTION "print_r" 
   function jePrintr($maVariable) {
      echo "<pre><span class=\"bg-danger text-white p-2\">..print_r</span>";
      echo "<p class=\"alert alert-warning p-2 w-50\">";
      print_r($maVariable);
      echo "</p></pre>";
  }

   /// 2- FONCTION POUR EXÉCUTER LES prepare()
   function executeRequete($requete, $parametres = array ()) { 
      foreach ($parametres as $indice => $valeur) { //foreach        
          $parametres[$indice] = htmlspecialchars($valeur); //on evite les injections SQL
          global $pdoBOU; //"global" nous permet d'accéder à la vaiable $pdoBOU dans l'espace global du fichier init.php
          $resultat = $pdoBOU->prepare($requete); //puix prepare -> prépare la requête
          $succes = $resultat->execute($parametres);  //on exécute
          if ($succes === false) {
              return false; // si la requête  n'a pas marché je renvoie false
          } else {
              return $resultat;
          }// fin if else 
      }
  }// fermeture fonction executeRequete
  

   /// 3- VÉRIFIER SI LE MEMBRE EST CONNECTÉ

  /// 4- VÉRIFIER LES+ STATUT DU membre
?>