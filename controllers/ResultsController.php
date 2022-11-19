<?php

namespace caj_inc\hw4\controllers;

// require_once("QuizController.php");

class ResultsController extends Controller {
  function getResults() {
    $file_name = "data/QuizStatistics.txt";
      return unserialize(file_get_contents($file_name));
  }

  function putResults($results) {
    $file_name = "../data/QuizStatistics.txt";
    file_put_contents($file_name, serialize($results));
  }

  function calculateResults($language, $results) {
    for ($i = 1; $i <= 20; $i++) {
      $question_string = $results["questionString$i"];
      $question_answer = $results["questionAnswer$i"];
      $correctIndex = $results["questionAnswerIndex$i"];
      $options = [];
      $options[1] = $results["answer$i"."_1"];
      $options[2] = $results["answer$i"."_2"];
      $options[3] = $results["answer$i"."_3"];
      $options[4] = $results["answer$i"."_4"];
      $quiz_controller = new QuizController();
      $source = $quiz_controller -> getData($language);
      $correct = false;
      for ($j = 1; $j <= 4; $j++) {
        // word => [occurrences, [array of 5-grams]]
        if ($options[$j] != null) {
          if ($j == $correctIndex) {
            $correct = true;
          } else {
            $correct = false;
          }
        }
      }
      $results = $this -> getResults() ? $this -> getResults() : [];
      // print_r($results);
      echo $question_answer;
      // check if word exists in QuizStatistics
      if (in_array($question_answer, $results)) {
        // yes: increase word question count
        $results[$question_answer]["questionCount"] += 1;
      } else {
        // no: add word with word question count 1 and correct count 0
        $results[$question_answer]["questionCount"] = 1;
        $results[$question_answer]["correctCount"] = 0;
      }
      // if correct, increase word correct count
      if ($correct) {
        $results[$question_answer]["correctCount"] += 1;
      }
    }
    $this -> putResults($results);
  }
}