<?php

namespace caj_inc\hw4\controllers;

// require_once("controllers/Controller.php");
require_once("models/Test.php");

use caj_inc\hw4\models\Test;

class QuizController extends Controller {
  function generateQuestions($language) {
    // format for each question: ["question string" => ["Answer 1", "Answer 2", "Answer 3", "Answer 4"]]
    // aaron's quiz file is an associative array of 
    // word => [occurrences, [5-grams]]
    // get source array
    $model = new Test();
    $source = $model -> getArray();
    // create a result array
    $result = [];
    // 20 times
    for ($i = 0; $i < 20; $i++) {
      // choose a word with uniform probability
      $word = array_rand($source);
      // choose one of the 5-grams with uniform probability
      $string = $source[$word][1][array_rand($source[$word][1])];
      $string = explode(" ", $string);
      $string[2] = "____";
      $string = implode(" ", $string);

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
      // add array of question strings => answers to result array
      $result[$string] = $answers;
    }
    return $result;
  }
}