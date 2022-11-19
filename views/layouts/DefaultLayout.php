<?php

namespace caj_inc\hw4\views\layouts;

require_once("views/layouts/Layout.php");

use caj_inc\hw4\views\layouts\Layout;

class DefaultLayout extends Layout {
  function drawHeader($language, $page_name) {
    ?>
    <!DOCTYPE html>
    <html>
      <head>
        <link rel="stylesheet" href="styles/styles.css" />
        <title>QuizMaker</title>
      </head>
      <body>
        <div class="header">
          <h1><a href="index.php">Language Quiz</a>/<?php echo ucfirst($language);
          if ($page_name == 'results') echo '/Results'; ?></h1>
        </div>
    <?php
  }
  function drawHeaderLanding($page_name) {
    ?>
    <!DOCTYPE html>
    <html>
      <head>
        <link rel="stylesheet" href="styles/styles.css" />
        <title>QuizMaker</title>
      </head>
      <body>
        <div class="header">
          <h1><a href="index.php">Language Quiz</a></h1>
        </div>
    <?php
  }

  function drawFooter() {
    ?>
        <footer><p>CAJ Inc</p></footer>
      </body>
    </html>
    <?php
  }
}
