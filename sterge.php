<?php require_once "conexiune.php";


$id_comanda = $_GET['id_comanda'];
$stoc = $_GET['stoc'];
$descriere = $_GET['descriere'];

echo $id_comanda;
$stergereSQL = "DELETE FROM `coscumparaturi` WHERE `ID_COMANDA`='{$id_comanda}'";
$stocInapoiat = "UPDATE `produse` SET `STOC` = `STOC` + '$stoc' WHERE `DENUMIRE` = '$descriere'";

mysqli_query($conn,$stocInapoiat);

mysqli_query($conn,$stergereSQL);

header('Location: cos.php?stergere=succes');

?>