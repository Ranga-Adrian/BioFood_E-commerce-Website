<?php 


use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'PHPMailer/src/Exception.php'; 
require 'PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/src/SMTP.php'; 

if(isset($_POST['trimiteComandaMail'])){
    
    $nume = $_POST['nume'];
    $email = $_POST['email'];
    $mesaj = $_POST['mesaj'];

    if(empty($nume) || empty($email) || empty($mesaj)){
        
        echo 'Numele, mail-ul si mesajul sunt obligatorii !';
        exit;
    }

    // $catre = 'fresh_lem0n@yahoo.com';
    // $emailSubiect = 'Cineva doreste sa te contacteze !';
    // $emailContinut = 'Ai primit un mesaj nou de la utilizatorul '.$nume."\r\n".
    //                 'Adresa acestuia de email: '.$email."\n". 
    //                 'Mesajul acestuia este: '."\r\n".$mesaj."\n";
    // $deLa  = 'MIME-Version: 1.0' . "\r\n";
    // $deLa .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // $deLa .='De la: '.$email."\r\n".'X-Mailer: PHP/' . phpversion();

    // //Trimitere email:
    // if(mail($catre,$emailSubiect,$emailContinut,$deLa)){
    //     header('Location: index.php');
    // } else {
    //     echo 'Email esuat...';
    // }

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gfg.com;';                    
        $mail->SMTPAuth   = true;                             
        $mail->Username   = 'rangaadrian@yahoo.com';                 
        $mail->Password   = 'vxrffhotejoaxrgg';                        
        $mail->SMTPSecure = 'ssl';                              
        $mail->Port       = 465;  
    
        $mail->setFrom('rangaadrian@yahoo.com', 'BioFood');           
        $mail->addAddress($email);
    
        $mail->isHTML(true);                                  
        $mail->Subject = 'Lista produselor comandate de pe site-ul BioFood';
        $mail->Body    = $mesaj;
        
        $mail->send();
        echo "Mail has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header('Location: index.php');
}

?>