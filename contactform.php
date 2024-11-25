<?php 
// Initialisation des variables que je récupere d'un input d'un autre fichier ;)
$time = date('r'); // Récupère la date et l'heure actuelle au format RFC 2822.
$name = $_POST['name']; // Récupère la valeur de 'name' envoyée via la méthode POST.
$mail = $_POST['mail']; // Récupère la valeur de 'mail' envoyée via la méthode POST.
$message = $_POST['message']; // Récupère la valeur de 'message' envoyée via la méthode POST.

// Configuration de l'email
$to = "contact@hugodemont.fr"; // Adresse email de destination.
$subject = "Mail From website"; // Sujet de l'email envoyé à l'administrateur.
$txt = $name . "\r\n $mail \r\n $message"; // Texte brut avec le nom, l'email et le message utilisateur.
$headers = "From: contact@hugodemont.fr" . "\r\n"; // Définit l'adresse de l'expéditeur.

// Vérifie si un email a été renseigné
if ($mail != NULL) {
    // Envoi du mail à l'administrateur
    mail(
        $to, // Destinataire
        $subject, // Sujet
        "Le message envoyé par $name le\r$time\ravec le mail : $mail\n\r\n\r\nLe texte est le suivant : \n\r$message", // Corps du message
        $headers // En-têtes
    );

    // Envoi de l'accusé de réception à l'utilisateur
    mail(
        $mail . "\r\n", // Destinataire : l'adresse email de l'utilisateur
        "Votre message est bien reçu" . "\r\n", // Sujet de l'email
        "Message envoyé sur le site hugodemont.fr à $time avec l'adresse mail suivante : $mail 
        \r\nCe message est automatique, ne pas répondre.
        \n\r\n\r\n\r\n Votre demande d'aide concernant le message :
        \r\n $message 
        \n\r\n\r\n\r\nSi vous n'êtes pas à l'origine de ce message, n'en prenez pas compte. 
        \n\r Hugo Demont, service de communication de hugodemont.fr", // Corps du message
        $headers // En-têtes
    );
}

// Redirection après l'envoi des emails
header("Location:index.html"); // Redirige l'utilisateur vers la page d'index.
