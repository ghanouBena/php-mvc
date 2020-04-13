<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

/**
* 
*/
class Email 
{
    
    public function sendEmail($subject='',$body='',$isHTML=true)
    {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
                //Server settings
                //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'usr@mail.com';                 // SMTP username
                $mail->Password = 'password';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('usr@mail.com', 'username');
                $mail->addReplyTo('usr@mail.com', 'username');
                $mail->addAddress('usr@mail.com', 'username');     // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');

                    //Attachments
                    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                    //Content
                    if($isHTML){

                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = $subject;
                        $mail->Body    = $body;
                    }else{
                        $mail->AltBody=$body;
                    }

                    $mail->send();
                    //echo 'Message has been sent';
                    $mail = NULL;
                    return true;
            } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        return false;
    }
}
