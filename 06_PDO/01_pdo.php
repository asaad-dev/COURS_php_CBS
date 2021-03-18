<?php require_once '../inc/functions.php';?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - PDO</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">Cours PHP 7 - PDO</h1>
        <p class="lead">La variable "$pdo" est un objet qui représente la connexion à une BDD</p> 
        <hr class="my-4">
    </div>

    <!-- ============= Contenu principal ============ -->

    <main class="container-md">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2>1- Connexion à la BDD</h2>
                <p><abbr title="PHP data objet">PDO</abbr>est l'acronyme de PHP Data Object</p>
                <p>PDO_MYSQL est un pilote qui implémente l'interface de PHP Data Objects (PDO) pour autoriser l'accès de PHP aux bases de données MySQL. PDO_MYSQL utilises des requêtes préparées émulées par défaut.</p>
                <?php
                    $pdoENT = new PDO('mysql:host=localhost;dbname=entreprise', //on a en premier lieu le driver mysql (IBM, ORACLE, OBC ...), le no du serveur, le nom de la BDD
                    'root', // l'utilisateur pour la BDD
                    '', //si vous êtes sur MAC il y un mdp = 'root
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //cette ligne sert à afficher les erreurs SQL dans le navigateur
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //pour définir le charset des échanges avec la BDD

                     ));


                    /***
                     * connexion PISOLA
                     */
                    // $host='localhost';
                    // $database='entreprise';
                    // $user='root';
                    //$psw='root';//mot de passe MAMP MAC
                    // $psw='';

                    // $pdoENT = new PDO('mysql:host='.$host. ';dbname=' .$database, $user, $psw);
                    // $pdoENT ->exec("SET NAMES utf8");

                    jeVarDump($pdoENT); //l'objet est vide car il n'y a pas de propriéités
                    jeVarDump(get_class_methods ($pdoENT)); //permet d'afficher la liste des méthodes présentes dans l'objet PDO

                ?>
            
            </div>
            <!-- fin col -->
               
            <div class="col-sm-12 col-md-6">
                <h2>2- Faire des réquêtes avec exec()</h2>
                <p>La méthode exec() est utilisée pour faire des requêtes qui retournent pas de résultats : INSERT, UPDATE, DELETE</p>
                <p>Valeurs de retours : <br>
                Succés : dans le jeVarDump de $requete on aura le nombre de lignes affectées par la requête, 3 delete = integer(3) <br>
                Echo : false = 0
                </p>
                <?php
                    //on va insérer un employé dans la BDD
                    // requête SQL d'insertion dans la BDD dans la table employes
                    //INSERT INTO employes (prenom, nom, sexe, service, date_embache, salary) VALUES ('Jean', 'Bon', 'm', 'informatique', '2021-03-18', 2000)

                    //$requete = $pdoENT->exec( "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Bon', 'm', 'informatique', '2021-03-18', 2000)" );

                //  $requete = $pdoENT->exec("DELETE FROM employes WHERE prenom='Jean' AND nom='Bon'");
                //  jeVarDump($requete);

                // echo "Dernier id générée en BDD : " .$pdoENT->LastInsertId();

                    
                ?>
           
            </div>
            <!-- fin col -->
            <div class="col-sm-12 col-md-6">
               <h2>3- Faire des requêtes avec <code>query()</code></h2>
               <p><code>query()</code> est utilisé pour faire des requêtes qui retournent un ou plusieur résultats :SELECT mais aussi DELETE, UPDATE et INSERT</p>

               <?php
               //1- on demande des information à la BDD car il y a un ou plusieurs résultats avec query()
                $requete = $pdoENT->query( "SELECT * FROM employes WHERE prenom= 'Amandine' ");
                // jeVarDump($requete);

                //2- dans cet objet $requete nous ne voyons pas encore les doonées concenant amandine. Pourtantelles s'y trouvent.Pour y accéder nous devon sutiliser une méthode de $requete qui s'appelle fetch() 
                
                $ligne = $requete ->fetch( PDO ::FETCH_ASSOC );
                //3- avec cette méthode fetch() on transforme l'object $requete
                //4- fectch(), avec le paramétre PDO:: FETCH_ASSOS permet de transformer l'objet $requete en un array associatif appelé ici $ligne : on y trouve en indice le nom des champs de la réquêtes SQL
                jeVarDump($ligne);

                echo "<p>Nom : " .$ligne['prenom']. " "  .$ligne['nom']. " " .$ligne['sexe']. " " .$ligne['service']. " " .$ligne['date_embauche']. " " .$ligne['salaire']. " €". "</p>";


                ?>

           
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