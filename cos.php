<?php 
    //include header.php
    include('header.php')
?>


<?php 
    require_once "conexiune.php";
    if(empty($_SESSION['NumeUtilizator'])){
        header('Location: logareUtilizator.php?');
    }
    $sumaTotala = isset($_POST['sumaTotala']) ? $_POST['sumaTotala'] : 0;
    $nume = $_SESSION['NumeUtilizator'];
    if(isset($_POST['adaugaCos'])){
        $cantitate = $_POST['cantitate'];
        $DENUMIRE = $_POST['DENUMIRE'];
        $PRET = $_POST['PRET'];
        $sumaTotala = $cantitate * $PRET;
        $IMAGINE = $_POST['IMAGINE'];
        $CATEGORIE = $_POST['CATEGORIE'];

        $sql="INSERT INTO `coscumparaturi`( `NUME_UTILIZATOR`, `DESCRIERE`, `CANTITATE`, `PRET`, `IMAGINE`, `SUMA_TOTALA`) 
                            VALUES('{$nume}','{$DENUMIRE}','{$cantitate}','{$PRET}','{$IMAGINE}','{$sumaTotala}')";
        mysqli_query($conn,$sql);
        mysqli_query($conn,"UPDATE `produse` SET `STOC` = `STOC` - '$cantitate' WHERE `DENUMIRE` = '$DENUMIRE'");

    }
    count($produs->getData('coscumparaturi')) ? include('Template/_cos.php') : include('Template/_cosGol.php');


?>

<?php 
    //include _vanzariTop.php
    include('Template/_vanzariTop.php')

?>



<?php 
    //include footer.php
    include('footer.php');

?>