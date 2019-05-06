<?php
session_start();
isset($_SESSION['visitors']) ? $_SESSION['visitors']++ : $_SESSION['visitors'] = 1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GAME OF THRONES</title>
    <link rel="shortcut icon" type="image/png" href="images/shortcutIcon.png"/>
    <link rel="stylesheet" href="styles/style.css">
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>
<body>
<div class="mainWrap">
    <section id="lBlock" class="lBlock">
        <div id="lBlock_slider" class="lBlock_slider"></div>
    </section>
    <section class="rBlock">
        <div class="visitors">
            Visitors: <?= isset($_SESSION['visitors']) ? $_SESSION['visitors'] : 0 ?>
        </div>
        <div class="rBlock_got">GAME OF THRONES</div>
        <section id="form1" class="show">
            <form id="loginForm" action="../resources/php/actions.php" method="post">
                <input type="hidden" name="function" value="1">
                <div class="rBlock_email">
                    <label for="rBlock_email">Enter your email</label>
                    <input type="email"
                           id="rBlock_email"
                           name="email"
                           maxlength="35"
                           placeholder="arya@westeros.com"
                           pattern="[aA-zZ0-9]+@[a-z]+\.[a-z]+"
                           required>
                </div>
                <div id="emailError" class="hideError">Incorrect email. Must be like "John@gmail.com"</div>
                <div id="registeredUser"
                     class="<?= isset($_SESSION['userError']) ? $_SESSION['userError'] : 'hideError' ?>">
                    Account already registered to this email
                </div>
                <div class="rBlock_pass">
                    <label for="rBlock_pass">Choose secure password</label>
                    <span>Must be at least 8 characters</span>
                    <input type="password"
                           id="rBlock_pass"
                           name="pass"
                           maxlength="35"
                           placeholder="password"
                           pattern="[0-9aA-zZ]{8,}"
                           required>
                </div>
                <div id="passError"
                     class="<?= isset($_SESSION['passError']) ? $_SESSION['passError'] : 'hideError' ?>">
                    Incorrect password
                </div>
                <div class="rBlock_checkbox">
                    <input type="hidden" name="checkbox" value="off">
                    <input type="checkbox"
                           name="checkbox"
                           id="rBlock_checkbox">
                    <label for="rBlock_checkbox" class="checkboxLabel">Remember Me</label>
                </div>
                <input type="submit" id="formSubmit" class="rBlock_submit" value="Sign up">
                <div id="rBlock_submit">
                </div>
            </form>
        </section>
    </section>
</div>
<script src="scripts/indexScript.js"></script>
<script src="scripts/sliderScript.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>
</html>
<?php
unset(
    $_SESSION['inputsError'],
    $_SESSION['passError'],
    $_SESSION['userError']
);
?>
