<?php
session_start();
$titulo = 'Restablecer contraseña'
 ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('C:\xampp\htdocs\proyecto-integrador\elements\head.php'); ?>
        <link rel="stylesheet" href="../css/sign-in-up-forms.css">
    </head>
    <body>
        <div class="main-container">
            <?php include('C:\xampp\htdocs\proyecto-integrador\elements\nav.php'); ?>
            <div class="form-container">
                <form class="" action="passReset.php" method="post">
                    <label for="email">Ingresá el correo electrónico con el que te registraste para restablecer tu contraseña:</label>
                    <input type="email" name="email" value="<?php echo @$_SESSION['email']; ?>" >
                </form>

            </div>
            <div style="height: 100px; background-color: rgba(0,0,0,0.5)"></div>
        </div>
        <?php include('C:\xampp\htdocs\proyecto-integrador\elements\footer.php'); ?>
    </body>
</html>
