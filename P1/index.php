<?php

$input = 'racecaroiae!';
$pattern = '/[^a-z]/';
$input = strtolower(preg_replace($pattern, '', $input));

// Check palindrome
$reverse = strrev($input);

if ($reverse == $input) {
    echo("they the same!");
} else {
    echo("they do be different...");
}

// Count vowels (aeiou)
$aCount = substr_count($input,'a');
$eCount = substr_count($input,'e');
$iCount = substr_count($input,'i');
$oCount = substr_count($input,'o');
$uCount = substr_count($input,'u');
$totalVowels = $aCount + $eCount + $iCount + $oCount + $uCount;

echo($totalVowels);

// Letter shift
// String to shift
$test = 'abc';
// Turn string into array of characters
$test = str_split($test);
// Create the alphabet key
$alphabet = [
    'a' => 1,
    'b' => 2,
    'c' => 3,
    'd' => 4,
    'e' => 5,
    'f' => 6,
    'g' => 7,
    'h' => 8,
    'i' => 9,
    'j' => 10
];

// Function to take an array of string chars and shift it
function shiftLetters($alphabet, $myArray, $shiftSize) {

    // Loop through the char array
    $shiftedArray = [];
    for ($i = 0; $i < count($myArray); $i++) {
        // Find the number of given char
        $myNumber = $alphabet[$myArray[$i]];
        // Shift the number
        $myNumber = $myNumber + $shiftSize;
        // Make sure number is in range
        if ($myNumber > 26) {
            $myNumber = $myNumber % 26;
        }
        // Shift the char
        $resultChar = array_search($myNumber, $alphabet);
        // Add to new array
        $shiftedArray[$i] = $resultChar;
    }
    
    return $shiftedArray;
}

//$myNumber = $alphabet[$test[2]];
//$myNumber++;
//$result = array_search($myNumber, $alphabet);

var_dump($test);
$result = shiftLetters($alphabet, $test, 1);
var_dump($result);


require  'index-view.php';