<?php 
    require_once "conexiune.php";
    session_start();

    if(isset($_POST['adaugaProdus'])){
        
        $codProdus = $_POST['CodProdus'];
        $codFurnizor = $_POST['CodFurnizor'];
        $denumire = $_POST['Denumire'];
        $pret = $_POST['Pret'];
        $stoc = $_POST['Stoc'];
        $categorie = $_POST['Categorie'];
            
        $imagine = $_FILES['incarcaImagine']['name'];
        $numeFisierTemp = $_FILES['incarcaImagine']['tmp_name'];

        $folder = "./assets/images/".$imagine; // folderul în care se încarcă imaginea

        if(move_uploaded_file($numeFisierTemp, $folder)){
            echo "Imagine incarcata cu succes!";
        } else {
            echo "Incarcarea imaginii a esuat :(";
        }

        $querry = "INSERT INTO `produse`(`COD_PRODUS`,`COD_FURNIZOR`,`DENUMIRE`,`PRET`,`STOC`,`IMAGINE`,`CATEGORIE`) VALUES ('{$codProdus}','{$codFurnizor}',
                    '{$denumire}','{$pret}','{$stoc}','{$folder}','{$categorie}')";
        
        $raspuns = mysqli_query($conn,$querry);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Adauga produse</title>

    <link rel="stylesheet" href="adminStyle.css" type="text/css">
</head>
<body id="adaugareProdus">
    
    <header>
        <a href="index_admin.php" class="logo" alt='logo' style="color: hsl(135, 78%, 14%);"><span
                style="color: hsl(84, 80%, 53%);">Bio</span>Food</a>
        <nav>
            <ul class="nav_link">
                <li><a href="index_admin.php">Vizualizare produse</a></li>
                <li><a href="adaugaProdus.php">Adaugare produse</a></li>
                <li><a href="stergeProdus.php">Stergere produse</a></li>
                <li><a href="coscumparaturi.php">Cos cumparaturi</a></li>
                <li><a href="utilizatori.php">Utilizatori</a></li>
                <li><a href="deconectare.php" id="delog"> Deconectare [<?php echo $_SESSION['AdminUtilizator'];?>]</a></li>
            </ul>
        </nav>

    </header>

    <div id="adaugaProdus">
            <div>
                <h3>Adauga un produs</h3>
            </div>
            <form action="" method="post" enctype='multipart/form-data'>
                <fieldset>
                    <div>
                        <label for="CodProdus">Cod produs:</label>
                        <input type="number" id="CodProdus" name="CodProdus" >
                    </div>
                    <div>
                        <label for="CodFurnizor">Cod furnizor:</label>
                        <input type="number" id="CodFurnizor" name="CodFurnizor" >
                    </div>
                    <div>
                        <label for="Denumire">Denumire:</label>
                        <input type="text" id="Denumire" name="Denumire" >
                    </div>
                    <div>
                        <label for="Pret">Pret:</label>
                        <input type="number" step="0.01" id="Pret" name="Pret">
                    </div>
                    <div>
                        <label for="Stoc">Stoc:</label>
                        <input type="number" id="Stoc" name="Stoc" >
                    </div>
                    <div>
                        <label for="Categorie">Categorie:</label>
                        <input type="text" id="Categorie" name="Categorie" >
                    </div>
                    <div>
                            <label for="Imagine">Imagine:</label>
                            <input type="file" id="Imagine" name="incarcaImagine">
                    </div>
                    <div>
                        <input type="submit" name="adaugaProdus" value="Inregistrare">
                    </div>

                </fieldset>
            </form>
    </div>


    <script src="index.js" type="text/javascript"></script>
</body>
</html>