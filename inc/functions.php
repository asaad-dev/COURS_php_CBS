<?php

    function mnPap() {
        echo "<p class=\"lead\"> Minute papillon ! </p>";
    }


    //mini exo : faire une fonction qui affiche les jours de la semaine
    function dateDuJourEn() {
        echo "<p class=\"alert alert-success p-2\">We are " .date("l Y") . "</p>";
    }


    function dateDuJourFr() {
        setlocale(LC_ALL, 'fr_FR');
        echo "<p class=\"alert alert-success p-2\">Aujourd'hui, nous sommes " .strftime("%A %e %B %Y") ."</p>";
    }

    //création d'une fonction pour "var_dump" une varialble (très utile pour un tableau)
    function jeVarDump($maVariable) { //la fonction nommée avec son paraétre, une variable
        echo "<pre><span class=\"bg-danger text-white p-2\">..var_dump</span>";
        echo "<p class=\"alert alert-success p-2 \">";
        var_dump($maVariable); //une variable à laquelle on applique la fonction var_dump
        echo "</p></pre>";
    }

    //création d'une fonction pour "print_r" une varialble (très utile pour un tableau)
    function jePrintr($maVariable) { //la fonction nommée avec son paraétre, une variable
        echo "<pre><span class=\"bg-danger text-white p-2\">..print_r</span>";
        echo "<p class=\"alert alert-warning p-2 w-50\">";
        print_r($maVariable); //une variable à laquelle on applique la fonction print_r
        echo "</p></pre>";
    }


?>