<?php 
session_start();
require_once "conexiune.php";

if(isset($_POST["autentificare"])){
    $numeUtilizator = $_POST["Nutilizator"];
    $parolaUtilizator = $_POST["Putilizator"];

    $query = "SELECT * FROM `utilizatori` WHERE `NUME_UTILIZATOR`='{$numeUtilizator}' AND `PAROLA`='{$parolaUtilizator}'";
    $rezultat=mysqli_query($conn,$query);
    if(empty($numeUtilizator) || empty($parolaUtilizator)){
        header('Location: logareUtilizator.php?login=empty');
        exit();
    } else {

        if(mysqli_num_rows($rezultat) > 0){
            while($row=mysqli_fetch_assoc($rezultat)){
                if($row["TIP_UTILIZATOR"]=="admin"){
                    
                    $_SESSION['AdminUtilizator']=$row["NUME_UTILIZATOR"];
                    $_SESSION['TipUtilizator']=$row['TIP_UTILIZATOR'];
                    header('Location: index_admin.php');

                }
                    if($row["TIP_UTILIZATOR"]=="utilizator"){
                            $_SESSION['NumeUtilizator']=$row["NUME_UTILIZATOR"];
                            $_SESSION['TipUtilizator']=$row['TIP_UTILIZATOR'];
                            header('Location: index.php');

                    }
            }
        } else{
            header('Location: logareUtilizator.php?login=wrong');
            exit();
        }
    }
}  elseif(isset($_POST["inregistrare"])) {
    $nume = $_POST["nume"];
    $prenume = $_POST["prenume"];
    $email = $_POST["email"];
    $telefon = $_POST["telefon"];
    $adresa = $_POST["adresa"];
    $numeUtilizator = $_POST["Nutilizator"];
    $parolaUtilizator = $_POST["Putilizator"];
    $query2="SELECT * FROM `utilizatori` WHERE `NUME_UTILIZATOR`='{$numeUtilizator}'";
    $rezultat=mysqli_query($conn,$query2);
    if(mysqli_num_rows($rezultat) == 1){
            echo "Nume de utilizator deja ales";
            header('Location: logareUtilizator.php?login=NumeUtilizatorExistent');
    }else{
            $inregistrare="INSERT INTO `utilizatori`( `NUME`, `PRENUME`, `E-MAIL`, `PAROLA`, `ADRESA`, `TELEFON`, `TIP_UTILIZATOR`, `NUME_UTILIZATOR`)
                            VALUES('{$nume}','{$prenume}','{$email}','{$parolaUtilizator}','{$adresa}','{$telefon}','utilizator','{$numeUtilizator}')";
            mysqli_query($conn,$inregistrare);
            $_SESSION['NumeUtilizator']=$numeUtilizator;
            $_SESSION['TipUtilizator']='utilizator';
            echo "Inregistrare facuta cu succes !";
            header('Location: index.php?login=succes');
    }

    
}
?>