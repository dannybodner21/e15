<?php

session_start();

// Get input string
$inputString = $_POST['userInput'];

// #1 IS PALINDROME:

// Set the regular expression pattern
$pattern = '/[^a-z]/';

// Turn string into lowercase and remove non-alphabet characters
$inputString = strtolower(preg_replace($pattern, '', $inputString));

// Reverse the string
$reverse = strrev($inputString);

// Check palindrome
$isPalindrome = $reverse == $inputString;

// #2 VOWEL COUNT:

// Count vowels (aeiou)
$aCount = substr_count($inputString,'a');
$eCount = substr_count($inputString,'e');
$iCount = substr_count($inputString,'i');
$oCount = substr_count($inputString,'o');
$uCount = substr_count($inputString,'u');

// Get the total number of vowels
$vowelCount = $aCount + $eCount + $iCount + $oCount + $uCount;

// #3 LETTER SHIFT:

// Turn string into array of characters
$newString = str_split($inputString);

// Create an alphabet key to use
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
$shiftedString = shiftLetters($alphabet, $newString, 1);

// #4 CAESAR CIPHER - (move the letters over a specified number of characters):

// Get random number to shift characters
$numberToShift = rand(1,100);

// Do the shift
$caesarCipherString = shiftLetters($alphabet, $newString, $numberToShift);

// Save variables to session
$_SESSION['results'] = [
    'inputString' => $inputString,
    'isPalindrome' => $isPalindrome,
    'vowelCount' => $vowelCount,
    'shiftedString' => implode($shiftedString),
    'caesarCipherString' => implode($caesarCipherString),
    'numberToShift' => $numberToShift
];

# Redirect
header('Location: index.php');