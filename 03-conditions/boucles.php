<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - Les boucles</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">Cours PHP 7 - Les boucles</h1>
        <p class="lead">Les boucles permettent de répéter des opérations élémentaires un grand nombre de fois sans avoir à réécrire le même code.</p>
        <hr class="my-4">
    </div>

    <!-- ============= Contenu principal ============ -->

    <main class="container-md py-4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2>La boucle while</h2>
                <p>La boucle <code>while</code> permet d'affiner le comportement d'une boucle en réalisant une action de manière répétitive tant qu'une condition est vérifiée ou qu'une expression quelconque est évaluée à TRUE et donc de l'arrêter quand elle n'est plus vérifiée, évaluée à FALSE.</p>
                <?php 
                    $n = 1;
                    while($n%7 != 0) { //le scrip s'arrête quand il trouver un multiple de 7 
                        $n = rand(1, 100); // rand() fait un tirage de nombres aléatoires compris entre 1 et 100 rand() pour random
                        echo $n. "&nbsp; -"; // non breaking space espace insécable
                    }
                ?>
            </div>

            <div class="col-sm-12 col-md-6">
                <h2>La boucle do ... while</h2>
                <p>L'instruction <code>de ... while</code>, la condition n'est évaluée qu'après une première exécution des instructions du bloc compris entre de et while.</p>

                <?php
                $n2 = 1; // initialisation de la variable à 1
                var_dump($n2);
                
                    do {
                        $n2 = rand(1, 100);
                        echo $n2. "&nbsp; *";
                    }

                    while($n2%7 !=0); // la condition, touver un multiple de 7, n'est testée

                ?>
            </div>
        </div>
        <!-- fin row -->
        <hr>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2>La boucle for</h2>
                <p>La boucle <code>for</code> est plus concise, plus ramassée que la boucle while</p>

                <?php
                    //on va afficher les puissance de 2 jusqu'à 8

                    for ($i = 0; $i <= 8; $i++) {//création d'un tableauindicé avec 9 élements 
                        $tab[$i] = pow(2, $i); // à l'aide d'une boucles for (on utilise la fonction pow())
                        // $tab[$si] = $i; 
                    }
                    var_dump($tab);


    

                ?>
            </div>

            <div class="col-sm-12 col-md-6">
                <h2>La boucle foreach</h2>
                <p>La boucle <code>foreach</code> (pour chaque) est efficace pour lister les élements d'un tableau.</p>

                <?php
                    // var_dump($tab);
                    // var_dump($i);
                    $val = "Une valeur de notre tableau";
                    // echo $val . "<br>";

                    echo "Les puissances de 2 sont : ";

                    foreach ($tab as $val) {
                        echo $val. " - ";
                    }
                ?>
                <p>Lecture des indices et des valeurs d'un taleau</p>

                <?php
                    //création d'un autre tableau
                    for ($i = 0; $i <= 5; $i++) {
                        $tab[$i] = pow(2, $i); 
                    }

                    //lecture des indices et des valeurs du tableau

                    foreach ($tab as $ind => $val) { //récupère indice et valeur
                        echo " 2 puissance $ind vaut $val <br>";
                    }
                    echo "Le dernier indice de mon tableau est $ind et la dernière valeur est $val.";

                ?>
            </div>
        </div>



    </main>
    <!-- fin container -->

    <?php require '../inc/footer.inc.php'; ?>



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>