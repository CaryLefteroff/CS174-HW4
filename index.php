<?php

namespace caj_inc\hw4;

require_once("controllers/DisplayController.php");
require_once("controllers/QuizController.php");
require_once("controllers/ResultsController.php");

use caj_inc\hw4\controllers\DisplayController;
use caj_inc\hw4\controllers\QuizController;
use caj_inc\hw4\controllers\ResultsController;

$controller = (isset($_REQUEST['c'])) ? $_REQUEST['c'] : "DisplayController";
$controller_method = (isset($_REQUEST['m'])) ? $_REQUEST['m'] : "renderLandingPage";
$language = (isset($_REQUEST['language'])) ? $_REQUEST['language'] : 'english';

switch($controller) {
  case 'DisplayController':
    $display_controller = new DisplayController();
    $display_controller -> $controller_method($language);
    break;
  case 'QuizController':
    $quiz_controller = new QuizController();
    $quiz_controller -> $controller_method($language);
    break;
  case 'ResultsController':
    $results = [];
    for ($i = 1; $i <= 20; $i++) {
      $results["questionString$i"] = $_REQUEST["questionString$i"];
      $results["questionAnswer$i"] = $_REQUEST["questionAnswer$i"];
      $results["questionAnswerIndex$i"] = $_REQUEST["questionAnswerIndex$i"];
      $results["answer$i"."_1"] = (isset($_REQUEST["answer$i"."_1"])) ? $_REQUEST["answer$i"."_1"] : "null";
      $results["answer$i"."_2"] = (isset($_REQUEST["answer$i"."_2"])) ? $_REQUEST["answer$i"."_2"] : "null";
      $results["answer$i"."_3"] = (isset($_REQUEST["answer$i"."_3"])) ? $_REQUEST["answer$i"."_3"] : "null";
      $results["answer$i"."_4"] = (isset($_REQUEST["answer$i"."_4"])) ? $_REQUEST["answer$i"."_4"] : "null";
    }
    $results_controller = new ResultsController();
    $results_controller -> $controller_method($language, $results);
    break;
  default:
    $display_controller = new DisplayController();
    $display_controller -> $controller_method($language);
    break;
}