<?php

session_start();

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "redticketelectronico@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "sarasita";

//Set who the message is to be sent from
$mail->setFrom('redticketelectronico@gmail.com', 'ecoTicket');

//Set an alternative reply-to address
// $mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($_SESSION['email'], $_SESSION['fullName']);

//Set the subject line
$mail->Subject = 'ecoTicket :: Recupero de contraseña';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$passRecoverMail = '<html>
    <head>
        <title>Recupero de contraseña</title>
        <meta charset="utf-8">
        <style media="screen">
            header{
                background-color: #80AA29;
                color: #fff;
                font-family: "Cabin Condensed", sans-serif;
            }
            h1{
                padding: 10px;
                font-style: italic;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>ecoTicket</h1>
        </header>
        <p>Hacé click <a href="'.$_SESSION['passRecoverURL'].'">'.'aquí'.'</a> para restablecer tu contraseña. Si el link no funciona probá copiando la siguiente url en tu navegador:</p>
        <br><p><a href="'.$_SESSION['passRecoverURL'].'">'.$_SESSION['passRecoverURL'].'</a></p>
    </body>
</html>';

unset($_SESSION['passRecoverURL']);

$mail->msgHTML($passRecoverMail);

//Replace the plain text body with one created manually
$mail->AltBody = 'Copiá y pegá este link en tu navegador para recuperar tu contraseña: '.$_SESSION['passRecoverURL'];

//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    $_SESSION['errors']['emailNotSent'] = 'Hubo un error durante mientras intentabamos enviarte el correo de recuperación. Por favor, intentalo de vuelta.';
    header('Location: ../../../../paginas/reset-password.php');
} else {
    $_SESSION['isMailSent'] = true;
    header('Location: ../../../../paginas/reset-password.php');
}
