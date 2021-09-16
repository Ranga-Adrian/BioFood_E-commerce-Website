<?php 

if(isset($_POST['trimiteMail'])){
    
    $nume = $_POST['nume'];
    $email = $_POST['email'];
    $subiect = $_POST['subiect'];
    $mesaj = $_POST['mesaj'];

    if(empty($nume) || empty($email) || empty($mesaj)){
        
        echo 'Numele, mail-ul si mesajul sunt obligatorii !';
        exit;
    }

    $catre = 'fresh_lem0n@yahoo.com';
    $emailSubiect = 'Cineva doreste sa te contacteze !';
    $emailContinut = 'Ai primit un mesaj nou de la utilizatorul '.$nume."\r\n".
                    'Adresa acestuia de email: '.$email."\n". 
                    'Mesajul acestuia este: '.$mesaj."\n";
    $deLa  = 'MIME-Version: 1.0' . "\r\n";
    $deLa .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $deLa .='De la: '.$email."\r\n".'X-Mailer: PHP/' . phpversion();

    //Trimitere email:
    if(mail($catre,$emailSubiect,$emailContinut,$deLa)){
        header('Location: index.php');
    } else {
        echo 'Email esuat...';
    }
}

?>