<?php
session_start();

// ============-Functions-=========== //


include('C:\xampp\htdocs\proyecto-integrador\helpers\users.library.php');


function isDataCorrect()
{
    $email = $_POST['email'];
    $validateEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    $validateEmail = $validateEmail && boolval($email);

    $pass = $_POST['pass'];
    $validatePass = (strlen($pass) < 64) && (strlen($pass) >= 6);

    return $validatePass && $validateEmail;
}

function isUserSet()
{
    global $users;
    return isset($users[$_POST['email']]);
}

function isPassCorrect()
{
    global $users;
    if (strlen($_POST['pass']) <= 12)
    {
        $validation = password_verify($_POST['pass'], $users[$_POST['email']]['pass']);
        return $validation;
    } elseif (strlen($_POST['pass']) > 12) {
        $validation = ($_POST['pass'] == $users[$_POST['email']]['pass']);
        return $validation;
    }
}


function rememberMe()
{
    if (strlen($_POST['pass'])<=12) {
        global $users;

        $user = $_POST['email'];
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
        setcookie('email', $user, $cookieDuration, $cookieDir);
    }
}
function unsetRememberMe()
{
    // Expire cookie
    $cookieDuration = time() - 60*60*24*15;
    $cookieDir = '/';
    setcookie('fakePass', '', $cookieDuration, $cookieDir);
    setcookie('pass', '', $cookieDuration, $cookieDir);
    setcookie('email', '', $cookieDuration, $cookieDir);
}

function logIn()
{
    // Set session timeout
    $_SESSION['logIn'] = true;
}
// ============-Functions-End-=========== //


openUsers();

if (!isDataCorrect())
{
    $_SESSION['errors']['missingData'] = '*Campo requerido';
    $_SESSION['email'] = $_POST['email'];
    header('Location: ../paginas/sign-in.php');
    exit;
}
elseif (!isUserSet())
{
    $_SESSION['errors']['errorEmail'] = '*La dirección de correo ingresada no figura en nuestra base de datos!';
    $_SESSION['email'] = $_POST['email'];
    header('Location: ../paginas\sign-in.php');
    exit;
}
elseif (!isPassCorrect())
{
    $_SESSION['errors']['errorPass'] = '*La contraseña ingresada es incorrecta!';
    $_SESSION['email'] = $_POST['email'];
    header('Location: ../paginas\sign-in.php');
    echo "error3";
    exit;
}
else
{
    logIn();
    if (isset($_POST['rememberMe'])) {
        rememberMe();
        echo "is rememberMe";
    }elseif (isset($_POST['dontRememberMe'])) {
        unsetRememberMe();
    }
    header('Location: ../paginas\exito.php');
}
updateUsers();
 ?>
