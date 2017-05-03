<?php
session_start();
$titulo = 'Restablecer contraseña'
 ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('C:\xampp\htdocs\proyecto-integrador\elements\head.php'); ?>
        <link rel="stylesheet" href="../css/sign-in-up-forms.css">
        <style>
            input{
                -moz-box-shadow: inset 0 0 2px #000000;
                -webkit-box-shadow: inset 0 0 2px #000000;
                box-shadow: inset 0 0 2px #000000;
            }
            p{
                font-size: 0.8em;
            }
            .first-child{
                background-color: #80AA29;
                color: #fff;
                border: 3px solid #fff;
                border-radius: 4px 4px 0 0;
            }
            form{
                height: 250px;
            }
            form:first-child{
                padding-top: 0;
            }
        </style>
    </head>
    <body>
        <div class="main-container">
            <?php include('..\elements\nav.php'); ?>
            <div class="form-container">
                <form action="../helpers/passReset.controller.php" method="post">
                    <div class="form-element first-child">
                        <label for="email">Ingresá el correo electrónico con el que te registraste para restablecer tu contraseña:</label>
                    </div>
                    <div class="form-element">
                        <div>
                            <input autofocus type="email" name="email" value="<?php echo @$_SESSION['email']; ?>"  >
                            <p>*ejemplo@ejemplo.com</p>
                        </div>
                    </div>
                </form>

            </div>
            <div style="height: 100px; background-color: rgba(0,0,0,0.5)"></div>
        </div>
        <?php include('C:\xampp\htdocs\proyecto-integrador\elements\footer.php'); ?>
    </body>
</html>
