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
        <section id="form2" class="hide">
            <form id="aboutForm">
                <div class="rBlock_gotForm2">GAME OF THRONES</div>
                <div class="rBlock_aboutUForm2">
                    You've successfully joined the game. <br>
                    Tell us more about yourself.
                </div>
                <div class="rBlock__fInputForm2">
                    <label for="rBlock_fInputForm2-name" class="rBlock_fInputForm2-whoAreYou">Who are you?</label>
                    <div class="rBlock_fInputForm2-username">
                        Alpha-numeric username
                    </div>
                    <input type="text" id="rBlock_fInputForm2-name" maxlength="35"
                           placeholder="arya">
                </div>
                <div class="rBlock_sInputForm2">
                    <label>Your Great House</label>
                    <section class="wrapper">
                        <div class="newSelector"></div>
                    </section>
                </div>
                <div id="rBlock__thInputForm2" class="rBlock__thInputForm2">
                    <label for="rBlock_thInputForm2-textarea">Your preferences, hobbies, wishes, etc.</label>
                    <textarea wrap="hard" rows="3" id="rBlock_thInputForm2-textarea" placeholder="I have a long TOKILL list"></textarea>
                </div>
                <input type="submit" id="rBlock_sInputForm2-submit" value="Save">
            </form>
        </section>
    </section>
</section>
</body>
</html>