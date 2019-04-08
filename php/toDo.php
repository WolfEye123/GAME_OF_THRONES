<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST" && function_exists($_POST["function"])) {
    $_POST["function"]();
}


function action()
{
    $houses = [
        "Arryn_of_the_Eyrie",
        "Baratheon_of_Storms_End",
        "Greyjoy_of_Pyke",
        "Lannister_of_Casterly_Rock",
        "Martell_of_Dorn",
        "Stark_of_Winterfell",
        "Targaryen_of_Kings_Landing",
        "Tully_of_WaterLand",
        "Tyrell_of_Highgarden"
    ];

    $filePath = "../json/data.json";
    $buffer = file_get_contents($filePath);
    $data = json_decode($buffer,true);

    $postEmail = $_POST['email'];
    $postPassword = $_POST['pass'];

    $email = $data[$postEmail]['email'];
    $password = $data[$postEmail]['password'];
    $name = $data[$postEmail]['name'];
    $house = $data[$postEmail]['house'];
    $hobbies = $data[$postEmail]['hobbies'];

    if ($email == $postEmail && $password == $postPassword && $name == "" && $house == "" && $hobbies == "") {
        header("Location: userInfo.php");
    } else if ($email == $postEmail && $password == $postPassword) {
        header("Location: ../anonymousVoting/php/index.php");
    }


//    file_put_contents($filename, json_encode($data));
//    header("Location: chart.php");
}