<?php
//multiple adresses after comma;
require_once("../photo_gallery/includes/phpMailer/class.phpmailer.php");
require_once("../photo_gallery/includes/phpMailer/class.smtp.php");
require_once("../photo_gallery/includes/phpMailer/language/phpmailer.lang-pl.php");

$to_name = "Marcin";
$to = "marcinhe@interia.pl";
$subject = "Inna wiadomość" ;//nie działa
$message = "Anything in old browser we should in old email some mistakes if it's longer than 70 words.<h1>BIG</h1>";
$from_name = "Marcin Hedrzak";
$from = "hedrzak.marcin@gmail.com";
$reply = "mapsonik@interia.pl";

//PHP mail
$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "hedrzak.marcin@gmail.com";
$mail->Password = "maps2202";
      

$mail -> FromName = $from_name;
$mail -> From = $from;
$mail -> AddAddress($to, $to_name);
$mail -> Subject =$subject;
$mail -> Body = $message;


echo $result = $mail -> Send() ? "udało się" : "nie udało się";
       

?>
   
