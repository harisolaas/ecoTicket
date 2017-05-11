<form action="" method="post">
    <div class="form-element">
        <label class="error" for="email">La URL ingresada expiró o es invalida!</label>
            <input class="button" type="submit" name="submit" value="Recuperar contraseña">
            <?php unset($_SESSION['URLValidationFail']); ?>
    </div>
</form>
