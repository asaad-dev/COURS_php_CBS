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

        // # array(); or [] function is used to create an array
        // # count(); function is used to get the length of an array


        //  1- Indexed
        //the index can be assigned automatically(index always starts at à):
        $cars = array("Volvo", "BMW", "Toyota");
        $price = ["Honda", "Ford"];
        var_dump ($price);
      
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

        // 2- Associative arrays
        //Are arrays that use named keys that you assign to them
        $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"40");
        //or
        $age["Peter"] = "35";
        $age["Ben"] = "37";
        $age["Joe"] = "40";

        echo "Peter is " .$age["Peter"] . " years old.";

        /**
         *  Loop through an associative array
         * FOREACH
         */
        foreach($age as $x => $x_value) {
          echo "Key=" .$x. ", Value=" .$x_value;
          echo "<br>";
        }

        //  3- Multidimensional arrays
        //a multidimensional array containing one or more arrays.
        $cars2 = array(
          array("Volvo", 22,18),
          array("BMW", 15,13),
          array("Saab", 5,2),
          array("Land Rover",17,15)
        );
        
        for ($row = 0; $row < 4; $row++) {
          echo "<p><b>Row number $row</b></p>";
          echo "<ul>";
          for ($col = 0; $col < 3; $col++) {
            echo "<li>".$cars2[$row][$col]."</li>";
          }
          echo "</ul>";
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