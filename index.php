<?php

namespace caj_inc\hw4;

require_once("views/layouts/DefaultLayout.php");
require_once("controllers/DisplayController.php");
require_once("controllers/QuizController.php");
require_once("executables/QuizMaker.php");

use caj_inc\views\layouts\DefaultLayout;
use caj_inc\hw4\controllers\DisplayController;
use caj_inc\hw4\controllers\QuizController;
use caj_inc\hw4\executables\QuizMaker;

$controller = (isset($_REQUEST['c'])) ? $_REQUEST['c'] : "DisplayController";
$controller_method = (isset($_REQUEST['m'])) ? $_REQUEST['m'] : "renderLandingPage";

switch($controller) {
  case 'DisplayController':
    $display_controller = new DisplayController();
    $display_controller -> $controller_method();
    break;
  case 'QuizController':
    $quiz_controller = new QuizController();
    $quiz_controller -> $controller_method();
  default:
    $display_controller = new DisplayController();
    $display_controller -> $controller_method();
    break;
}