<?php

namespace caj_inc\hw4\controllers;

// require_once("controllers/Controller.php");
require_once("models/Test.php");

use caj_inc\hw4\models;

class QuizController extends Controller {
  function generateQuestions($language) {
    // format for each question: ["question string" => ["Answer 1", "Answer 2", "Answer 3", "Answer 4"]]
    // aaron's quiz file is an associative array of 
    // word => [occurrences, [5-grams]]
    // get source array
    $model = new models/Test();
    $source = $model -> getArray();
    // create a result array
    $result = [];
    // 20 times
    for ($i = 0; $i < 5; $i++) {
      // choose a word with uniform probability
      $word = array_rand($source);
      // choose one of the 5-grams with uniform probability
      $string = array_rand($source[$word]);
      // generate three other words from the file into an array
      $answers = [];
      // add correct word randomly into the array
      $position = rand(0, 3);
      $j = 0;
      while ($j < 4) {
        $wrong_answer = array_rand($source);
        if ($position == $j) {
          array_push($answers, $word);
          $j++;
        } else {
          $wrong_answer = array_rand($source);
          if (!in_array($wrong_answer, $answers) && $wrong_answer != $word) {
            array_push($answers, $wrong_answer);
            $j++;
          }
        }
      }
      $question = [$string => $answers];
      // add array of question strings => answers to result array
      array_push($result, $question);
    }
    return $result;
  }
}