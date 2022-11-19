<?php

namespace caj_inc\hw4\views;

require_once("View.php");
require_once("controllers/ResultsController.php");

use caj_inc\hw4\controllers\ResultsController;

class ResultsPageContent extends View {
  function render($page_name) {
    ?>
    <table>
      <tr>
        <th>Word Rank Percentile</th>
        <th>% Correct</th>
      </tr>
      <?php
      $i = 0;
      while ($i < 100) {
        ?>
        <tr>
          <td><?php if ($i != 0) echo $i.'% - '; echo ($i+5).'%' ?></td>
          <td>99</td>
        </tr>
        <?php
        $i += 5;
      }
      ?>
    </table>
    <?php
  }
}