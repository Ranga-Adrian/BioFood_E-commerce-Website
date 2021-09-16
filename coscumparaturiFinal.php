<?php 
    require_once "conexiune.php";

    if(isset($_POST['finalizeazaCumparaturi'])){

        $nume = $_POST['numeUtilizator'];
        $total = $_POST['taxaTransport'];
        $rec = mysqli_query($conn,"SELECT * FROM `coscumparaturi` WHERE `NUME_UTILIZATOR` = '{$nume}'") or die (mysqli_error($conn));
        
        while($element = mysqli_fetch_array($rec, MYSQLI_ASSOC)){

            $sql="INSERT INTO `coscumparaturiFinal`( `NUME_UTILIZATOR`, `DESCRIERE`, `CANTITATE`, `PRET`, `IMAGINE`, `SUMA_TOTALA`, `STATUS`) 
                VALUES('{$element['NUME_UTILIZATOR']}','{$element['DESCRIERE']}','{$element['CANTITATE']}','{$element['PRET']}',
                        '{$element['IMAGINE']}','{$element['SUMA_TOTALA']}' + '{$total}','In desfasurare')";
            $raspuns1 = mysqli_query($conn,$sql);

        }

        $sql2 = "DELETE FROM `coscumparaturi` WHERE `NUME_UTILIZATOR` = '{$nume}'";
        $raspuns2 = mysqli_query($conn,$sql2);

        //Trimitere mail catre utilizator cu produsele achizitionate

        // $gasireMail = mysqli_query($conn,"SELECT `E-MAIL` FROM `utilizatori` WHERE `NUME_UTILIZATOR` = '{$nume}'") or die (mysqli_error($conn));
        // $listaMail = mysqli_fetch_assoc($gasireMail);
        // $mail = $listaMail['E-MAIL'];
        // echo "E-mailul gasit este: ".$mail;

        // $sqlMail = "SELECT * FROM `coscumparaturiFinal` WHERE `NUME_UTILIZATOR` = '{$nume}'";
        // $sqlMailSuma = mysqli_query($conn,"SELECT SUM(SUMA_TOTALA) AS sumaTotala FROM `coscumparaturiFinal` WHERE `NUME_UTILIZATOR` = '{$nume}'") or die (mysqli_error($conn));
        // $total = mysqli_fetch_assoc($sqlMailSuma);
        // $raspuns3 = mysqli_query($conn,$sqlMail);

        // $mesaj = '<html>'.'<body>'.'<table>'.'<tr>'.'<th>Id comanda</th>'.'<th>Descriere</th>'.'<th>Cantitate</th>'.'<th>Pret</th>'.'<th>Imagine</th>'.'<th>Suma pe cantitate </th>'.'<th>Suma totala de achitat </th>'.'</tr>';
                    

        // while($element = mysqli_fetch_array($raspuns3, MYSQLI_ASSOC)){

        //     $mesaj .='<tr>'.'<td>'.$element['ID_COMANDA'].'</td>'.'<td>'.$element['DESCRIERE'].'</td>'.'<td>'.$element['CANTITATE'].'</td>'
        //                 .'<td>'.$element['DESCRIERE'].'</td>'.'<td>'.$element['CANTITATE'].'</td>'.'<td>'.$element['PRET'].'</td>'
        //                 .'<td>'.'<img src="'.$element['IMAGINE'].'" alt=imagineProdus />'.'</td>'.'<td>'.$element['SUMA_TOTALA'].'</td>'.'</tr>';
        // }

        // $mesaj .='<tr>'.'<td>'.$total['sumaTotala'].'</td>'.'</tr>'.'</table>'.'</body>'.'</html>';

        // ?>

        <!-- <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <form action="trimiteMailComanda.php" method="post" id="formularClient">
                <input type='hidden' name='mesaj' value=<?php echo $mesaj; ?>>
                <input type='hidden' name='nume' value=<?php echo $nume; ?>>
                <input type='hidden' name='email' value=<?php echo $mail; ?>>
                <button type="submit" name="trimiteComandaMail" class="btn btn-warning">Trimite</button>
            </form>
        </body>
        </html>

        <script type="text/javascript">
            document.getElementById('formularClient').submit();
        </script> -->

        <!-- echo "<form action='trimiteMailComanda.php' method='post'>";
        echo "<input type='hidden' name='mesaj' value='$mesaj'>";
        echo "<input type='hidden' name='nume' value='$nume'>";
        echo "<input type='hidden' name='email' value='$mail'>";
        echo "<button type="submit" name="adaugaCos" class="btn btn-warning">Adauga cos</button>"
        echo  "</form>"; -->

        <?php

        header('Location: index.php');
    }
?>