<?php
session_start();

// ============-Functions-=========== //


include('users.library.php');


function isDataCorrect()
{
    $mail = $_POST['mail'];
    $validatemail = filter_var($mail, FILTER_VALIDATE_mail);
    $validatemail = $validatemail && boolval($mail);

    $pass = $_POST['pass'];
    $validatePass = (strlen($pass) < 64) && (strlen($pass) >= 6);

    return $validatePass && $validatemail;
}

function rememberMe()
{
    if (strlen($_POST['pass'])<=12) {
        global $users;

        $user = $_POST['mail'];
        $pass = $_POST['pass'];
        $passLength = strlen($_POST['pass']);
        $fakePass = '';
        for ($i=0; $i < $passLength ; $i++) {
            $fakePass = $fakePass."x";
        }
        $pass = $users[$user]['pass'];
        $cookieDuration = time() + 60*60*24*15;
        $cookieDir = '/';
        setcookie('fakePass', $fakePass, $cookieDuration, $cookieDir);
        setcookie('pass', $pass, $cookieDuration, $cookieDir);
        setcookie('mail', $user, $cookieDuration, $cookieDir);
    }
}



// ============-Functions-End-=========== //


openUsers('../');

if (!isDataCorrect())
{
    $_SESSION['errors']['missingData'] = '*Campo requerido';
    $_SESSION['mail'] = $_POST['mail'];
    header('Location: ../paginas/sign-in.php');
    exit;
}
elseif (!isUserSet())
{
    $_SESSION['errors']['errormail'] = '*La dirección de correo ingresada no figura en nuestra base de datos!';
    $_SESSION['mail'] = $_POST['mail'];
    header('Location: ../paginas/sign-in.php');
    exit;
}
elseif (!isPassCorrect())
{
    $_SESSION['errors']['errorPass'] = '*La contraseña ingresada es incorrecta!';
    $_SESSION['mail'] = $_POST['mail'];
    header('Location: ../paginas/sign-in.php');
    exit;
}
else
{
    logIn();
    if (isset($_POST['rememberMe'])) {
        rememberMe();
    }else {
        unsetRememberMe();
    }
    header('Location: ../paginas/home.php');
}
updateUsers('../');
 ?>
