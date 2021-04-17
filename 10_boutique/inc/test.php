<?php
    //Connexion à la BDD
    $pdoBOU = new PDO('mysql:host=localhost;dbname=site', 'root', '', 
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
        ));
      // print_r($pdoBOU);
      include_once 'functions.php';

      $requete = $pdoBOU->query( " SELECT * FROM membre" ); 
      $ligne = $requete->fetch( PDO::FETCH_ASSOC );
      echo "<p>Nom :" .$ligne['prenom']. " " .$ligne['nom']. " # " .$ligne['id_membre']."</p>";
         
?>

