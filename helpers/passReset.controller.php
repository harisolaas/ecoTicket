<?php
function sendPassResetEmail()
{
    $to = $_POST['email'];
    $subject = 'ecoTicket :: Recupero de contraseña';
    $content = file_get_contents('passResetMail.php');
    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <ecoticket@no-reply.com>' . "\r\n";
    mail($to, $subject, $content, $headers);
}

function generateUniqueURL()
{
    global $url;
    $url = uniqid();
    $url = password_hash($url, PASSWORD_BCRYPT);
    $url = "localhost/proyecto-integrador/passReset/?passReset=".$url;
    var_dump($url);
}
