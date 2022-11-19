<?php

namespace caj_inc\hw4\views;

require_once("View.php");
require_once("controllers/QuizController.php");

use caj_inc\hw4\controllers\QuizController;

class QuizPageContent extends View {
  function render($page_name) {
    // $temp = ["Question 1" => ["Answer 1", "Answer 2", "Answer 3", "Answer 4"]];
    // $questions = [];
    // for ($i = 0; $i < 20; $i++) {
    //     $questions[$i] = $temp; //FOR TESTING
    // }
    $controller = new QuizController();
    $questions = $controller -> generateQuestions($page_name);
    ?>
    <div id="quiz-page">
        <script type="text/javascript">
            function checkBoxes() {
                for(let i = 1; i <= 20; i++) {
                    const name = "answer" + i + "_"
                    const a = "#" + name + 1 + ":checked";
                    const b = "#" + name + 2 + ":checked";
                    const c = "#" + name + 3 + ":checked";
                    const d = "#" + name + 4 + ":checked";
                    const one = document.querySelector(a) !== null;
                    const two = document.querySelector(b) !== null;
                    const three = document.querySelector(c) !== null;
                    const four = document.querySelector(d) !== null;
                    if(!(one || two || three || four)) { //If none of the checkboxes are checked...
                        return false;
                    }
                }
                return true;
            }
        </script>
        <form name="quiz-selections" method="post" action="index.php" onsubmit="return checkBoxes()">
            <input type="hidden" name="c" value="ResultsController">
            <input type="hidden" name="m" value="calculateResults">
            <div>
            <p>Select the words that could be used to fill in the blank (at least one should work).</p>
            </div>
            <?php
            $this->drawQuizQuestions($questions);
            ?>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    <?php
  }

  function drawQuizQuestions($questions) {
    $index = 1;
    foreach($questions as $question) {
        // [0 => "question string", 1 => ["Answer 1", "Answer 2", "Answer 3", "Answer 4"], 2 => "word", 3 => "percentile"]
    	// $k = array_keys($value);
        // $v = array_values($value);
        $word = explode(" ", $question[0])[2];
        $answerIndex = 0;
        $prompt = $index.". ".$question[0];

        $a1 = $question[1][0];
        $a2 = $question[1][1];
        $a3 = $question[1][2];
        $a4 = $question[1][3];
        ?>
        <div>
            <p><?= $prompt ?></p>
            <span>
                <input type="hidden" name=<?php echo "questionString$index" ?> value=<?= $question[0] ?>>
                <input type="hidden" name=<?php echo "questionAnswer$index" ?> value=<?= $question[3] ?>>
                <input type="checkbox" id="answer<?= $index ?>_1" name="answer<?= $index ?>_1"/>
                <label for="answer<?= $index ?>_1"><?= $a1 ?></label>
                <input type="checkbox" id="answer<?= $index ?>_2" name="answer<?= $index ?>_2"/>
                <label for="answer<?$index?>_2"><?= $a2 ?></label>
                <input type="checkbox" id="answer<?= $index ?>_3" name="answer<?= $index ?>_3"/>
                <label for="answer<?$index?>_3"><?= $a3 ?></label>
                <input type="checkbox" id="answer<?= $index ?>_4" name="answer<?= $index ?>_4"/>
                <label for="answer<?$index?>_4"><?= $a4 ?></label>
            </span>
        </div>
        <?php
        $index = $index + 1;
    }
  }
}
