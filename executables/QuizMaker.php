<?php
// composer monolog
// monolog used to generate log message for each text file QuizMaker.php processes
require '../vendor/autoload.php';
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$logger = new Logger('quizmaker_logger');

// Need to use handlers to handle logs
$logger->pushHandler(new StreamHandler(__DIR__.'/quiz_file_creation.log', Level::Info));
$logger->pushHandler(new FirePHPHandler());


if(file_exists('../data')) { //file_exists check if a file or dir exists
    $data_folder = opendir('../data'); //can use is_dir to check is something is a directory
    while (($language_folder = readdir($data_folder)) !== false) { // get each language folder
        $accepted_languages = ["english", "spanish", "french", "german", "italian", "portuguese", "russian", "chinese"];
        if ($language_folder == "." || $language_folder == ".." || !is_dir("../data/$language_folder")) {
            continue;
        }
        $text_files = glob("../data/" . $language_folder . "/*.txt");
        if (in_array(strtolower($language_folder), $accepted_languages) && count($text_files) > 0) { // check if language folder is a accepted language
            $quiz_name = "../data/" . $language_folder . ".txt";
            $quiz = [];
            foreach($text_files as $file_name) { //get corpus file paths for each language folder
                if (is_file($file_name)) {
                    $file_handle = fopen($file_name, "r");
                    $file_string = strtolower(fread($file_handle, filesize($file_name)));
                    $file_string = str_replace(array("\n", "\r"), '', $file_string);
                    $sentences = array_filter(preg_split("/[!?.]+/", $file_string));
                    foreach ($sentences as $key => $sentence) {
                        $stripped_sentence = str_replace([',',':',';'], '', $sentence);
                        $words = explode(" ", $stripped_sentence);
                        $count_arr = array_count_values($words);
                        foreach ($count_arr as $word => $count) {
                            if (!array_key_exists($word, $quiz)) {
                                $quiz[$word] = [$count];
                            } else {
                                $quiz[$word][0] = $quiz[$word][0] + $count;
                            }
                        }
                        for ($i = 0; $i < count($words); $i++) {
                            if ($i >= 2 && $i+2 < count($words) ) {
                                $word_gram = $words[$i-2] . " " .  $words[$i-1] . " " .  $words[$i] . " " .  $words[$i+1] . " " .  $words[$i+2]; 
                            } else if ($i == 1 && $i+2 < count($words)) {
                                $word_gram = "[blank] " . $words[$i-1] . " " . $words[$i] . " " . $words[$i+1] . " " . $words[$i+2];
                            } else if ($i == 0 && $i+2 < count($words)) {
                                $word_gram = "[blank] [blank] " . $words[$i] . " " . $words[$i+1] . " " . $words[$i+2];
                            } else if ($i >= 2 && $i+1 == count($words)) {
                                $word_gram = $words[$i-2] . " " . $words[$i-1] . " " . $words[$i] . " [blank] [blank]";
                            } else if ($i >= 2 && $i+2 == count($words)) {
                                $word_gram = $words[$i-2] . " " . $words[$i-1] . " " . $words[$i] . " " . $words[$i+1] . " [blank] ";
                            } else {
                                $word_gram = "[blank] [blank] " . $words[$i] . " [blank] [blank]";
                            }
                            if (count($quiz[$words[$i]]) == 2) {
                                $temp_var = $quiz[$words[$i]][1];
                                $temp_var[] = $word_gram;
                                $quiz[$words[$i]][1] = $temp_var; 
                            } else {
                                array_push($quiz[$words[$i]], [$word_gram]);
                            }
                            
                        }
                    }
                }
                $logger->info('QuizMaker.php processed file: ' . $file_name . ' for folder ' . $language_folder);
            }
            arsort($quiz);
            file_put_contents($quiz_name, serialize($quiz));
        } else {
            $logger->info('QuizMaker.php did not process folder: ' . $language_folder . ' because it did not contain text files');
        }
    }
    $logger->info('Quiz Maker script has finished processing all files');
}


// Below is an example of how to extract quiz data from the serialized file
// Make sure the file path is correct according to your current location
// For each word in every sentence of every file in each language folder, the below occurs
// Each word is a key in the array, the value is an array of size 2 with the word count (index 0) and an array of word gram/s (index 2)
// Returns: Type: Array, Contents: ["word" => [word_count, [word_gram1, word_gram2, ...]]]

// if (file_exists("../data/french.txt")) {
//     $data = unserialize(file_get_contents("../data/french.txt"));
//     if ($data) {
//         // echo count($data) . "\n";
//         print_r($data);
//     }
// }






