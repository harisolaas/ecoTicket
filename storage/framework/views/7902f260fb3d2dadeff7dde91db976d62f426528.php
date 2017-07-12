
<nav class="navbar navbar-default navbar-fixed-top" id="main-nav">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
             </button>
            <a class="navbar-brand" href="/">ecoTicket</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <?php if(Auth::guest()): ?>
                              <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                              <li><a href="<?php echo e(route('register')); ?>">Registro</a></li>
                          <?php else: ?>
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                      <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                  </a>

                                  <ul class="dropdown-menu" role="menu">
                                      <li>
                                          <a href="<?php echo e(route('logout')); ?>"
                                              onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                              Logout
                                          </a>

                                          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                              <?php echo e(csrf_field()); ?>

                                          </form>
                                      </li>
                                  </ul>
                              </li>
                          <?php endif; ?>
         </ul>
        </div><!--/.nav-collapse -->
    </div>

</nav>
