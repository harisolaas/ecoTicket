<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width:device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/faqs.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <title>ecoTicket :: Preguntas Frecuentes</title>
  </head>
  <body>
  <article class="main-container">

      <?php include'../elements/nav.php'; ?>


      <!--Start  question-container -->
    <article class="question-container">
      <section class="button"><a href="#question1">
        <p> Question 1</p>
      </a></section>

      <section class="button"><a href="#question2">
        <p> Question 2</p>
      </a></section>

      <section class="button"><a href="#question3">
        <p> Question 3 </p>
      </a></section>

      <section class="button"><a href="#question4">
        <p> Question 4</p>
      </a></section>
      <section class="button"><a href="#question5">
        <p> Question 5</p>
      </a></section>

      <section class="button"><a href="#question6">
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

      <section id="question1">
        <h2 class="head_question">Question 2</h2>
        <p class="answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod te
        mpor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
      </section>

      <section id="question1">
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

    <?php include '../elements/footer.php'; ?>

  </body>
</html>
