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
      <!-- <tr>
        <td>5%</td>
        <td>99</td>
      </tr>
      <tr>
        <td>5% - 10%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>10% - 15%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>15% - 20%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>20% - 25%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>25% - 30%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>30% - 35%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>35% - 40%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>40% - 45%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>45% - 50%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>50% - 55%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>55% - 60%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>60% - 65%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>65% - 70%</td>
        <td>96</td>
      </tr>
      <tr>
        <td>5% - 10%</td>
        <td>96</td>
      </tr> -->
    </table>
    <?php
  }
}