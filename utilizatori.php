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
    <title>Admin | Utilizatori</title>

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
        <form action="" method="post">
            <div>
                <label for="Nutilizator">Nume utilizator:</label>
                <input type="text" id="Nutilizator" name="Nutilizator">
            </div>
            <div id="cautaStergeUtilizator">
                <button type="submit" name="cautaUtilizator">Cauta utilizator</button>
                <button type="submit" name="stergeUtilizator">Sterge utilizator</button>
            </div>
        </form>
    </div>

    <?php 
        if(isset($_POST['cautaUtilizator'])){

            $numeUtilizator = $_POST['Nutilizator'];
            
            echo "<table>";  
            echo "<th>ID utilizator</th>";
            echo "<th>Nume</th>";
            echo "<th>Prenume</th>";
            echo "<th>E-mail</th>";
            echo "<th>Adresa</th>";
            echo "<th>Telefon</th>";
            echo "<th>Nume utilizator</th>";

            $select = "SELECT * FROM `utilizatori` WHERE `NUME_UTILIZATOR` = '{$numeUtilizator}'";
            $rezultat = mysqli_query($conn,$select);
            if(mysqli_num_rows($rezultat) === 0)
                echo "<div style='text-align:center;'>Utilizatorul <span style='color:blue;'>$numeUtilizator</span> nu a fost gasit !</div>";
            else {
                    while($element = mysqli_fetch_assoc($rezultat)){

                        echo "<tr>";
                        echo "<td>$element[ID_UTILIZATOR]</td>";
                        echo "<td>$element[NUME]</td>";
                        echo "<td>$element[PRENUME]</td>";
                        echo "<td>";
                        echo $element['E-MAIL'];
                        echo "</td>";
                        echo "<td>$element[ADRESA]</td>";
                        echo "<td>$element[TELEFON]</td>";
                        echo "<td>$element[NUME_UTILIZATOR]</td>";
                        echo "</tr>";
                    }
            }
            
            echo "</table>";

            

        }
        if(isset($_POST['stergeUtilizator'])) {

            $numeUtilizator = $_POST['Nutilizator'];
            $select = "DELETE FROM `utilizatori` WHERE `NUME_UTILIZATOR` = '{$numeUtilizator}'";
            $rezultat = mysqli_query($conn,$select) or die (mysqli_error($conn));
            if(mysqli_affected_rows($conn) == 1)
                echo "<div style='text-align:center;'>Utilizatorul <span style='color:blue;'>$numeUtilizator</span> a fost sters cu succes !</div>";

        }

    ?>

    

    <table>
                <tr>
                    <th>ID utilizator</th>
                    <th>Nume</th>
                    <th>Prenume</th>    
                    <th>E-mail</th>
                    <th>Adresa</th>
                    <th>Telefon</th>
                    <th>Nume utilizator</th>
                </tr>
        <?php 
            $afiseazaUtilizatori = "SELECT * FROM `utilizatori`";
            $rezultat = mysqli_query($conn,$afiseazaUtilizatori) or die (mysqli_error($conn));

        while($element = mysqli_fetch_array($rezultat, MYSQLI_ASSOC)){ ?>
            
                    <tr>
                        <td><?php echo $element['ID_UTILIZATOR']; ?></td><td><?php echo $element['NUME']; ?></td><td><?php echo $element['PRENUME']; ?></td>
                        <td><?php echo $element['E-MAIL']; ?></td><td><?php echo $element['ADRESA']; ?></td><td><?php echo $element['TELEFON'] ?></td>
                        <td><?php echo $element['NUME_UTILIZATOR'] ?></td>
                    </tr>

                    <?php } ?>
    </table>



    <script src="index.js" type="text/javascript"></script>
</body>
</html>