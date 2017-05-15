<form action="/proyecto-integrador/helpers/passResetControllers/passResetMailer.controller.php" method="post">
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
        </div>
    </div>
</form>
