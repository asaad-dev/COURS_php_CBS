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

?>