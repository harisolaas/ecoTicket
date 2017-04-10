<span id='boton' class="menu icon ion-navicon"></span>
<nav id='menu'>
    <ul class="botonera">
        <li><a href="home.php">ecoTicket</a></li>
        <li><a href="sign-up.php">Registro</a></li>
        <li><a href="sign-in.php">Log-in</a></li>
        <li><a href="faq.php">Centro de ayuda</a></li>
    </ul>
</nav>
<script type="text/javascript">
    var boton = document.getElementById('boton');
    var menu = document.getElementById('menu');
    boton.addEventListener('click', function () {
        if (menu.className == 'nav-open') {
            menu.className = '';
        } else {
            menu.className = 'nav-open'
        }
    }

    )
</script>
