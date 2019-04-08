<?php
session_start();
$_SESSION['image'] = "";
isset($_SESSION['visitors']) ? $_SESSION['visitors']++ : $_SESSION['visitors'] = 1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GAME OF THRONES</title>
    <link rel="shortcut icon" type="image/png" href="../images/dark1.png"/>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<div class="mainWrap">
    <section id="lBlock" class="lBlock"></section>
    <section class="rBlock">
        <div class="visitors">
            Visitors: <?= isset($_SESSION['visitors']) ? $_SESSION['visitors'] : 0 ?>
        </div>
        <div class="rBlock_got">GAME OF THRONES</div>
        <section id="form1" class="show">
            <form id="loginForm" action="toDo.php" method="post">
                <input type="hidden" name="function" value="action">
                <div class="rBlock_email">
                    <label for="rBlock_email">Enter your email</label>
                    <input type="email"
                           id="rBlock_email"
                           name="email"
                           maxlength="35"
                           placeholder="arya@westeros.com" required>
                </div>
                <div id="emailError" class="hideError">Incorrect email</div>
                <div id="unknownUser" class="hideError">There are no registered accounts for this email</div>
                <div class="rBlock_pass">
                    <label for="rBlock_pass">Choose secure password</label>
                    <span>Must be at least 8 characters</span>
                    <input type="password"
                           id="rBlock_pass"
                           name="pass"
                           maxlength="35"
                           placeholder="password" required>
                </div>
                <div id="passError" class="hideError">Incorrect password</div>
                <div class="rBlock_checkbox">
                    <input type="checkbox" id="rBlock_checkbox">
                    <label for="rBlock_checkbox" class="checkboxLabel">Remember Me</label>
                </div>
                <div id="rBlock_submit">
                    <input type="submit" disabled="disabled" id="formSubmit" class="rBlock_submit" value="Sign up">
                </div>
            </form>
        </section>
    </section>
</div>
<script src="../scripts/script.js"></script>
</body>
</html>