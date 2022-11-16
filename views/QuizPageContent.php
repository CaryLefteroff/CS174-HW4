<?php

namespace caj_inc\hw4\views;

require_once("View.php");

class QuizPageContent extends View {
  function render() {
    $temp = ["Question 1" => ["Answer 1", "Answer 2", "Answer 3", "Answer 4"]];
    $questions = [];
    for ($i = 0; $i < 20; $i++) {
        $questions[$i] = $temp; //FOR TESTING
    }
    ?>
    <div id="quiz-page">
        <form name="quiz-selections" method="post" action="index.php">
            <div>
            <p>Select the words that could be used to fill in the blank (at least one should work).</p>
            </div>
            <?php
            drawQuizQuestions($questions);
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
    foreach($questions as $key => $value) {
    	$k = array_keys($value);
        $v = array_values($value);
        $answerIndex = 0;
        $prompt = $index.". ".$k[0];
        $a1 = $v[0][0];
        $a2 = $v[0][1];
        $a3 = $v[0][2];
        $a4 = $v[0][3];
        ?>
        <div>
            <h5><?php echo $prompt; ?></h5>
            <span>
                <input type="checkbox" name="answer<?$index?>_1"/>
                <label for="answer<?$index?>_1"><?php echo $a1;?></label>
                <input type="checkbox" name="answer<?$index?>_2"/>
                <label for="answer<?$index?>_2"><?php echo $a2;?></label>
                <input type="checkbox" name="answer<?$index?>_3"/>
                <label for="answer<?$index?>_3"><?php echo $a3;?></label>
                <input type="checkbox" name="answer<?$index?>_4"/>
                <label for="answer<?$index?>_4"><?php echo $a4;?></label>
            </span>
        </div>
        <?php
        $index = $index + 1;
    }
  }
}
