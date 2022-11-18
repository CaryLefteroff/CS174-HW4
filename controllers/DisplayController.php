<?php
namespace caj_inc\hw4\controllers;

require_once("controllers/Controller.php");
require_once("views/layouts/DefaultLayout.php");
require_once("views/LandingPageContent.php");
require_once("views/QuizPageContent.php");
require_once("views/ResultsPageContent.php");

use caj_inc\hw4\views;

class DisplayController extends Controller {
  function renderLandingPage($language) {
    $default_layout = new views\layouts\DefaultLayout();
    $landing_page = new views\LandingPageContent();
    $default_layout->drawHeader($language, "landing");
    $landing_page->render(null);
    $default_layout->drawFooter();
  }

  function renderQuizPage($language) {
    $default_layout = new views\layouts\DefaultLayout();
    $quiz_page = new views\QuizPageContent();
    $default_layout->drawHeader($language, "quiz");
    $quiz_page->render(null);
    $default_layout->drawFooter();
  }

  function renderResultsPage($language) {
    $default_layout = new views\layouts\DefaultLayout();
    $results_page = new views\ResultsPageContent();
    $default_layout->drawHeader($language, "results");
    $results_page->render(null);
    $default_layout->drawFooter();
  }
}