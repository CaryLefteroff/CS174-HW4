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
    $questions = $controller -> generateQuestions("language");
    ?>
    <div id="quiz-page">
        <script type="text/javascript">
            function checkBoxes() {
                for(var i = 1; i <= 20; i++) {
                    let name = "answer" + i + "_"
                    let a = "#" + name + 1 + ":checked";
                    let b = "#" + name + 2 + ":checked";
                    let c = "#" + name + 3 + ":checked";
                    let d = "#" + name + 4 + ":checked";
                    let one = document.querySelector(a) !== null;
                    let two = document.querySelector(b) !== null;
                    let three = document.querySelector(c) !== null;
                    let four = document.querySelector(d) !== null;
                    if(!(one || two || three || four)) { //If none of the checkboxes are checked...
                        return false;
                    }
                }
                return true;
            }
        </script>
        <form name="quiz-selections" method="post" action="index.php" onsubmit="return checkBoxes()">
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
            <h5><?php echo $prompt; ?></h5>
            <span>
                <input type="hidden" name=<?= $word ?> value=<?= $percentile ?>>
                <input type="checkbox" id="answer<?php echo $index;?>_1" name="answer<?php echo $index;?>_1"/>
                <label for="answer<?$index?>_1"><?php echo $a1;?></label>
                <input type="checkbox" id="answer<?php echo $index;?>_1" name="answer<?php echo $index;?>_2"/>
                <label for="answer<?$index?>_2"><?php echo $a2;?></label>
                <input type="checkbox" id="answer<?php echo $index;?>_1" name="answer<?php echo $index;?>_3"/>
                <label for="answer<?$index?>_3"><?php echo $a3;?></label>
                <input type="checkbox" id="answer<?php echo $index;?>_1" name="answer<?php echo $index;?>_4"/>
                <label for="answer<?$index?>_4"><?php echo $a4;?></label>
            </span>
        </div>
        <?php
        $index = $index + 1;
    }
  }
}
