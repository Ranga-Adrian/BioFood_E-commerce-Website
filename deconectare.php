<?php
session_start();
if(isset($_SESSION['NumeUtilizator'])){
    header('location: logareUtilizator.php');
    session_destroy();

}
if(isset($_SESSION['AdminUtilizator'])){
    header('location: logareUtilizator.php');
    session_destroy();

}
if(empty($_SESSION['NumeUtilizator'])){
    header('location: logareUtilizator.php');
    session_destroy();
}


?>