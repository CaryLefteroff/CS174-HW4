<?php

namespace caj_inc\hw4\views;

require_once("View.php");

class LandingPageContent extends View {
  function render($page_name) {
    ?>
    <div id="quiz-chooser">
        <script type="text/javascript">
            function checkStart() {
                var dropDown = document.getElementById("language").value;
                var textBox = document.getElementById("experience").value;
                if(textBox === "" || dropDown === "Choose a quiz") {
                    alert("Make sure a quiz is selected and your experience has been entered.");
                    return false;
                }
                return true;
            }

            function checkResults() {
                var dropDown = document.getElementById("language").value;
                if(dropDown === "Choose a quiz") {
                    alert("Make sure a quiz is selected.");
                    return false;
                }
                return true;
            }
        </script>
        <form name="landing-form" method="post" action="index.php"  onsubmit="return checkStart()">
            <div>
            <select name="language" id="language">
                <option>Choose a quiz</option>
                <?php
                 $text_files = glob("data/*.txt");
                 print_r($text_files);
                    foreach ($text_files as $file) {
                        $file_name = basename($file, ".txt");
                        if ($file_name !== "QuizStatistics") {
                            echo "<option value='$file_name'>$file_name</option>";
                        }
                    }
                ?>
            </select>
            </div>
            <div>
                <p>Years Experience:</p>
            </div>
            <div>
                <input type="hidden" name="c" value="DisplayController">
                <input type="hidden" name="m" value="renderQuizPage">
                <input type="text" name="experience" id="experience"/>
            </div>
            <div>
                <span>
                    <button type="submit">Start Quiz</button>
                </span>
            </div>
        </form>
        <form name="results" method="post" action="index.php" onsubmit="return checkResults()">
          <input type="hidden" name="c" value="DisplayController">
          <input type="hidden" name="m" value="renderResultsPage">
          <button type="submit">See Results</button>
        </form>
    </div>
    <?php
  }
}
