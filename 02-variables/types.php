<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - Types de données</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <!-- navigation en include -->
    <?php require '../inc/nav.inc.php'; ?>
    <!-- ============= NAV ============ -->
    <div class="container-md jumbotron">
        <h1 class="display-4">Cours PHP 7 - Types de données</h1>
        <p class="lead">Dans PHP, il n'existe pasde déclaration explicite du type d'une variable lors de sa création. Même PHP 7 reste un langage pauvrement typé comparé à Java ou au C.</p>
        <hr class="my-4">
    </div>
        
    <!-- ============= Contenu principal ============ -->

    <main class="container-md">
        <div class="row">
            <div class="col-sm-12 col-sm-6">
                <h2>1- Les types de données</h2>
                <ul>
                    <li>Les types de base :</li>
                        <ul>
                            <li>Entiers, avec le type integer, qui permet de représenter les nombres entiers dans les bases 10, 8 et 16.</li>
                            <li>Flottants, avec le type double ou float, au choix, qui représentent les nombres réels, ou plutôt décimaux au sens mathématique. </li>
                            <li>Chaînes de caractères, avec le type string.</li>
                            <li>Booléens, avec le type boolean, qui contient les valeurs de vérité TRUE ou FALSE (soit les valeurs 1 ou 0 si on veut les afficher).</li>
                        </ul>
                    <li>Les types composés :</li>
                        <ul>
                            <li>Tableaux, avec le type array, qui peut contenir plusieurs valeurs.</li>
                            <li>Objets, avec le type object.</li>
                        </ul>
                        <li>Les types spéciaux</li>
                        <ul>
                            <li>Objets, avec le type object.</li>
                            <li>Type null.</li>
                        </ul>
                </ul>
            </div>
            <div class="col-sm-12 col-sm-4">
                <h2>Les opérateurs numériques</h2>
                <p>PHP offre un large éventail d'opérateurs utilisables avec des nombres. Les variables ou les nombres sur lesquels agissent ces opérateurs sont appelés les opérandes.</p>
            <table class="table table-striped">
                <caption>Les opérateurs numériques</caption>
                    <thead>
                            <tr>
                            <th scope="col">Opérateur</th>
                            <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">+</th>
                                <td>Addition</td>
                            </tr>
                            <tr>
                                <th scope="row">-</th>
                                <td>Soustraction</td>
                            </tr>
                            <tr>
                                <th scope="row">*</th>
                                <td>Multiplication</td>
                            </tr>
                            <tr>
                                <th scope="row">**</th>
                                <td>Puissance (associatif à droite)<br>
                                    $a=3;<br>
                                    echo $a**2; //Affiche 9<br>
                                    echo $a**2**4; //Affiche 43046721 soit 3**(2**4) ou 316</td>
                            </tr>
                            <tr>
                                <th scope="row">/</th>
                                <td>Division</td>
                            </tr>
                            <tr>
                                <th scope="row">%</th>
                                <td>Modulo : reste de la division du premier opérande par le deuxième. Fonctionne aussi avec des opérandes décimaux. Dans ce cas, PHP ne tient compte que des parties entières de chacun des opérandes.<br>
                                $var = 159;<br>
                                echo $var%7; //affiche 5 car 159=22x7 + 5.<br>
                                $var = 10.5;<br>
                                echo $var%3.5; //affiche 1et non pas 0. <br>
                                <?php
                                    echo "<hr>";
                                    $var = 159;
                                    echo "<div class=\"border border-primary w-50 p-2\">dans la variable \$var j'ai rentré 159. <br>";
                                    echo "si je veux afficher le contenu de \$var ex. \$var contient $var <br>";
                                    echo "le resultat du modulo de $var par 7 : $var%7 est égal à   " .$var%7;
                                    echo "</div>";
                                ?>
                                <?php
                                    echo "<hr>";
                                    $var = 159;
                                    echo "<div class=\"border border-success w-50 p-2\">dans la variable \$var j'ai rentré 159.<br> si je veux afficher le contenu de \$var le voici : \$var contient $var <br> le résultat du modulo de $var par 7 : $var%7 est égal à "  .$var%7 ;
                                    echo "</div>";
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">--</th>
                                <td>Décrémentation : soustrait une unité à la variable. Il existe deux possibilités, la prédécrémentation, qui soustrait avant d'utiliser la variable, et la postdécrémentation, qui soustrait après avoir utilisé la variable.<br>
                                $var=56;<br>
                                echo $var--; //affiche 56 puis décrémente $var.<br>
                                echo $var; //affiche 55.<br>
                                echo --$var; //décrémente $var puis affiche 54.</td>
                            </tr>
                            <tr>
                                <th scope="row">++</th>
                                <td>Incrémentation : ajoute une unité à la variable. Il existe deux possibilités, la préincrémentation, qui ajoute 1 avant d'utiliser la variable, et la postincrémentation, qui ajoute 1 après avoir utilisé la variable.
                                $var=56;<br>
                                echo $var++; //affiche 56 puis incrémente $var.postincrémente<br>
                                echo $var; //affiche 57.<br>
                                echo ++$var; //incrémente $var puis affiche 58. préincrémente<br>
                                </td>

                                <?php 
                                    $var=56;   
                                    echo "<div class=\"border border-danger w-50 p-2\">";
                                    echo $var++. "<br> $var </div>";
                                    echo "<div class=\"border border-warning w-50 p-2\">" .$var++. "<br>" .$var. "<br>".++$var."</div>";
                                ?>
                            </tr>                            
                        </tbody>
                    </table>
                <h3>Le type boolean</h3>
                <p>Le type booléen ne peut contienir que deux valeurs différentes TRUE ou FALSE, 1 ou 0 </p>
                <?php
                    $a = 89;
                    $b = ($a<100); // dans le cas oû c'est FASLE il affichera une chîne vide
                    echo "<div class=\"border border-warning w-50 p-2\"> \$b vaut $b</div>";
                ?>

                <h3>Les opérateurs boléens</h3>
                <p>Quand ils sont associés, les opérateurs booléens servent à écrire des expressions simples ou complexes, qui sont évaluées par une valeur booléenne TRUE ou FALSE.</p>

                <table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Opérateur</th>
							<th scope="col">Description</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<th scope="row">==</th>
						<td>
						Teste l'égalité de deux valeurs. L'expression $a == $b vaut TRUE si la valeur de $a est égale à celle de $b et
						FALSE dans le cas contraire :<br>
						$a = 345;<br>
						$b = "345";<br>
						$c = ($a==$b);<br>
						$c est un booléen qui vaut TRUE car dans un contexte de comparaison numérique, la chaîne "345" est évaluée comme le nombre 345. Si $b="345
						éléphants" nous obtenons le même résultat.
						</td>
					</tr>
					<tr>
						<th scope="row">!= ou <></th>
						<td>
						Teste l'inégalité de deux valeurs.<br>
						L'expression $a != $b vaut TRUE si la valeur de $a est différente de celle de $b et FALSE dans le cas contraire.
						</td>
					</tr>
					<tr>
						<th scope="row">===</th>
						<td>
						Teste l'identité des valeurs et des types de deux expressions.<br>
						L'expression $a === $b vaut TRUE si la valeur de $a est égale à celle de $b et que $a et $b sont du même type. Elle vaut FALSE dans le cas contraire :<br>
						$a = 345;<br>
						$b = "345";<br>
						$c = ($a===$b);<br>
						$c est un booléen qui vaut FALSE car si les valeurs sont égales, les types sont différents (integer et string).
						</td>
					</tr>
					<tr>
						<th scope="row">!==</th>
						<td>
						Teste la non-identité de deux expressions.<br>
						L'expression $a !== $b vaut TRUE si la valeur de $a est différente de celle de $b ou si $a et $b sont d'un type différent. Dans le cas contraire, elle vaut FALSE :<br>
						$a = 345;<br>
						$b = "345";<br>
						$c = ($a!==$b);<br>
						$c est un booléen qui vaut TRUE car si les valeurs sont égales, les types sont différents (integer et string).
						</td>
					</tr>
					<tr>
						<th scope="row"><</th>
						<td>
						Teste si le premier opérande est strictement inférieur au second.
						</td>
					</tr>
					<tr>
						<th scope="row"><=</th>
						<td>
						Teste si le premier opérande est inférieur ou égal au second.
						</td>
					</tr>
					<tr>
						<th scope="row">></th>
						<td>
						Teste si le premier opérande est strictement supérieur au second.
						</td>
					</tr>
					<tr>
						<th scope="row">>=</th>
						<td>
						Teste si le premier opérande est supérieur ou égal au second.
						</td>
					</tr>
					<tr>
						<th scope="row"><=></th>
						<td>
						Avec $a<=>$b, retourne -1, 0 ou 1 respectivement si $a<$b, $a=$b ou $a>$b ($a et $b peuvent être des chaînes).
						</td>
					</tr>
					</tbody>
					</table>

				<h3>Les opérateurs logiques</h3>

				<table class="table table-striped">
				<thead>
					<tr>
					<th scope="col">Opérateurs</th>
					<th scope="col">Description</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<th scope="row">OR</th>
					<td>Teste si l'un au moins des opérandes a la valeur TRUE :<br>
                        $a = true;<br>
                        $b = false;<br>
                        $c = false;<br>
                        $d = ($a OR $b);//$d vaut TRUE.<br>
                        $e = ($b OR $c); //$e vaut FALSE.</td>
					</tr>
					<tr>
					<th scope="row">||</th>
					<td>Équivaut à l'opérateur OR mais n'a pas la même priorité.</td>
					</tr>
					<tr>
					<th scope="row">XOR</th>
					<td>Teste si un et un seul des opérandes a la valeur TRUE :<br>
                        $a = true;<br>
                        $b = true;<br>
                        $c = false;<br>
                        $d = ($a XOR $b); //$d vaut FALSE.<br>
                        $e = ($b XOR $c); //$e vaut TRUE.</td>
					</tr>
					<tr>
					<th scope="row">AND</th>
					<td>Teste si les deux opérandes valent TRUE en même temps :<br>
                        $a = true;<br>
                        $b = true;<br>
                        $c = false;<br>
                        $d = ($a AND $b); //$d vaut TRUE.<br>
                        $e = ($b AND $c); //$e vaut FALSE.</td>
					</tr>
					<tr>
					<th scope="row">&&</th>
					<td>Équivaut à l'opérateur AND mais n'a pas la même priorité.</td>
					</tr>
					<tr>
					<th scope="row">!</th>
					<td>Opérateur unaire de négation, qui inverse la valeur de l'opérande :
                        $a = TRUE;<br>
                        $b = FALSE;<br>
                        $d = !$a; //$d vaut FALSE.<br>
                        $e = !$b; //$e vaut TRUE.</td>
					</tr>
				</tbody>
				</table>
            </div>

            <div class="col-sm-12 col-sm-4">
                
            </div>

           
        </div>
        <!-- fin row -->














        <div class="row">
            <h3>Affectation de variables par valeur et par référence</h3>
            <div class="col-sm-12">
                <p>L'affectation consiste à donner une valeur à une variables. Lors de la création d'une variable, vous ne déclarez pas son type. C'est la valeur que vous lui affectez qui détermine ce type. Dans PHP, vous pouvez affecter une variable par valeur ou par référence.</p>
                <p>Exemples :</p>
                <ul>
                    <li>$mavar=75;</li>
                    <li>$mavar="Paris";</li>
                    <li>$mavar=7*3+2/5-91%7; //PHP évalue l'expression puis affecte le résultat </li>
                    <li>$mavar=mysql_connect($a,$b,$c); //la fonction retourne une ressource </li>
                    <li>$mavar=isset($var&&($var==9)); //la fonction retourne une valeur booléenne</li>
                </ul>
            </div>
        </div>
        <!-- fin row -->
        <div class="row">
            <div class="col-sm-12">
                <h2>Les variables prédéfinies</h2>
                <p>PHP dispose d'un grand nombre de variables prédéfinies, qui contiennent des in formations à la fois sur le serveur et sur toutes les données qui peuvent trnsiter entre le poste client et le serveur, comme les valeurs saisies dans un formaulaire, les cookies ou les sessions.</p>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Variable</th>
                            <th scope="col">Utilisation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">$GLOBALS</th>
                            <td>Contient le nom et la valeur de toutes les variables globales du script. Les noms des variables sont les clés de ce tableau. $GLOBALS["mavar"] récupère la valeur de la variable $mavar en dehors de sa zone de visibilité (dans les fonctions, par exemple).</td>
                        </tr>
                        <tr>
                            <th scope="row">$_COOKIE</th>
                            <td>Contient le nom et la valeur des cookies enregistrés sur le poste client. Les noms des cookies sont les clés de ce tableau (voir le chapitre 13).</td>
                        </tr>
                        <tr>
                            <th scope="row">$_ENV</th>
                            <td>Contient le nom et la valeur des variables d'environnement qui sont changeantes selon les serveurs.</td>
                        </tr>
                        <tr>
                            <th scope="row">$_FILES</th>
                            <td>Contient le nom des fichiers téléchargés à partir du poste client.</td>
                        </tr>
                        <tr>
                            <th scope="row">$_GET</th>
                            <td>Contient le nom et la valeur des données issues d'un formulaire envoyé par la méthode GET. Les noms des champs du formulaire sont les clés de ce tableau.</td>
                        </tr>
                        <tr>
                            <th scope="row">$_POST</th>
                            <td>Contient le nom et la valeur des données issues d'un formulaire envoyé par la méthode POST. Les noms des champs du formulaire sont les clés de ce tableau.</td>
                        </tr>
                        <tr>
                            <th scope="row">$_REQUEST</th>
                            <td>Contient l'ensemble des variables superglobales $_GET, $_POST, $_COOKIE et $_FILES.</td>
                        </tr>
                        <tr>
                            <th scope="row">$_SERVER</th>
                            <td>Contient les informations liées au serveur web, tel le contenu des en-têtes HTTP ou le nom du script en cours d'exécution. Retenons les variables suivantes :
                                <ul>
                                    <li>
                                        $_SERVER["HTTP_ACCEPT_LANGUAGE"], qui contient le code de langue du
                                        navigateur client.
                                    </li>
                                    <li>
                                        $_SERVER["HTTP_COOKIE"], qui contient le nom et la valeur des cookies lus sur
                                        le poste client.
                                    </li>
                                    <li>$_SERVER["HTTP_HOST"], qui donne le nom de domaine.</li>
                                    <li>$_SERVER["SERVER_ADDR"], qui indique l'adresse IP du serveur.</li>
                                    <li>
                                        $_SERVER["PHP_SELF"], qui contient le nom du script en cours. Nous l'utiliserons souvent dans les formulaires.
                                    </li>
                                    <li>
                                        $_SERVER["QUERY_STRING"], qui contient la chaîne de la requête utilisée pour accéder au script.
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">$_SESSION</th>
                            <td>Contient l'ensemble des noms des variables de session et leur valeurs</td>
                        </tr>
                        <tr>
                            <th scope="row">$_</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">$_</th>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12">
                <h2>Les opérateurs d'affectation combinés</h2>
                <p>En plus de l'opérateur classique d'affectation =, il existe plusieurs opérateurs d'affectation combinée. Ces opérateurs réalisent à la fois une opération entre dexu opérandes et l'affectation du résultat à l'opérande de gauche.</p>

                <table class="table table-striped">
					<thead>
						<tr>
                            <th scope="col">Opérateur</th>
                            <th scope="col">Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">+=</th>
							<td>Addition puis affectation :<br>
								$x += $y équivaut à $x = $x + $y<br>
								$y peut être une expression complexe dont la valeur est un nombre.</td>
						</tr>
						<tr>
							<th scope="row">-=</th>
							<td>Soustraction puis affectation :<br>
								$x -= $y équivaut à $x = $x - $y<br>
								$y peut être une expression complexe dont la valeur est un nombre.</td>
						</tr>
						<tr>
							<th scope="row">*=</th>
							<td>Multiplication puis affectation :<br>
							$x *= $y équivaut à $x = $x * $y<br>
							$y peut être une expression complexe dont la valeur est un nombre.</td>
						</tr>
						<tr>
							<th scope="row">**=</th>
							<td>Puissance puis affectation<br>
							$x**=2 équivaut à $x=($x)²</td>
						</tr>
						<tr>
							<th scope="row">/=</th>
							<td>Division puis affectation :<br>
							$x /= $y équivaut à $x = $x / $y<br>
							$y peut être une expression complexe dont la valeur est un nombre différent de 0.</td>
						</tr>
						<tr>
							<th scope="row">%=</th>
							<td>Modulo puis affectation :<br>
								$x %= $y équivaut à $x = $x % $y $y<br>
								$y peut être une expression complexe dont la valeur est un nombre.</td>
						</tr>
						<tr>
							<th scope="row">.=</th>
							<td>Concaténation puis affectation :<br>
								$x .= $y équivaut à $x = $x . $y<br>
								$y peut être une expression littérale dont la valeur est une chaîne de caractères.</td>
						</tr>
					</tbody>
				</table>
            </div>
            <!-- fin col -->
            <div class="col-sm-12">
                <h2>5- Les constantes</h2><p>Vous serez parfois amené à utiliser de manière répétitive des informations devant rester constantes dans toutes les pages d'un même site. Il peut s'agir de texte ou de nombres qui reviennent souvent. Pour ne pas risquer l'écrasement accidentel de ces valeurs, qui pourrait se produire si elles étaient contenues dans des variables, vous avez tout intérêt à les enregistrer sous forme de constantes personnalisées.</p>
					<p>On peut définir ses constantes soi-même cf. ; Pour définir des constantes personnalisées, utilisez la fonction define(), dont la syntaxe est la suivante : <strong>boolean define(string nom_cte, divers valeur_cte, boolean casse)</strong> Voir la page <a href="../exemples_pages/page_03.php">suivante</a></p>

                <h3>Les constantes prédéfinies</h3>
                <p>Il existe dans PHP un grand nombre de constantes prédéfinies, que vous pouvez notamment utiliser dans les fonctions comme paramètres permettant de définir des options. Nous ne pouvons les citer toutes tant elles sont nombreuses, mais nous les définirons au fur et à mesure de nos besoins. Voir la page <a href="../00-pages/04-constantes_predefinies.php">avec un exemple</a></p>

                <table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Constantes</th>
								<th scope="col">Résultat</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<th scope="row">PHP_VERSION</th>
							<td>PHP_VERSION</td>
							</tr>
							<tr>
							<th scope="row">PHP_OS</th>
							<td>Nom du système d'exploitation du serveur</td>
							</tr>
							<tr>
							<th scope="row">DEFAULT_INCLUDE_PATH</th>
							<td>Chemin d'accès aux fichiers par défaut</td>
							</tr>
							<tr>
							<th scope="row">__FILE__</th>
							<td>Nom du fichier en cours d'exécution</td>
							</tr>
							<tr>
							<th scope="row">__LINE__</th>
							<td>Numéro de la ligne en cours d'exécution</td>   </tr>
						</tbody>
					</table>
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