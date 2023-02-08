<?php

// PROJECT 1:

// #1 IS PALINDROME:

// Get input string
$input = 'racecaroiae!';
// Set the regular expression pattern
$pattern = '/[^a-z]/';
// Turn string into lowercase and remove non-alphabet characters
$input = strtolower(preg_replace($pattern, '', $input));
// Reverse the string
$reverse = strrev($input);
// Check palindrome and show result
if ($reverse == $input) {
    echo("Yes, your string is a palindrome.");
} else {
    echo("Sorry, your string is NOT a palindrome.");
}

// #2 VOWEL COUNT:

// Count vowels (aeiou)
$aCount = substr_count($input,'a');
$eCount = substr_count($input,'e');
$iCount = substr_count($input,'i');
$oCount = substr_count($input,'o');
$uCount = substr_count($input,'u');
// Get the total number of vowels
$totalVowels = $aCount + $eCount + $iCount + $oCount + $uCount;
// Show results
echo($totalVowels);


// #3 LETTER SHIFT:

// Get the string to shift
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
    'j' => 10,
    'k' => 11,
    'l' => 12,
    'm' => 13,
    'n' => 14,
    'o' => 15,
    'p' => 16,
    'q' => 17,
    'r' => 18,
    's' => 19,
    't' => 20,
    'u' => 21,
    'v' => 22,
    'w' => 23,
    'x' => 24,
    'y' => 25,
    'z' => 26
];

// Function to take an array of string characters and shift it a specific amount
// Returns new array of shifted characters
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

// Do the shift
$result = shiftLetters($alphabet, $test, 1);
// Show results
var_dump($result);


// #4 CAESAR SHIFT - (move the letters over a specified number of characters):

// Get number to shift characters
$numberToShift = 3;
// String to shift -> into array of characters
$testTwo = str_split('abc');
// Do the shift
$resultTwo = shiftLetters($alphabet, $testTwo, $numberToShift);
// Show results
var_dump($resultTwo);



require  'index-view.php';