<!doctype html>
<html lang='en'>

<head>
    <title>Project 1</title>
    <meta charset='utf-8'>
    <link href=data: , rel=icon>
</head>

<body>
    <h1>Project 1</h1>

    <h2>String Processors</h2>

    <form method='POST' action='process.php'>

        <label for='userInput'>Please enter a string:</label>
        <input type='text' name='userInput' id='userInput'>

        <button type='submit'>Process String</button>
    </form>

    <?php  if(isset($inputString)) { ?>

    <h4>Your input string: <?php echo($inputString); ?> </h4>

    <h4>Results:</h4>

    <?php if ($isPalindrome) { ?>
    <p>Is <?php echo($inputString); ?> a palindrome? <Strong>Yes</strong></p>
    <?php } else { ?>
    <p>Is <?php echo($inputString); ?> a palindrome? <Strong>No</strong></p>
    <?php } ?>

    <p>Number of vowels: <strong><?php echo($vowelCount); ?></strong> </p>

    <p> <?php echo($inputString); ?> after shifting all letters one place:
        <strong><?php echo($shiftedString); ?></strong>
    </p>

    <p> <?php echo($inputString); ?> after a <a href="https://en.wikipedia.org/wiki/Caesar_cipher">Caesar Cipher</a> of
        <strong><?php echo($numberToShift); ?></strong>:
        <strong><?php echo($caesarCipherString); ?></strong>
    </p>

    <?php } ?>

</body>

</html>