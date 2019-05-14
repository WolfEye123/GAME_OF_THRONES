<?php
session_start();

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
    <link rel="stylesheet" href="styles/selectStyle.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>
<body>
<section class="mainWrap">
    <section id="lBlock" class="lBlock">
        <div id="lBlock_slider" class="lBlock_slider"></div>
    </section>
    <section class="rBlock">
        <section id="form2" class="show">
            <form id="aboutForm">
                <div class="rBlock_got2">GAME OF THRONES</div>
                <div class="rBlock_aboutU2">
                    You've successfully joined the game. <br>
                    Tell us more about yourself.
                </div>
                <div class="rBlock_userName">
                    <label for="rBlock_userName"
                           class="rBlock_text1">
                        Who are you?
                    </label>
                    <div class="rBlock_text2">
                        Alpha-numeric username
                    </div>
                    <input type="text"
                           id="rBlock_userName"
                           name="name"
                           maxlength="35"
                           placeholder="arya"
                    required>
                </div>
                <div id="nameError" class="hideError">Incorrect name. Only letters.</div>
                <input type="hidden" id="houseInput" name="house" value="">
                <div class="rBlock_select">
                    <label>Your Great House</label>
                    <section class="wrapper">
                        <div class="newSelector"></div>
                    </section>
                </div>
                <div id="rBlock__textAreaDiv"
                     class="rBlock__textAreaDiv">
                    <label for="rBlock_textarea">
                        Your preferences, hobbies, wishes, etc.
                    </label>
                    <textarea wrap="hard"
                              rows="3"
                              name="textarea"
                              id="rBlock_textarea"
                              placeholder="I have a long TOKILL list"
                              required></textarea>
                </div>
                <div id="textError" class="hideError">Incorrect text. Only letters.</div>
                <div id="inputsError"
                     class="<?= isset($_SESSION['inputsError']) ? $_SESSION['inputsError'] : 'hideError' ?>">
                    Please fill in all the fields
                </div>
                <button type="button" class="rBlock_submit2" id="rBlock_submit2">Save</button>
            </form>
        </section>
    </section>
</section>
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="scripts/userInfoScript.js"></script>
<script src="scripts/selectScript.js"></script>
<script src="scripts/sliderScript.js"></script>
</body>
</html>
<?php
unset(
    $_SESSION['inputsError'],
    $_SESSION['passError']
);
?>
