<?php
//multiple adresses after comma;
$to = "marcinhe@interia.pl";
$subject = "Inna wiadomość" ;//nie działa
$message = "Anything in old browser we should in old email some mistakes if it's longer than 70 words.<h1>BIG</h1>";
$from = "Marcin Hedrzak <hedrzak.marcin@gmail.com>";
$reply = "mapsonik@interia.pl";
$headers = "From: {$from}\n";
$headers .= "Reply-To: {$reply}\n ";
$headers .= "Cc: {$reply}\n";
$headers .= "Bcc: {$reply}\n";

echo mail($to, $subject, $message, $headers) ? "udało się" : "nie udało się";
       
       ?>
   
