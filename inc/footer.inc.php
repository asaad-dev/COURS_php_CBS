
<footer class="footer mt-auto py-3 bg-dark">
  <div class="container text-center pt-3">
    <span class="text-white">Cours PHP 7 -  
    <?php 
        setlocale(LC_ALL, 'fr_FR');
        echo strftime("%A %e %B %Y");
        echo ' - ';

        date_default_timezone_set("Europe/Paris");
        echo date('H:i:s');
    ?>

    </span>
    <hr class="bg-white">
</div>
</footer>
<!--  cf. https://www.php.net/manual/fr/datetime.format.php 
        https://www.php.net/manual/fr/function.setlocale.php
-->
