<form action="" method="post">
    <div class="form-element">
        <label class="error" for="email">
            <?php
            foreach ($_SESSION['errors'] as $key => $value) {
                echo $_SESSION['errors'][$key];
            }
            unset($_SESSION['errors']);
            ?>
        </label>
            <input class="button" type="submit" name="submit" value="Recuperar contraseña">
    </div>
</form>
