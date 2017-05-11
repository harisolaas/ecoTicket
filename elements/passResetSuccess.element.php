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
