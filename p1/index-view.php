<!doctype html>
<html lang='en'>

<head>
    <title>Project 1</title>
    <meta charset='utf-8'>
    <link href=data: , rel=icon>

    <style>
    .myDiv {
        border: 1px solid;
        border-radius: 15px;
        margin: auto;
        width: 60%;
        padding: 25px;
        text-align: center;
    }

    .myButton {
        background-color: #7CF994;
        border-radius: 15px;
        color: black;
        transition-duration: 0.2s;
        border: none;
        padding: 8px 15px 8px 15px;
    }

    .myButton:hover {
        background-color: #3AE15A;
        color: black;
        box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        cursor: pointer;
    }

    hr {
        height: 0.5px;
        background-color: #3AE15A;
        border: none;
    }

    .leftAlign {
        text-align: left;
        padding-left: 50px;
    }
    </style>
</head>

<body>

    <div class='myDiv'>
        <h2><strong>CSCI E-15 - Project 1 : String Processors</strong></h2>
        <h6>Created by: Daniel Bodner</h6>

        <form method='POST' action='process.php'>

            <label for='userInput'>Please enter a string:</label>
            <input type='text' name='userInput' id='userInput'>

            <button class='myButton' type='submit'>Process String</button>
        </form>

        <?php  if(isset($inputString)) { ?>

        <p class='leftAlign'>Your input string:
            <strong><?php echo($inputString); ?></strong>
        </p>

        <div class='leftAlign'>
            <hr>
            <h4>Results:</h4>

            <ul>
                <li>
                    <?php if ($isPalindrome) { ?>
                    <p>Is <?php echo($inputString); ?> a palindrome? <Strong>Yes</strong></p>
                    <?php } else { ?>
                    <p>Is <?php echo($inputString); ?> a palindrome? <Strong>No</strong></p>
                    <?php } ?>
                </li>
                <li>
                    <p>Number of vowels: <strong><?php echo($vowelCount); ?></strong> </p>
                </li>
                <li>
                    <p> <?php echo($inputString); ?> after shifting all letters one place:
                        <strong><?php echo($shiftedString); ?></strong>
                    </p>
                </li>
                <li>
                    <p> <?php echo($inputString); ?> after a <a
                            href="https://en.wikipedia.org/wiki/Caesar_cipher">Caesar
                            Cipher</a>
                        of
                        <strong><?php echo($numberToShift); ?></strong>:
                        <strong><?php echo($caesarCipherString); ?></strong>
                    </p>
                </li>
            </ul>
        </div>
        <?php } ?>
    </div>

</body>

</html>