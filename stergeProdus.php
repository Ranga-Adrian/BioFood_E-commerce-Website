<?php 
    require_once "conexiune.php";
    session_start();

    if(isset($_POST['stergeProdus'])){
        
        $codProdus = $_POST['CodProdus'];
        $querry = "DELETE FROM `produse` WHERE `COD_PRODUS`={$codProdus}";
        
        $raspuns = mysqli_query($conn,$querry);

        if(mysqli_query($conn,$raspuns) === TRUE)
            echo "Produsul a fost sters cu succes";
        else
            echo "Eroare la conectare!";

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Sterge produse</title>

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
                <h3>Sterge un produs</h3>
            </div>
            <form action="" method="post">
                <fieldset>
                    <div>
                        <label for="CodProdus">Cod produs:</label>
                        <input type="number" id="CodProdus" name="CodProdus" >
                    </div>
                    <div>
                        <input type="submit" name="stergeProdus" value="Sterge">
                    </div>

                </fieldset>
            </form>
    </div>


    <script src="index.js" type="text/javascript"></script>
</body>
</html>