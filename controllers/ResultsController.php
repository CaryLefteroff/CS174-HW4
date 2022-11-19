<?php

namespace caj_inc\hw4\controllers;

// require_once("QuizController.php");

class ResultsController extends Controller {
  function getResults() {
    $file_name = "../data/QuizStatistics.txt";
      return unserialize(file_put_contents($file_name));
  }

  function calculateResults($language, $results) {
    for ($i = 1; $i <= 20; $i++) {
      $question_string = $results["questionString$i"];
      $question_answer = $results["questionAnswer$i"];
      $option1 = $results["answer$i"."_1"];
      $option2 = $results["answer$i"."_2"];
      $option3 = $results["answer$i"."_3"];
      $option4 = $results["answer$i"."_4"];
      $quiz_controller = new QuizController();
      $source = $quiz_controller -> getData($language);
    }
  }
}