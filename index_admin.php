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
    <title>Admit DashBoard</title>

    <link rel="stylesheet" href="adminStyle.css" type="text/css">
</head>
<body>
    
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
    

    <table>
                <tr>
                    <th>Cod produs</th>
                    <th>Cod furnizor</th>
                    <th>Denumire</th>    
                    <th>Pret</th>
                    <th>Stoc</th>
                    <th>Imagine</th>
                    <th>Categorie</th>
                    <th>Editare</th>
                </tr>
        <?php 
            $afiseazaProduse = "SELECT * FROM `produse`";
            $rezultat = mysqli_query($conn,$afiseazaProduse) or die (mysqli_error($conn));

        while($element = mysqli_fetch_array($rezultat, MYSQLI_ASSOC))
            if($element['STOC'] > 0){ ?>

                    <tr>
                        <td><?php echo $element['COD_PRODUS']; ?></td><td><?php echo $element['COD_FURNIZOR']; ?></td>
                        <td><?php echo $element['DENUMIRE']; ?></td><td><?php echo $element['PRET']; ?></td>
                        <td><?php echo $element['STOC']; ?></td>
                        <td style="border:1px solid black; align:center;"><img style="width:100px; height:100px;" src="<?php echo $element['IMAGINE'] ?>"></td>
                        <td style="border:1px solid black; align:center;"><?php echo $element['CATEGORIE'] ?></td>
                        <td><?php echo '<a href="editareComanda.php?cod_produs=' .$element['COD_PRODUS'].'&cod_furnizor=' .$element['COD_FURNIZOR'].
                                            '&denumire=' .$element['DENUMIRE'] .'&pret=' .$element['PRET'] .'&stoc=' .$element['STOC'] .'&imagine=' .$element['IMAGINE']
                                            .'&categorie=' .$element['CATEGORIE'] .'">Editare</a>'; ?></td>
                    </tr>
                    <?php } elseif ($element['STOC'] == 0) { ?>
                
                            <tr><td><?php echo $element['COD_PRODUS'] ?></td><td><?php echo $element['COD_FURNIZOR'] ?></td><td><?php echo $element['DENUMIRE'] ?></td>
                            <td><?php echo $element['PRET'] ?></td><td style="background-color:yellow; color:red;">Stoc epuizat</td>
                            <td><img style="width:100px; height:100px;" src="<?php echo $element['IMAGINE'] ?>"></td><td><?php echo $element['CATEGORIE'] ?></td>
                            <td><?php echo '<a href="editareComanda.php?cod_produs=' .$element['COD_PRODUS'].'&cod_furnizor=' .$element['COD_FURNIZOR'].
                                            '&denumire=' .$element['DENUMIRE'] .'&pret=' .$element['PRET'] .'&stoc=' .$element['STOC'] .'&imagine=' .$element['IMAGINE']
                                            .'&categorie=' .$element['CATEGORIE'] .'">Editare</a>'; ?></td></tr>

                    <?php } ?>
    </table>


    <script src="index.js" type="text/javascript"></script>
</body>
</html>