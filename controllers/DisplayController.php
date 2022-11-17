<?php
namespace caj_inc\hw4\controllers;

require_once("controllers/Controller.php");
require_once("views/layouts/DefaultLayout.php");
require_once("views/LandingPageContent.php");
require_once("views/QuizPageContent.php");

use caj_inc\hw4\views;

class DisplayController extends Controller {
  function renderLandingPage() {
    $default_layout = new views\layouts\DefaultLayout();
    $landing_page = new views\LandingPageContent();
    $default_layout->drawHeader("landing");
    $landing_page->render(null);
    $default_layout->drawFooter();
  }

  function renderQuizPage() {
    $default_layout = new views\layouts\DefaultLayout();
    $quiz_page = new views\QuizPageContent();
    $default_layout->drawHeader("quiz");
    $quiz_page->render(null);
    $default_layout->drawFooter();
  }
}