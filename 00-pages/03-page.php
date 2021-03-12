<?php
define("PI",3.1415926535,TRUE); // définition insensible à la casse

echo "La constante  PI vaut ".PI. "<br>";
echo "La constante  PI vaut ".pi. "<br>";


//vérification de l'existence de la constante
if(defined("PI") ) echo "la constante est déjà définiew<br><hr>";
//if(defined("pi") ) echo "la constante est déjà définiew<br>";


define("sitegravillon", "http://www.gravillon.fr", FALSE); // définition sensible à la casse avec FALSE

echo "l'url de Gravillon est : ".siteGRAVILLON. "<hr>";

echo "Visitez le site de <a href=\" ".sitegravillon." \" target=\"_blank\">Gravillon</a>";

?>