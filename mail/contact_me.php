<?php
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Hiányzó adat, kérjük ellenőrizze!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
$to = 'info@kozmetikustimi.hu';
$email_subject = "Új üzenet érkezett a honlapról:  $name részéről";
$email_body = "Üzeneted érkezett a honlapodon található űrlapból.\n\n"."A részleteket itt olvashatod:\n\nNév: $name\n\nEmail: $email_address\n\nTelefon: $phone\n\nÜzenet:\n$message";
$headers = "From: info@kozmetikustimi.hu\n";
$headers .= "Válasz: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
