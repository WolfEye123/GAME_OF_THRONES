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
    <link rel="shortcut icon" type="image/png" href="../images/dark1.png"/>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/selectStyle.css">
</head>
<body>
<section class="mainWrap">
    <section id="lBlock" class="lBlock">
        <div id="lBlock_house"></div>
    </section>
    <section class="rBlock">
        <section id="form2" class="show">
            <form id="aboutForm" action="toDo.php" method="post">
                <input type="hidden" name="function" value="userInfo">
                <input type="hidden" id="houseInput" name="house" value="">
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
                <input type="submit" disabled="disabled" id="rBlock_submit2" value="Save">
            </form>
        </section>
    </section>
</section>
<script src="../scripts/script2.js"></script>
<script src="../scripts/jQuery.js"></script>
<script src="../scripts/selectScript.js"></script>
</body>
</html>