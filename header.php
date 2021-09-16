<?php
session_start();
if(isset($_SESSION['TipUtilizator'])){
    if($_SESSION['TipUtilizator'] != 'utilizator'){
        header('Location: index_admin.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioFood | Acasă</title>

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Owl-carousel link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- iconite font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS links -->
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="css/all.css" type="text/css">

    <?php 
    require('functii.php')
    ?>
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



    <main id="main-site">

