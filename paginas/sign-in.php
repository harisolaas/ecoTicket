<?php
session_start();
$titulo = 'Log-in';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('C:\xampp\htdocs\proyecto-integrador\elements\head.php') ?>
    <link rel="stylesheet" href="../css/sign-in-up-forms.css">

  </head>

  <body>
      <div class="main-container">

          <?php include'../elements/nav.php'; ?>

        <div class="form-container">

          <form action="../helpers/sign-in.controller.php" method="post">


              <?php if (isset($_COOKIE['pass']) && isset($_COOKIE['email'])): ?>

                  <div class="form-element">
                      <div>
                          <label for="email">Correo electrónico</label><br>
                          <input style='background-color: #ffffcc;' type="email" name="email" value="<?php echo $_COOKIE['email']; ?>">

                          <?php if (isset($_SESSION['errors']['missingData'])): ?>
                              <p class="error"><?php echo $_SESSION['errors']['missingData'] ?></p>
                          <?php endif; ?>

                      </div>
                  </div>
                  <!-- cookie email -->

                  <div class="form-element">
                      <div>
                          <label for="pass">Contraseña</label><br>
                          <input style='background-color: #ffffcc;' type="password" name="fakePass" value="<?php echo $_COOKIE['fakePass'] ?>" disabled>
                          <input type="hidden" name="pass" value="<?php echo $_COOKIE['pass'] ?>">

                          <?php if (isset($_SESSION['errors']['missingData'])): ?>
                              <p class="error"><?php echo $_SESSION['errors']['missingData'] ?></p>
                              <?php unset($_SESSION['errors']['missingData']); ?>
                          <?php elseif(isset($_SESSION['errors']['errorPass'])): ?>
                              <p class="error"><?php echo $_SESSION['errors']['errorPass'] ?></p>
                              <?php unset($_SESSION['errors']['errorPass']); ?>
                          <?php endif; ?>

                      </div>
                  </div>
                  <!-- cookie pass -->

                  <div class="form-element">
                      <div class="form-element-remember-me">
                          <input type="checkbox" name="rememberMe" checked>
                          <label for="rememberMe">Recordarme</label>
                      </div>
                  </div>
                  <!-- dont remember me -->

              <?php else: ?>

                  <div class="form-element">
                      <div>
                          <label for="email">Correo electrónico</label><br>
                          <input type="email" name="email" placeholder="correo@electronico.com" <?php if(isset($_SESSION['email'])) {
                              $email = 'email';
                              echo "value="."'$_SESSION[$email]'"." style='background-color: #ffffcc;'"; } ?>>

                          <?php if (isset($_SESSION['errors']['missingData'])): ?>
                              <p class="error"><?php echo $_SESSION['errors']['missingData'] ?></p>
                          <?php elseif(isset($_SESSION['errors']['errorEmail'])): ?>
                              <p class="error"><?php echo $_SESSION['errors']['errorEmail'] ?></p>
                              <?php
                              unset($_SESSION['errors']['errorEmail']);
                              unset($_SESSION['email']);
                               ?>
                          <?php endif; ?>

                      </div>
                  </div>
                  <!-- email -->

                  <div class="form-element">
                      <div>
                          <label for="pass">Contraseña</label><br>
                          <input type="password" name="pass" placeholder="Tu contraseña">

                          <?php if (isset($_SESSION['errors']['missingData'])): ?>
                              <p class="error"><?php echo $_SESSION['errors']['missingData'] ?></p>
                              <?php unset($_SESSION['errors']['missingData']); ?>
                          <?php elseif(isset($_SESSION['errors']['errorPass'])): ?>
                              <p class="error"><?php echo $_SESSION['errors']['errorPass'] ?></p>
                              <?php unset($_SESSION['errors']['errorPass']); ?>
                          <?php endif; ?>

                      </div>
                  </div>
                  <!-- pass -->

                  <div class="form-element" style="flex-direction:row; align-items:center;">
                      <div class="reset-pass" style="width: 50%">
                           <a href="reset-password.php" style="font-size: 0.8em">¿Olvidaste tu contraseña?</a>
                      </div>
                      <div class="form-element-remember-me" style="width:50%">
                          <input type="checkbox" name="rememberMe">
                          <label for="rememberMe">Recordarme</label>
                      </div>
                  </div>
                  <!-- remember me -->

              <?php endif; ?>


              <div class="form-element">
                <input class='button' type="submit" name="submit" value="Entrar">
              </div>
              <!-- button -->


          </form>

        </div> <!-- Cierra .form-container -->

        <div class="span"></div>


      </div><!-- Cierra .main-container -->

      <?php include '../elements/footer.php'; ?>

  </body>
</html>
