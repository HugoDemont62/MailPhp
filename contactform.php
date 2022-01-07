
<?php 

$imagefond = "";
$time = date('r');
$name = $_POST['name'];
$mail = $_POST['mail'];
$message = $_POST['message'];




$to = "contact@hugodemont.fr";
$subject = "Mail From website";
$txt =$name . "\r\n $mail \r\n $message";
$headers = "From: contact@hugodemont.fr" . "\r\n";
if($mail!=NULL){
    mail($to,$subject, "Le message envoye par $name le\r$time\ravec le mail : $mail\n\r\n\r\nLe texte est le suivant : \n\r$message",$headers);
    mail($mail ."\r\n", "Votre message est bien reçu"."\r\n", "Message envoyé sur le site hugodemont.fr à $time avec l'adresse mail suivante : $mail \r\nCe message est automatique ne pas répondre \n\r\n\r\n\r\n Votre demande d'aide concernant le message  :\r\n $message \n\r\n\r\n\r\nSi vous n'êtes pas à l'origine de ce message n'en prenez pas compte. \n\r Hugo Demont service de communnication de hugodemont.fr $imagefond",$headers);
}




//redirect
header("Location:index.html");
?>



<?php
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

?>

