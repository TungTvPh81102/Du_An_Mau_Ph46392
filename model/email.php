<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($name, $phone, $to, $subject, $content)
{

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Cấu hình của SMTP
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tungtvph46392@fpt.edu.vn';                     //SMTP username
        $mail->Password   = 'mafd kfst wmom uswc';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('tungtvph46392@fpt.edu.vn', 'Mailer');
        $mail->addAddress($to);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->ContentType = $name;
        $mail->AltBody = $phone;


        $mail->send();
        echo 'Gửi thành công';
    } catch (Exception $e) {
        echo "Gửi thất bại. Mailer Error: {$mail->ErrorInfo}";
    }
}
