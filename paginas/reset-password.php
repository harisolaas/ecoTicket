<?php
session_start();
$titulo = 'Restablecer contraseña'
 ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('..\elements\head.php'); ?>
        <link rel="stylesheet" href="../css/sign-in-up-forms.css">
        <style>
            .email{
                -moz-box-shadow: inset 0 0 2px #000000;
                -webkit-box-shadow: inset 0 0 2px #000000;
                box-shadow: inset 0 0 2px #000000;
                height: 22px;
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
                height: 320px;
            }
            form:first-child{
                padding-top: 0;
            }
            label{
                width: 80%;
                margin: auto;
            }
            .button{
                padding: 0;
                width: 65%;
                border: none;
                font-size: 1em;
                height: 22px;
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
                            <p>*ejemplo@ejemplo.com</p>
                            <input class="email" autofocus type="email" name="email" value="<?php echo @$_SESSION['email']; ?>"  >
                            <br>
                            <br>
                            <input class="button" type="submit" name="submit" value="Enviar">
                        </div>
                    </div>
                </form>

            </div>
            <div class="span"></div>
        </div>
        <?php include('..\elements\footer.php'); ?>
    </body>
</html>
