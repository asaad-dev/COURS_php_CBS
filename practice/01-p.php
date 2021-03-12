<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Practice PHP</title>
  </head>
  <body>
    <div class="container bg-info p-5">
      <div class="row">

      <?php

        #ARRAY 
        //An array stores multiple values in one single variable 
        //An array can hold many values under a single name, and you can access the values by referring to an index number
              
        /**
         * Indexed - Arrays with a numeric index
         * Associative - Arrays with named keys
         * Multi-dimennsional - Arrays containing one or more arrays
         */

        // 1- array(); function is used to create an array
        // 2- count(); function is used to get the length of an array


        // Indexed
        //the index can be assigned automatically(index always starts at à):
        $cars = array("Volvo", "BMW", "Toyota");
        //or the index can be assigned manually :
        $cars[0] = "Volvo";
        $cars[1] = "BMW";
        $cars[2] = "Toyota";

        //Array with FOR loop
        $arrlength = count($cars);
        for ($x  = 0; $x < $arrlength; $x++) {
          echo $cars[$x];
          echo "<br>";
        }


        //array with table
        echo "<hr>";
        echo "<pre>";
        $tableau = ["Bonjour", 34, true, 12.15];

        //ajouter un valeur 
        //à la fin (push)
        array_push($tableau, "Fin", 2021);

        var_dump($tableau);
        echo "</pre>";
        echo "<hr>"

      



      ?>

      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>