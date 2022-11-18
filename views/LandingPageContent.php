<?php

namespace caj_inc\hw4\views;

require_once("View.php");

class LandingPageContent extends View {
  function render($page_name) {
    ?>
    <div id="quiz-chooser">
        <form name="landing-form" method="post" action="index.php">
            <div>
            <select name="language" id="language">
                <option>Choose a quiz</option>
                <option value="english">English</option>
                <!--TODO ADD OPTIONS BASED ON GENERATED QUIZZES-->
            </select>
            </div>
            <div>
                <p>Years Experience:</p>
            </div>
            <div>
                <input type="hidden" name="c" value="DisplayController">
                <input type="hidden" name="m" value="renderQuizPage">
                <input type="text" name="experience"/>
            </div>
            <div>
                <span>
                    <button type="submit" >Start Quiz</button>
                </span>
            </div>
        </form>
        <form name="results" method="post" action="index.php">
          <input type="hidden" name="c" value="DisplayController">
          <input type="hidden" name="m" value="renderResultsPage">
          <button type="submit">See Results</button>
        </form>
    </div>
    <?php
  }
}
