<?php 
    require_once "conexiune.php";
    session_start();

    $status = $_GET['status'];
    $numeUtilizator = $_GET['numeUtilizator'];
    $id_comanda = $_GET['id_comanda'];

    if($status == 'Efectuata'){
        $sql = mysqli_query($conn,"UPDATE `coscumparaturifinal` SET `STATUS` = 'In desfasurare' WHERE `NUME_UTILIZATOR`='$numeUtilizator' 
                            AND `ID_COMANDA` = '$id_comanda'") or die (mysqli_error($conn));
    } else {
        $sql = mysqli_query($conn,"UPDATE `coscumparaturifinal` SET `STATUS` = 'Efectuata' WHERE `NUME_UTILIZATOR`='$numeUtilizator' 
                            AND `ID_COMANDA` = '$id_comanda'") or die (mysqli_error($conn));
    }

    header('Location: coscumparaturi.php');

?>
