<?php
$errors = '';
$myemail = 'pawla.zavadilova@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  ||
   empty($_POST['gender']) ||
   empty($_POST['address']) ||
   empty($_POST['email']) ||

{
    $errors .= "\n Error: Všechna pole jsou povinná!";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$gender = $_POST['gender'];
$address = $_POST['adress'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Neplatná emailová adresa";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Přihláška ARGO: $name";
$email_body = "Byla přijata nová přihláška. \n\n\n".
"Jméno a Příjmení: $name \n"
"Pohlaví: $gender \n"
"Adresa trvalého bydliště: $address \n"
"Kontaktní spojení: $email_address \n "
"Message \n $message";

$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: dekujeme.html');
}
?>