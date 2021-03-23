<?php

    //création ou ouverture d'une session 
    echo '<h1>Cours PHP 7 - $_SESSION</h1>';
    echo '<p>Les données du fichier de session sont accessibles et manipulables à partir de la superglobale $_SESSION.</p>';

    //cette fonction si on besoin des informations de session devra être placée au débu de chaque page
    session_start(); // permet de créer un fichier de session avec son identifiant OU de l'ouvrir si il existe déjà et que l'on a reçu un cookie avec l'id dedans

    //principe des session : un fichier temporaire applé "session" est crée sur le serveur, avec un identifiant unique. Cette session est lié à un internaute, dans le même temps un cookie est déposé sur le poste de l'internaute avec l'identifiant (au nom de PHPSESSION). Ce cookie se détruit quand on quitte le navigateur. Lorsque
    //le fichier de session peut contenir des informations sensibles !!! il n'est pas accessible par l'internaute

    $_SESSION['pseudo'] = 'Tintin';
    $_SESSION['mdp'] = 'vol747';
    $_SESSION['email'] = 'tintin@moulinsart.be';

    echo '<p>La session est bien remplie</p>';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    //Il est possible de vider une partie de la session avec unset()
    unset($_SESSION['mdp']);

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    //supprimer entièrement une session
    // session_destroy(); //suppression totale de la session et du fichier de session

    // echo '<p>La session est détruite</p>'; // nous avons effectué un session-destroy() mais il n'est exécuté qu'à la fin de notre script. Nous voyons encore ici le contenu de la session, mais le fichier temporaire dans le dossier temp a bien été supprimé

    //ce fichier contient les inforamtions de session et elles sont accessibles grâce à session_start()

    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';

?>