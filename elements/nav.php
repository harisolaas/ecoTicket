<?php
if (@$_SESSION['logIn']) {
    echo "<style>.log{display: none;}.avatar{display: block;border-radius: 50%;}</style>";
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

                  <li class="log"><a href="sign-up.php">Registro</a></li>
                  <li class="log"><a href="sign-in.php">Log-in</a></li>
                  <li><a href="faq.php">F.A.Q.</a></li>
                  <li class="avatar"><img src="" alt=""></li>
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
