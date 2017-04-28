<?php
session_start();
$titulo = 'Log-in';
 ?>
<!DOCTYPE html>
<html>
  <head class="no-home">
    <meta charset="utf-8">
    <meta name="viewport" content="width:device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/sign-in-up-forms.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <title>ecoTicket :: Log-in</title>

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
                          <input style='background-color: #ffffcc;' type="password" name="fakePass" value="<?php echo $_COOKIE['fakePass'] ?>">
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
                          <input type="checkbox" name="dontRememberMe">
                          <label for="rememberMe">Dejar de recordarme</label>
                      </div>
                  </div>
                  <!-- dont remember me -->

              <?php else: ?>

                  <div class="form-element">
                      <div>
                          <label for="email">Correo electrónico</label><br>
                          <input type="email" name="email" placeholder="correo@electronico.com">

                          <?php if (isset($_SESSION['errors']['missingData'])): ?>
                              <p class="error"><?php echo $_SESSION['errors']['missingData'] ?></p>
                          <?php endif; ?>

                      </div>
                  </div>
                  <!-- cookie email -->

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

                  <div class="form-element">
                      <div class="form-element-remember-me">
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


      </div><!-- Cierra .main-container -->

      <?php include '../elements/footer.php'; ?>

  </body>
</html>
