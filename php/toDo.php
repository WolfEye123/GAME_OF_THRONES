<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST" && function_exists($_POST["function"])) {
    $_POST["function"]();
}

function userInfo()
{
    $filePath = "../json/data.json";
    $buffer = file_get_contents($filePath);
    $data = json_decode($buffer, true);

    $postEmail = $_SESSION['email'];
    $postName = $_POST['name'];
    $postHouse = $_POST['house'];
    $postTextarea = $_POST['textarea'];

    $data[$postEmail]['name'] = $postName;
    $data[$postEmail]['house'] = $postHouse;
    $data[$postEmail]['hobbies'] = $postTextarea;

    file_put_contents($filePath, json_encode($data));

    header("Location: ../anonymousVoting/php/index.php");
}

function index()
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
    $data = json_decode($buffer, true);

    $postEmail = $_POST['email'];
    $postPassword = $_POST['pass'];
    $_SESSION['email'] = $postEmail;
    $email = $data[$postEmail]['email'];
    $password = $data[$postEmail]['password'];
    $name = $data[$postEmail]['name'];
    $house = $data[$postEmail]['house'];
    $hobbies = $data[$postEmail]['hobbies'];

    if ($email == $postEmail && $password == $postPassword) {
        if (!$name == "" || !$house == "" || !$hobbies == ""){
            header("Location: userInfo.php");
        }
    } else if ($email == $postEmail && $password == $postPassword) {
        header("Location: ../anonymousVoting/php/index.php");
    }


//    file_put_contents($filename, json_encode($data));
//    header("Location: chart.php");
}