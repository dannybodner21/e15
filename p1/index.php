<?php

// PROJECT 1: STRING PROCESSORS
// Details: Take a user input string and perform various modifications.
// By: Daniel Bodner
// Date: 13FEB2023

// Create session and get info if it exists
session_start();

if (isset($_SESSION['results'])) {

    // User input string
    $inputString = $_SESSION['results']['inputString'];

    // Is the string a palindrome
    $isPalindrome = $_SESSION['results']['isPalindrome'];

    // Vowel count
    $vowelCount = $_SESSION['results']['vowelCount'];

    // String shifted one place
    $shiftedString = $_SESSION['results']['shiftedString'];

    // Caesar cipher string
    $caesarCipherString = $_SESSION['results']['caesarCipherString'];

    // Number used in the Caesar Cipher
    $numberToShift = $_SESSION['results']['numberToShift'];

    // Clear session data
    $_SESSION['results'] = null;
}

require  'index-view.php';