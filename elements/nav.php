<?php
if (@$_SESSION['logIn']) {
    include '../helpers/users.library.php';
    openUsers('../');
    echo "<style>.log-off{display: none;}li.log-on{display: block;}</style>";
}
?>
<div class="headerNavContainer">
      <header class="menu">
          <h1><a href="home.php">ecoTicket</a></h1>
          <span id='boton' class="menu icon ion-navicon"></span>
      </header>
      <div class="navContainer">
          <nav id='menu'>
              <ul class="botonera">
                  <li class="log-on"><img src="<?= '../images/imgAvatar/'.$_SESSION['avatar'] ?>" alt="profile-pic.com"></li>
                  <li class="log-off"><a href="sign-up.php">Registro</a></li>
                  <li class="log-off"><a href="sign-in.php">Log-in</a></li>
                  <li class="allways"><a href="faq.php">F.A.Q.</a></li>
                  <li class="log-on"><a href="../sessionDestroy.php">Sign-Out</a></li>


              </ul>
          </nav>
          <script type="text/javascript">
              var boton = document.getElementById('boton');
              var menu = document.getElementById('menu');
              boton.addEventListener('click', function ()
                  {
                      if (menu.className == 'nav-open') {
                          menu.className = '';
                      } else {
                          menu.className = 'nav-open';
                      }
                  }
              )
          </script>
      </div>
  </div>
