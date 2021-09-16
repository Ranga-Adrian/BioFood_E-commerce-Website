<?php 
    require_once "conexiune.php";
    session_start();

    $codProdus = $_GET['cod_produs'];
    $codFurnizor = $_GET['cod_furnizor'];
    $denumire = $_GET['denumire'];
    $pret = $_GET['pret'];
    $stoc = $_GET['stoc'];
    $imagine = $_GET['imagine'];
    $categorie = $_GET['categorie'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Editeaza produse</title>

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
                <h3>Editeaza un produs</h3>
            </div>
            <form action="editeazaComandaFinala.php" method="post" enctype='multipart/form-data'>
                <fieldset>
                    <div>
                        <label for="CodProdus">Cod produs:</label>
                        <input type="number" id="CodProdus" name="CodProdus" value="<?php echo $codProdus?>" >
                        <input type="hidden" id="CodProdus" name="cod_Produs" value="<?php echo $codProdus?>" >
                    </div>
                    <div>
                        <label for="CodFurnizor">Cod furnizor:</label>
                        <input type="number" id="CodFurnizor" name="CodFurnizor" value="<?php echo $codFurnizor?>" >
                    </div>
                    <div>
                        <label for="Denumire">Denumire:</label>
                        <input type="text" id="Denumire" name="Denumire" value="<?php echo $denumire?>" >
                    </div>
                    <div>
                        <label for="Pret">Pret:</label>
                        <input type="number" step="0.01" id="Pret" name="Pret" value="<?php echo $pret?>">
                    </div>
                    <div>
                        <label for="Stoc">Stoc:</label>
                        <input type="number" id="Stoc" name="Stoc" value="<?php echo $stoc?>" >
                    </div>
                    <div>
                        <label for="Categorie">Categorie:</label>
                        <input type="text" id="Categorie" name="Categorie" value="<?php echo $categorie?>" >
                    </div>
                    <div>
                            <label for="Imagine">Imagine:</label>
                            <input type="text" id="Imagine" name="incarcaImagine" value="<?php echo $imagine?>">
                    </div>
                    <div>
                        <input type="submit" name="editeazaProdus" value="Editeaza produs">
                    </div>

                </fieldset>
            </form>
    </div>


    <script src="index.js" type="text/javascript"></script>
</body>
</html>