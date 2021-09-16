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
    <title>Admin | Cos cumparaturi</title>

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
    
    <div id="utilizatori">
        <form action="vizualizareCumparaturi.php" method="post">
            <div>
                <label for="Nutilizator">Nume utilizator:</label>
                <input type="text" id="Nutilizator" name="Nutilizator">
            </div>
            <div id="cautaStergeUtilizator">
                <button type="submit" name="cautaUtilizator">Cauta utilizator</button>
            </div>
        </form>
    </div>

    <table>
                <tr>
                    <th>Id comanda</th>
                    <th>Nume utilizator</th>
                    <th>Descriere</th>    
                    <th>Cantitate</th>
                    <th>Pret</th>
                    <th>Imagine</th>
                    <th>Suma totala</th>
                    <th>Status</th>
                </tr>
        <?php 
            $afiseazaProduse = "SELECT * FROM `coscumparaturifinal`";
            $rezultat = mysqli_query($conn,$afiseazaProduse) or die (mysqli_error($conn));

        while($element = mysqli_fetch_array($rezultat, MYSQLI_ASSOC))
            if($element['STATUS'] == 'In desfasurare'){?>
            
                    <tr>
                        <td><?php echo $element['ID_COMANDA']; ?></td><td><?php echo $element['NUME_UTILIZATOR']; ?></td><td><?php echo $element['DESCRIERE']; ?></td>
                        <td><?php echo $element['CANTITATE']; ?></td><td><?php echo $element['PRET']; ?></td>
                        <td><img style="width:100px; height:100px;" src="<?php echo $element['IMAGINE'] ?>"></td><td><?php echo $element['SUMA_TOTALA'] ?></td>
                        <td style="color:red;"><?php echo $element['STATUS'] ?></td>
                    </tr>

                    <?php } elseif($element['STATUS'] == 'Efectuata'){ ?>
                    
                        <tr>
                            <td><?php echo $element['ID_COMANDA']; ?></td><td><?php echo $element['NUME_UTILIZATOR']; ?></td>
                            <td><?php echo $element['DESCRIERE']; ?></td><td><?php echo $element['CANTITATE']; ?></td>
                            <td><?php echo $element['PRET']; ?></td><td><img style="width:100px; height:100px;" src="<?php echo $element['IMAGINE'] ?>"></td>
                            <td><?php echo $element['SUMA_TOTALA'] ?></td><td style="color:green;"><?php echo $element['STATUS'] ?></td>
                        </tr>

                    <?php }?>

            <?php 

                $sqlMailSumaIncasata = mysqli_query($conn,"SELECT SUM(SUMA_TOTALA) AS sumaTotala FROM `coscumparaturiFinal` WHERE `STATUS`='Efectuata'") or die (mysqli_error($conn));
                $totalEfectuat = mysqli_fetch_assoc($sqlMailSumaIncasata);
                $sqlMailSumaDeIncasat = mysqli_query($conn,"SELECT SUM(SUMA_TOTALA) AS sumaDeIncasat FROM `coscumparaturiFinal` WHERE `STATUS`='In desfasurare'") or die (mysqli_error($conn));
                $totalDeIncasat = mysqli_fetch_assoc($sqlMailSumaDeIncasat);
            ?>
    </table>
                    
    <table>
    <tr>
                        <td style="font-size:1.6em; height:3em;">Suma incasata pentru platile efectuate: </td>
                        <td style="color:green;"><?php echo $totalEfectuat['sumaTotala']?> lei</td>
                    </tr>
                    <tr>
                        <td style="font-size:1.6em; height:3em">Suma de incasat pentru platile in asteptare: </td>
                        <td style="color:red;"><?php echo $totalDeIncasat['sumaDeIncasat']?> lei</td>
                    </tr>
    </table>


    <script src="index.js" type="text/javascript"></script>
</body>
</html>