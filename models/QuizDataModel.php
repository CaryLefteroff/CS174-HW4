<?php

namespace caj_inc\hw4\models;

require_once("models/Model.php");

class QuizDataModel extends Model {
  function getArray() {}
  function getData($language) {
    return unserialize(file_get_contents("data/$language.txt"));
  }
}