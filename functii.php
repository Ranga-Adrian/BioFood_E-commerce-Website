<?php 


require('database/DBController.php');

require('database/Produs.php');



// Obiect tip DBController
$db = new DBController();


// Obiect tip Produs
$produs = new Produs($db);

?>