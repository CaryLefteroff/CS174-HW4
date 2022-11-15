<?php

namespace caj_inc\hw4;

require_once("View.php");

class LandingPageContent extends View {
  function render() {
    // drawHeader();
    ?>
    <div>
        <form name="landing-form" method="post" action="index.php">
            <div>
            <select name="choose" id="choose">
                <option>Choose a quiz</option>
                <!--TODO ADD OPTIONS BASED ON GENERATED QUIZZES-->
            </select>
            </div>
            <div>
                <p>Years Experience:</p>
            </div>
            <div>
                <input type="text" name="experience"/>
            </div>
            <div>
                <span>
                    <button type="submit">Start Quiz</button>
                    <button type="submit">See Results</button>
                </span>
            </div>
        </form>
    </div>
    <?php
  }
}
