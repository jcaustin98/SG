<?php
/*
Problem 1:

    Description

            Given a list of people with their birth and end years (all between 1900 and 2000),
            find the year with the most number of people alive.

    Code

        Solve using a language of your choice and dataset of your own creation.

    Submission

        Please upload your code, dataset, and example of the program’s output to Bit Bucket or Github. Please include any graphs or charts created by your program.
*/
include_once('yearMostAlive.php');

$test_input_1 = array(
    ['birth' => 1901, 'end' => 1931,],
    ['birth' => 1901, 'end' => 1931,],
    ['birth' => 1901, 'end' => 1932,],
    ['birth' => 1901,  'end' => 1933,],
);

$max_age = new yearMostAlive();
$stats = $max_age->getYearMostAlive($test_input_1);
echo "\n" . 'Year with most people alive (' . $stats['alive'] . ') was 19' . $stats['year'] . "\n\n";