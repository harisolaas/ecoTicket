<?php
session_start();
$titulo = 'Restablecer contraseña'
 ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('..\elements\head.php'); ?>
        <link rel="stylesheet" href="../css/sign-in-up-forms.css">
        <link rel="stylesheet" href="../css/password-reset.css">
    </head>
    <body>
        <div class="main-container">
            <?php include('..\elements\nav.php'); ?>
            <div class="form-container">
                <?php if (!isset($_SESSION['isMailSent']) && !isset($_GET['passReset'])): ?>
                    <form action="../helpers/passReset.controller.php" method="post">
                        <div class="form-element first-child">
                            <label for="email">Ingresá el correo electrónico con el que te registraste para restablecer tu contraseña:</label>
                        </div>
                        <div class="form-element">
                            <div>
                                <p>*ejemplo@ejemplo.com</p>
                                <input class="email" autofocus type="email" name="email" value="<?php echo @$_SESSION['email']; ?>"  >
                                <p class="error"><?php echo @$_SESSION['errors']['errorEmail'] ?></p>
                                <br>
                                <br>
                                <input class="button" type="submit" name="submit" value="Enviar">
                                <?php unset($_SESSION['errors']['errorEmail']); ?>
                            </div>
                        </div>
                    </form>
                <?php elseif(isset($_GET['passReset'])): ?>
                    <!-- Validar y hacer el passReset -->
                <?php else: ?>
                    <form action="../helpers/passReset.controller.php" method="post">
                        <div class="form-element first-child">
                            <label for="email">El mail de confirmación ha sido <strong>enviado con éxito</strong>! Si no lo recibís n los próximos 5 minutos probá enviarlo de vuelta:</label>
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
                    <?php unset($_SESSION['isMailSent']) ?>
                <?php endif; ?>
                
            </div>
            <div class="span"></div>
        </div>
        <?php include('..\elements\footer.php'); ?>
    </body>
</html>
