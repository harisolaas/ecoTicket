<form action="../helpers/passResetControllers/setNewPass.controller.php" method="post">
    <div class="form-element first-child">
        <label for="email">Ingresá tu contraseña nueva:</label>
    </div>
    <div class="form-element">
        <div>
            <label for="pass">Contraseña:</label><br>
            <input autofocus type="password" name="pass">
            <br><br>
            <label for="confirm-pass">Confirmá tu contraseña:</label><br>
            <input autofocus type="password" name="confirm-pass">
            <br><br>
            <input class="button" type="submit" name="submit" value="Enviar">
        </div>
    </div>
</form>
