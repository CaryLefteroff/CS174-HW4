<?php

namespace caj_inc\hw4;

require_once("controllers/DisplayController.php");
require_once("controllers/QuizController.php");

use caj_inc\hw4\controllers\DisplayController;
use caj_inc\hw4\controllers\QuizController;

$controller = (isset($_REQUEST['c'])) ? $_REQUEST['c'] : "DisplayController";
$controller_method = (isset($_REQUEST['m'])) ? $_REQUEST['m'] : "renderLandingPage";
$language = (isset($_REQUEST['language'])) ? $_REQUEST['language'] : 'english';

switch($controller) {
  case 'DisplayController':
    $display_controller = new DisplayController();
    $display_controller -> $controller_method();
    break;
  case 'QuizController':
    $quiz_controller = new QuizController();
    $quiz_controller -> $controller_method($language);
  default:
    $display_controller = new DisplayController();
    $display_controller -> $controller_method();
    break;
}