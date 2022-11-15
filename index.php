<?php

namespace caj_inc\hw4;

require_once("views/layouts/DefaultLayout.php");
require_once("controllers/DisplayController.php");

use caj_inc\views\layouts\DefaultLayout;
use caj_inc\hw4\controllers\DisplayController;

$controller = (isset($_REQUEST['c'])) ? $_REQUEST['c'] : "DisplayController";
$controller_method = (isset($_REQUEST['m'])) ? $_REQUEST['m'] : "renderLandingPage";

switch($controller) {
  case 'DisplayController':
    $display_controller = new DisplayController();
    $display_controller -> $controller_method();
    break;
  default:
    $display_controller = new DisplayController();
    $display_controller->$controller_method();
    break;
}