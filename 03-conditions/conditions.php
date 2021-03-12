<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - Les instructions conditionnelles</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">Cours PHP 7 - Les instructions conditionnelles ou les conditions</h1>
        <p class="lead">On retrouve dans PHP la plupart des instructions de contrôle des scripts. Indispensables à la gestion du déroulement d'un algorithme quelconque, ces instructions sont présentes dans tous les langages. PHP utilise une syntaxe très proche de celle du langage C. Ceux qui ont déjà pratiqué un langage tel que le C ou plus simplement JavaScript seront en pays de connaissance.</p>
        <hr class="my-4">
    </div>

    <!-- ============= Contenu principal ============ -->

    <main class="container-md">
        <div class="row">
            <div class="col-sm-12 col-md-3">
            <h2>if</h2>
            <p>L'instruction <code>if</code> est la plus simple et la plus utilisée des instructions conditionnelles. Présente dans tous les langages de programmation, elle est essentielle en ce qu'elle permet d'orienter l'exécution du script en fonction de la valeur booléene d'une expression.</p>

            <?php 
                $a = 100;
                $b = 55;
                $c = 25;

                if($a > $b && $b > $c) {
                    echo "<p class=\"alert alert-success\">Les 2 conditions sont OK</p>";
                }
            
            ?>
            </div>

            <div class="col-sm-12 col-md-6">
               <h2>if ... else</h2>
               <p>L'instruction <code>if ... else</code> permet de traiter le cas oû l'expression conditionnelle est TRUE et en même temps d'écrire un traitement de rechange quand elle est évaluée à FALSE, ce que ne permet pas une instruction if seule. L'instruction ou le bloc qui suit <code>else</code> est alors le seul à être exécuté. L'exécution continue ensuite normalement aprés le bloc <code>else</code>.</p>

            <?php
            echo "<p class=\"alert alert-success\">";
                if($a > $b) {
                    echo "$a est supérieur à $b";
                } else {
                    echo "$b est supérieur à $a"; 
                }
            echo "</p>";

            // autre exemple de if else
            echo "<hr>";

            $e = 10;
            $f = 5;
            $g = 2;

            if($e == 9 || $f > $g) {
                echo "Au moins une des deux conditions est remplie";
            } else {
                echo "Les deux conditions sont fausses";
            }
            ?>
            <p>Le bloc qui suit les instructions if ou else peut contenir toutes sortes d'instructions, y compris d'autres instructions <code>if ... else</code> </p>
            <p>Il existe une autre manière d'écrire un if ... else ; la condition ternaire</p>
            <p>Dans la ternaire le <code>?</code> remplace le if et le <code>:</code> remplace le else</p>
            <?php
                $h = 10;
                // if($h == 100) {
                //     echo "$h est égal à 10";
                // } else {
                //     echo "$h est différent de 10";
                // }

                //la même en ternaire 
                echo ($h == 10) ? "$h est égal à 10" : "$h est différent de 10";// si $h est égal à 10, on affiche la premiére expression sinon la seconde
            ?>


            </div>

            <div class="col-sm-12 col-md-3">
                <h2>if ... elseif ... else</h2>
                <p>Nous obtenons dans ce cas une syntaxe plus complexe, de la forme : VOIR</p>
                <?php
                $d = 8;
                echo "<p class=\"alert alert-success\">";

                if($d == 8) {
                    echo "Réponse 1 : \$d est égale à 8";
                } elseif ($d != 10){
                    echo "Réponse 2 : \$d est différent de  10"; 
                } else {
                    echo "Réponse 3 : les 2 conditions sont fausses";
                }

            echo "</p>";
            ?>
            </div>
        </div>
        <!-- fin row -->
        <hr>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2>Switch ... case</h2>
                <p>Switch permet de comparer à une multitude de valeur comme l'instruction if ... elseif ... else</p>

                <?php 
                    $dept = 75;
                    switch ($dept) {
                        case 75:
                            echo "Paris";
                            break;

                        case 41:
                            echo "Loir-et-Cher";
                            break;
                            
                        case 92:
                            echo "Hauts-de-Seine";
                            break;

                        default:
                            echo "Département inconnu en Ile de France!";
                            break;
                    }
                ?>
            </div>
            <div class="col-sm-12 col-md-6"></div>
        </div>



    </main>
    <!-- fin container -->

    <?php require '../inc/footer.inc.php'; ?>



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>