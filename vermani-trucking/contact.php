<?php
header('Content-Type: application/json');
$to='info@vermanitrucktrailerrepairs.com'; // TODO: confirm real inbox
if($_SERVER['REQUEST_METHOD']!=='POST'||!empty($_POST['website'])){http_response_code(400);echo '{"ok":false}';exit;}
$c=fn($k)=>trim(str_replace(["\r","\n"],' ',strip_tags($_POST[$k]??'')));
$name=$c('name');$email=$c('email');$phone=$c('phone');
if(!$name||!filter_var($email,FILTER_VALIDATE_EMAIL)||!$phone){http_response_code(422);echo '{"ok":false}';exit;}
$body="Form: ".$c('form')."\nName: $name\nCompany: ".$c('company')."\nPhone: $phone\nEmail: $email\nService: ".$c('service')."\nVehicle/Fleet: ".$c('vehicle')."\n\n".strip_tags($_POST['message']??'');
$h="From: no-reply@vermanitrucktrailerrepairs.com\r\nReply-To: $email\r\n";
$ok=mail($to,'Website inquiry from '.$name,$body,$h);
http_response_code($ok?200:500);echo json_encode(['ok'=>$ok]);
