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
    <title>Client | Cos cumparaturi</title>

        <!-- iconite font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- CSS links -->
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="css/all.css" type="text/css">   
        <!-- <link rel="stylesheet" href="adminStyle.css" type="text/css"> -->

</head>
<body>
    
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
    
    <table>
                <tr>
                    <th>Id comanda</th>
                    <th>Descriere</th>    
                    <th>Cantitate</th>
                    <th>Pret</th>
                    <th>Imagine</th>
                    <th>Suma de plata</th>
                    <th>Actiune</th>
                </tr>
        <?php 
            $afiseazaComenzi = "SELECT * FROM `coscumparaturifinal` WHERE `NUME_UTILIZATOR`='{$_SESSION['NumeUtilizator']}'";
            $rezultat = mysqli_query($conn,$afiseazaComenzi) or die (mysqli_error($conn));

        while($element = mysqli_fetch_array($rezultat, MYSQLI_ASSOC)){?>

                    <tr>
                        <td><?php echo $element['ID_COMANDA'] ?></td><td><?php echo $element['DESCRIERE'] ?></td>
                        <td><?php echo $element['CANTITATE'] ?></td><td><?php echo $element['PRET'] ?></td>
                        <td style="border:1px solid black; align:center;"><img style="width:100px; height:100px;" src="<?php echo $element['IMAGINE'] ?>"></td>
                        <td style="border:1px solid black; align:center;"><?php echo $element['SUMA_TOTALA'] ?></td>
                        <td><?php echo '<a href="stergeComandaAdmin.php?id_comanda=' .$element['ID_COMANDA'].
                                        '&descriere=' .$element['DESCRIERE'] .'&cantitate=' .$element['CANTITATE'] .'">Sterge</a>'; ?></td>
                    </tr>
                    <?php } ?>
    </table>


    <script src="index.js" type="text/javascript"></script>
</body>
</html>