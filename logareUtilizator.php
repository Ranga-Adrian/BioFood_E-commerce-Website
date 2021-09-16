<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioFood | Autentificare</title>

    <link rel="stylesheet" href="loginStyle.css" type="text/css">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body id="logare">

    <div id="container">
        <div id="inregistrare">
            <div>
                <h3>Inregistrare</h3>
            </div>
            <form action="autentificare.php" method="post">
                <fieldset>
                    <div>
                        <label for="nume">Nume:</label>
                        <input type="text" id="nume" name="nume" placeholder="Ex: Ion">
                    </div>
                    <div>
                        <label for="prenume">Prenume:</label>
                        <input type="text" id="prenume" name="prenume" placeholder="Ex: Zapada">
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" placeholder="Ex: mailul@tau.com">
                    </div>
                    <div>
                        <label for="Telefon">Telefon:</label>
                        <input type="number" id="telefon" name="telefon" placeholder="Ex: 0765066024">
                    </div>
                    <div>
                        <label for="Adresa">Adresa:</label>
                        <input type="text" id="adresa" name="adresa" placeholder="Ex: Strada Izvorului, Nr. 21 ...">
                    </div>
                    <div>
                        <label for="Nutilizator">Nume utilizator:</label>
                        <input type="text" id="Nutilizator" name="Nutilizator">
                    </div>
                    <div>
                        <label for="Putilizator">Parola utilizator:</label>
                        <input type="password" id="Putilizator" name="Putilizator" placeholder="***********">
                    </div>
                    <div>
                        <input type="submit" name="inregistrare" value="Inregistrare">
                    </div>

                </fieldset>
            </form>
        </div>
        <div id="autentificare">
            <h3>Autentificare</h3>
            <form action="autentificare.php" method="post">
                <fieldset>
                    <div>
                        <label for="Nutilizator">Nume utilizator:</label>
                        <input type="text" id="Nutilizator" name="Nutilizator">
                    </div>
                    <div>
                        <label for="Putilizator">Parola utilizator:</label>
                        <input type="password" id="Putilizator" name="Putilizator" placeholder="***********">
                    </div>
                    <div>
                        <input type="submit" name="autentificare" value="Autentificare">
                    </div>
                </fieldset>

                <?php 

                    $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if(strpos($fullUrl,"login=empty") == true){

                        echo "<p style='color:red;'>Nu sunt completate toate campruile</p>";

                        exit();

                    }

                    elseif(strpos($fullUrl,"login=wrong") == true){

                        echo "<p style='color:red;'>Numele sau parola este gresita</p>";

                        exit();

                    }

                    ?>

            </form>
        </div>
    </div>

</body>

</html>