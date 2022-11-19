<?php

namespace caj_inc\hw4\controllers;

require_once("models/QuizDataModel.php");
use caj_inc\hw4\models\QuizDataModel;

class QuizController extends Controller {
  function generateQuestions($language) {
    // format for each question: [0 => "question string", 1 => ["Answer 1", "Answer 2", "Answer 3", "Answer 4"], 2 => "word", 3 => "percentile"]
    // get source array
    $source = $this -> getData($language);
    $num_words = 0;
    foreach ($source as $word) {
      $num_words += $word[0];
    }
    // create a result array
    $result = [];
    // 20 times
    for ($i = 0; $i < 20; $i++) {
      // choose a word with uniform probability
      $word = array_rand($source);
      // echo $word." ";
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
      // [0 => "question string", 1 => ["Answer 1", "Answer 2", "Answer 3", "Answer 4"], 2 => "word", 3 => "percentile"]
      $percentile = round($source[$word][0] / $num_words) * 100;
      while (fmod($percentile, 5) != 0) $percentile++;
      $correctIndex = $position;
      $question = [$string, $answers, $word, $percentile, $correctIndex];
      array_push($result, $question);
      // $result[$string] = $answers;
    }
    return $result;
  }

  function getData($language) {
    $model = new QuizDataModel();
    return $model->getData($language);
  }
}