<?php

namespace caj_inc\hw4\models;

require_once("Model.php");

use caj_inc\hw4\models\Model;

class Test extends Model {
  function getArray() {
    return [
      "the" => [2, ["[blank] [blank] the quick brown", "jumped over the lazy dog"]],
      "quick" => [1, ["[blank] the quick brown fox"]],
      "brown" => [1,["the quick brown fox jumped"]],
      "fox" => [1,["quick brown fox jumped over"]],
      "jumped" => [1,["brown fox jumped over the"]],
      "over" => [1,["fox jumped over the lazy"]],
      "lazy" => [1,["over the lazy dog [blank]"]],
      "dog" => [1,["the lazy dog [blank] [blank]"]]
    ];
  }
}