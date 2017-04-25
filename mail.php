<?php
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;    

$mail->isSMTP();     
// $mail->SMTPDebug = 1;    
 $mail->SMTPAuth = true;   
 $mail->SMTPSecure = 'ssl';                         
$mail->Host = "smtp.gmail.com";  
$mail->Port = 465;
$mail->Username = 'sarkar.rudranil@gmail.com';              
$mail->Password = '8013161801';   
                                    

$mail->setFrom('sarkar.rudranil@gmail.com', 'Rudranil');

//$mail->addAddress('ellen@example.com');              
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');       
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
?>