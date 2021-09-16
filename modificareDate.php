<?php 
    require_once "conexiune.php";
    session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioFood | Editeaza date</title>

        <!-- iconite font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- CSS links -->
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="css/all.css" type="text/css">

</head>
<body id="modificaDate">
    
    <header>
        <a href="index.php" class="logo" alt='logo' style="color: hsl(135, 78%, 14%);"><span
                style="color: hsl(84, 80%, 53%);">Bio</span>Food</a>
        <nav>
        <ul class="nav_link">
                <li><a href="index.php">Acasa</a></li>
                <li><a href="#gama-produse">Produse</a></li>
                <?php if(isset($_SESSION['NumeUtilizator'])){ ?>
                    <li><a href="modificareDate.php">Date client</a></li>
                    <li><a href="comenziClient.php">Comenzi client</a></li>
                    <?php }?>
                <li><a href="#blog">Blog</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="cos.php"><i class="fas fa-shopping-cart"></i> Cos cumparaturi</a></li>
        <?php if(isset($_SESSION['NumeUtilizator'])){ ?>
                <li><a href="deconectare.php" id="aut"> Deconectare [<?php echo $_SESSION['NumeUtilizator']; ?>]</a><li>
        <?php } else {?>
            <li><a href="deconectare.php" id="aut">Autentificare [Vizitator]</a><li>
            <?php } ?>
            </ul>
        </nav>

    </header>

    <?php 

        $sql = mysqli_query($conn, "SELECT * FROM `utilizatori` WHERE `NUME_UTILIZATOR` = '{$_SESSION['NumeUtilizator']}'") or die (mysqli_error($conn));

        while($rasp = mysqli_fetch_assoc($sql)){?>
    
    <div id="modificaDate">
            <div>
                <h3>Modifică datele contului</h3>
            </div>
            <form action="" method="post" enctype='multipart/form-data'>
                <fieldset>
                    <div>
                        <label for="Nume">Nume:</label>
                        <input type="text" id="Nume" name="Nume" value="<?php echo $rasp['NUME'];?>" >
                    </div>
                    <div>
                        <label for="Prenume">Prenume:</label>
                        <input type="text" id="Prenume" name="Prenume" value="<?php echo $rasp['PRENUME'];?>" >
                    </div>
                    <div>
                        <label for="Email">E-mail:</label>
                        <input type="text" id="Email" name="Email" value="<?php echo $rasp['E-MAIL'];?>" >
                    </div>
                    <div>
                        <label for="Parola">Parolă:</label>
                        <input type="text" id="Parola" name="Parola" value="<?php echo $rasp['PAROLA'];?>">
                    </div>
                    <div>
                        <label for="Adresa">Adresă:</label>
                        <input type="text" id="Adresa" name="Adresa" value="<?php echo $rasp['ADRESA'];?>" >
                    </div>
                    <div>
                        <label for="Telefon">Telefon:</label>
                        <input type="number" id="Telefon" name="Telefon" value="<?php echo $rasp['TELEFON'];?>" >
                    </div>
                    <div>
                            <label for="Nutilizator">Nume utilizator:</label>
                            <input type="text" id="Nutilizator" name="Nutilizator" value="<?php echo $rasp['NUME_UTILIZATOR'];?>">
                            <input type="hidden" id="Nutilizator" name="identificator" value="<?php echo $rasp['NUME_UTILIZATOR'];?>">
                    </div>
                    <div>
                        <input type="submit" name="modificaDate" value="Modifică datele">
                    </div>
                    <?php } ?>

                </fieldset>
            </form>
    </div>

    <?php 

    if(isset($_POST['modificaDate'])){

        $nume = $_POST['Nume'];
        $prenume = $_POST['Prenume'];
        $email = $_POST['Email'];
        $parola = $_POST['Parola'];
        $adresa = $_POST['Adresa'];
        $telefon = $_POST['Telefon'];
        $numeUtilizator = $_POST['Nutilizator'];
        $identificator = $_POST['identificator'];

        $querry = "UPDATE `utilizatori` SET `NUME`='{$nume}',`PRENUME`='{$prenume}',`E-MAIL`='{$email}',`PAROLA`='{$parola}',`ADRESA`='{$adresa}',
                `TELEFON`='{$telefon}',`NUME_UTILIZATOR`='{$numeUtilizator}' WHERE `NUME_UTILIZATOR`='{$identificator}'";

        if($conn->query($querry) === TRUE){
            echo "Datele au fost modificate cu succes";
            header("Location: index.php?modificareDate=succes");
        } else {
            echo "Eroare la conectare!";
        }

    }
    
    ?>


    <script src="index.js" type="text/javascript"></script>
</body>
</html>