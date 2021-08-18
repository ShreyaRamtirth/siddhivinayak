<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   
   require './PHPMailer/src/Exception.php';
   require './PHPMailer/src/PHPMailer.php';
   require './PHPMailer/src/SMTP.php';


    

    $mail = new PHPMailer(true);

    $mailer_Fname=$_POST['fname'];
    $mailer_lname=$_POST['lname'];
    $mailer_email=$_POST['email'];
    $mailer_phno=$_POST['phno'];
    $mailer_msg=$_POST['message'];
  
    header('location:msgSent.html');
    try {
        $mail->SMTPDebug  =  2;
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;                              
        $mail->Username   = 'shreyaramtirth4@gmail.com';                   
        $mail->Password   = 'coolshreya241020';
        $mail->SMTPSecure = 'tls'; 
        $mail->Port       = 587;  


        $mail->setFrom($mailer_email, $mailer_Fname);
        $mail->addAddress($mailer_email, $mailer_Fname);  
        $mail->addAddress('shreyaramtirth4@gmail.com',$mailer_Fname);
        $mail->isHTML(true);                    
        $mail->Subject = 'WLC Customer Mail';
        $mail->Body    = $mailer_msg;
        $mail->AltBody = $mailer_msg;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    


?>