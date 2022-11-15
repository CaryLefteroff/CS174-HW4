<?php
namespace caj_inc\hw4\controllers;

require_once("controllers/Controller.php");
require_once("views/layouts/DefaultLayout.php");
require_once("views/LandingPageContent.php");

use caj_inc\hw4\views;

class DisplayController extends Controller {
  function renderLandingPage() {
    $default_layout = new views\layouts\DefaultLayout();
    $landing_page = new views\LandingPageContent();
    $default_layout->drawHeader("landing");
    $landing_page->render(null);
    $default_layout->drawFooter();
  }
}