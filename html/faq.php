<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width:device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/sign-in-up-forms.css">
    <link rel="stylesheet" href="../css/faqs.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <title>F.A.Q.s</title>
  </head>
  <body>
  <article class="main-container">
      <header>
        <h1>F.A.Q.s</h1>
        <span id='boton' class="icon ion-navicon"></span>
        <nav id='menu'>
            <ul class="botonera">
                <li><a href="../index.html">ecoTicket</a></li>
                <li><a href="sign-up.html">Registro</a></li>
                <li><a href="sign-in.html">Log-in</a></li>
                <li><a href="faq.html">Centro de ayuda</a></li>
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
      </header>
      <!--Start  question-container -->
    <article class="question-container">
      <section class="question-button"><a href="#question1">
        <p> Question 1</p>
      </a></section>

      <section class="question-button"><a href="#question2">
        <p> Question 2</p>
      </a></section>

      <section class="question-button"><a href="#queston3">
        <p> Question 3 </p>
      </a></section>

      <section class="question-button"><a href="#question4">
        <p> Question 4</p>
      </a></section>
      <section class="question-button"><a href="#question5">
        <p> Question 5</p>
      </a></section>

      <section class="question-button"><a href="#question6">
        <p> Question 6</p>
      </a></section>

    </article>
    <!--End question-container  -->

    <!--Start answer-container  -->
    <article class="answer-container">

      <section id="question1">
        <h2 class="head_question">Question 1</h2>
        <p class="answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod te
        mpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
      </section>

      <section id="question2">
        <h2 class="head_question">Question 2</h2>
        <p class="answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod te
        mpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
      </section>

      <section id="question3">
        <h2 class="head_question">Question 3</h2>
        <p class="answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod te
        mpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
      </section>

      <section id="question4">
        <h2 class="head_question">Question 4</h2>
        <p class="answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod te
        mpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
      </section>

      <section id="question5">
        <h2 class="head_question">Question 5</h2>
        <p class="answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod te
        mpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
      </section>

      <section id="question6">
        <h2 class="head_question">Question 6</h2>
        <p class="answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod te
        mpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
      </section>
    </article>
    <!--End answer-container  -->
  </article>


    <footer>
      <nav>
        <ul>
          <li><a href="#">Lorem</a></li>
          <li><a href="#">Ipsum</a></li>
          <li><a href="#">Dolor</a></li>
        </ul>
      </nav>
    </footer>
  </body>
</html>
