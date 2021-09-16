<?php require_once "conexiune.php";

session_start();

if(isset($_SESSION['NumeUtilizator'])){


    $id_comanda = $_GET['id_comanda'];
    $stocInapoiat = $_GET['cantitate'];
    $descriere = $_GET['descriere'];

    echo $id_comanda;
    $stergereSQL = "DELETE FROM `coscumparaturifinal` WHERE `ID_COMANDA`='{$id_comanda}'";
    $stocInapoiat = "UPDATE `produse` SET `STOC` = `STOC` + '$stocInapoiat' WHERE `DENUMIRE` = '$descriere'";

    mysqli_query($conn,$stocInapoiat);

    mysqli_query($conn,$stergereSQL);

    header('Location: index.php?stergere=succes');

}elseif(isset($_SESSION['AdminUtilizator'])){


    $id_comanda = $_GET['id_comanda'];
    $stocInapoiat = $_GET['cantitate'];
    $descriere = $_GET['descriere'];

    echo $id_comanda;
    $stergereSQL = "DELETE FROM `coscumparaturifinal` WHERE `ID_COMANDA`='{$id_comanda}'";
    $stocInapoiat = "UPDATE `produse` SET `STOC` = `STOC` + '$stocInapoiat' WHERE `DENUMIRE` = '$descriere'";

    mysqli_query($conn,$stocInapoiat);

    mysqli_query($conn,$stergereSQL);

    header('Location: coscumparaturi.php?stergere=succes');
}



?>