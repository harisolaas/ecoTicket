<?php
session_start();

// ============-Functions-=========== //


function openUsers()
{
    global $users;
    $users = file_get_contents('C:\xampp\htdocs\proyecto-integrador\elements\users.json');
    $users = json_decode($users, true);
}

function closeUsers()
{
    global $users;
    $users = json_encode($users);
    file_put_contents('C:\xampp\htdocs\proyecto-integrador\elements\users.json', $users);
}

function rememberMe()
{
    if (!strlen($_POST['pass'])>12) {
        global $users;

        $user = $_POST['email'];
        $pass = $_POST['pass'];
        $passLength = strlen($_POST['pass']);
        $fakePass = '';
        for ($i=0; $i < $passLength ; $i++) {
            $fakePass = $fakePass."x";
        }
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $cookieDuration = time() + 60*60*24*15;
        $cookieDir = '/';
        setcookie('fakePass', $fakePass, $cookieDuration, $cookieDir);
        setcookie('pass', $pass, $cookieDuration, $cookieDir);
        setcookie('email', $user, $cookieDuration, $cookieDir);

        $users[$user]['pass'] = $pass;
    }
}
function unsetRememberMe()
{}

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

function logIn()
{
    // Set session timeout
    $_SESSION['logIn'] = true;
}

// ============-Functions-End-=========== //


openUsers();
var_dump($_POST);echo "<br>";echo "<br>";
var_dump($users);

if (!isDataCorrect())
{
    $_SESSION['errors']['missingData'] = '*Campo requerido';
    // header('Location: ../paginas/sign-in.php');
    echo "error1";
    exit;
}
elseif (!isUserSet())
{
    $_SESSION['errors']['errorEmail'] = '*La dirección de correo ingresada no figura en nuestra base de datos!';// Tengo que llamarla y borrarla en sign-in.php
    // header('Location: ../paginas\sign-in.php');
    echo "error2";
    exit;
}
elseif (!isPassCorrect())
{
    $_SESSION['errors']['errorPass'] = '*La contraseña ingresada es incorrecta!';
    // header('Location: ../paginas\sign-in.php');
    echo "error3";
    exit;
}
else
{
    logIn();
    if (isset($_POST['rememberMe'])) {
        rememberMe();
    }
    // header('Location: ../paginas\exito.php');
    echo "success";
}
closeUsers();
 ?>
