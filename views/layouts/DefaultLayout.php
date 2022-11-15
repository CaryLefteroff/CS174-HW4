<?php

namespace caj_inc\hw4;

require_once("views/layouts/Layout.php");

use caj_inc\hw4\views\layouts\Layout;

class DefaultLayout extends Layout {
  function drawHeader($page_name) {
    ?>
    <!DOCTYPE html>
    <html>
      <head>
        <link rel="stylesheet" href="styles/styles.css" />
        <title>QuizMaker</title>
      </head>
      <body>
        <div class="header">
          <h1><a href="index.php">Language Quiz</a>/NAME OF QUIZ</h1>
        </div>
    <?php
  }

  function drawFooter() {
    ?>
        <footer><p>SOME WORDS HERE MAYBE</p></footer>
      </body>
    </html>
    <?php
  }
}
