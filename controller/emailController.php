<?php
require(__DIR__."/../PHPMailer/src/PHPMailer.php");
require(__DIR__."/../PHPMailer/src/SMTP.php");
require(__DIR__."/../PHPMailer/src/Exception.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class emailController{

    public function email($userName,$email,$otpcode)
    {
        $mail = new PHPMailer(true);

        define('HOST','mail4.serv00.com');
        define('HOST_USERNAME','ebuka-practice@ebuka-practice.serv00.net');
        define('HOST_PASSWORD','123Mickey11#');


        try{
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = HOST_USERNAME;                     //SMTP username
            $mail->Password   = HOST_PASSWORD;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        
            //Recipients
            $mail->setFrom(HOST_USERNAME, 'From Megamindest Solutions');
            $mail->addAddress($email, 'user');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Verification code';
            $mail->Body    = "
                <html>
                    <body>
                        <table border='0' width='100%' cellpadding='0' cellspacing='0'style='background-color: #353136; padding:10px'>
                            <tr >
                                <th style='color: #469D9D'>EMM Verification Team</th>
                            </tr>
                            <tr>
                                <td style='padding: 10px'>
                                    <table width='600' cellpadding='0' cellspacing='0' border='0' align='center'>
                                        <tr>
                                            <td>
                                                Hellow $userName Here is your Verification code
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Verification code: $otpcode
                                            </td>
                                        <tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </body>
                </html>
            ";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo json_encode(["status" => true, "message" =>'OTP sent to your email']);
        } catch(Exception $e){
            echo json_encode(["status" => true, "message" => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
        }





    


    }
}