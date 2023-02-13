<?php

// Start session
session_start();

// Get input string
$inputStringOriginal = $_POST['userInput'];

// #1 IS PALINDROME:

// Set the regular expression pattern
$pattern = '/[^a-z]/';

// Turn string into lowercase and remove non-alphabet characters
$inputStringCleaned = preg_replace($pattern, '', strtolower($inputStringOriginal));

// Reverse the string
$reverse = strrev($inputStringCleaned);

// Check palindrome
$isPalindrome = $reverse == $inputStringCleaned;

// #2 VOWEL COUNT:

// Count vowels (aeiou)
$aCount = substr_count($inputStringCleaned,'a');
$eCount = substr_count($inputStringCleaned,'e');
$iCount = substr_count($inputStringCleaned,'i');
$oCount = substr_count($inputStringCleaned,'o');
$uCount = substr_count($inputStringCleaned,'u');

// Get the total number of vowels
$vowelCount = $aCount + $eCount + $iCount + $oCount + $uCount;

// #3 LETTER SHIFT:

// Turn string into array of characters
$newString = str_split($inputStringOriginal);

// Create a lowercase alphabet key to use
$alphabetLowercase = [
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

// Create an uppercase alphabet key to use
$alphabetUppercase = [
    'A' => 1,
    'B' => 2,
    'C' => 3,
    'D' => 4,
    'E' => 5,
    'F' => 6,
    'G' => 7,
    'H' => 8,
    'I' => 9,
    'J' => 10,
    'K' => 11,
    'L' => 12,
    'M' => 13,
    'N' => 14,
    'O' => 15,
    'P' => 16,
    'Q' => 17,
    'R' => 18,
    'S' => 19,
    'T' => 20,
    'U' => 21,
    'V' => 22,
    'W' => 23,
    'X' => 24,
    'Y' => 25,
    'Z' => 26
];

// Function to take an array of string characters and shift it a specific amount
// Returns new array of shifted characters
function shiftLetters($alphabetLowercase, $alphabetUppercase, $myArray, $shiftSize) {

    // Loop through the char array
    $shiftedArray = [];

    for ($i = 0; $i < count($myArray); $i++) {

        // Check if char is in the alphabet or not
        if (!array_key_exists($myArray[$i], $alphabetLowercase) && 
            !array_key_exists($myArray[$i], $alphabetUppercase)) {
                // Not in alphabet, save the special character
                
                $resultChar = $myArray[$i];
        } else {
            // Char is in the alphabet

            // Get either lowercase or uppercase alphabet
            if (array_key_exists($myArray[$i], $alphabetLowercase)) {
                $myAlphabet = $alphabetLowercase;
            } elseif (array_key_exists($myArray[$i], $alphabetUppercase)) {
                $myAlphabet = $alphabetUppercase;
            }

            // Find the number of given char
            $myNumber = $myAlphabet[$myArray[$i]];

            // Shift the number
            $myNumber = $myNumber + $shiftSize;

            // Make sure number is in range
            if ($myNumber > 26) {
                $myNumber = $myNumber % 26;
            }

            // Shift the char
            $resultChar = array_search($myNumber, $myAlphabet);
        }

        // Add to new array
        $shiftedArray[$i] = $resultChar;
    }
    
    return $shiftedArray;
}

// Do the shift
$shiftedString = shiftLetters($alphabetLowercase, $alphabetUppercase, $newString, 1);

// #4 CAESAR CIPHER - (move the letters over a specified number of characters):

// Get random number to shift characters
$numberToShift = rand(1,26);

// Do the shift
$caesarCipherString = shiftLetters($alphabetLowercase, $alphabetUppercase, $newString, $numberToShift);

// Save variables to session
$_SESSION['results'] = [
    'inputString' => $inputStringOriginal,
    'isPalindrome' => $isPalindrome,
    'vowelCount' => $vowelCount,
    'shiftedString' => implode($shiftedString),
    'caesarCipherString' => implode($caesarCipherString),
    'numberToShift' => $numberToShift
];

# Redirect
header('Location: index.php');