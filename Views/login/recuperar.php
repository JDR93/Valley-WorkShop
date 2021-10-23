<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "Libraries/PHPMailer-master/src/Exception.php";
require_once "Libraries/PHPMailer-master/src/PHPMailer.php";
require_once "Libraries/PHPMailer-master/src/SMTP.php";

$correo = $_POST["correo"];





if (!empty($correo)) {

    if (filter_var($correo, FILTER_VALIDATE_EMAIL) != true) {

        echo json_encode(['filter' =>  false]);
    } else {

        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 0;                                       //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'valleyworkshopenterprise@gmail.com';                     //SMTP username
        $mail->Password   = 'jhoan_93';                                //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('valleyworkshopenterprise@gmail.com', 'ValleyworkShop Enterprise');
        $mail->addAddress($correo);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Asunto';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

        $mail->send();
        if ($mail->send()) {
            echo json_encode(['send' => true]);
        }
    }
} else {
    echo json_encode(['correo' =>  $correo, 'error' => true]);
}
