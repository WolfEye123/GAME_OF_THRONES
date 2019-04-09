<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST" && function_exists($_POST["function"])) {
    $_POST["function"]();
}

/**
 * Writes ​​to the file this fields values: name, house, hobbies.
 */
function userInfo()
{
    // variables
    $fileName = $_SESSION['email'];
    $filePath = "../json/$fileName.json";

    // if at least one of the fields is empty we return an error
    if ($_POST['name'] === '' || $_POST['house'] === '' || $_POST['textarea'] === '') {
        $_SESSION['inputsError'] = "showError";
        header("Location: userInfo.php");
        return;
    }

    // writes fields to the value file
    if ($dir = opendir('../json')) {
        while (false !== ($file = readdir($dir))) {
            if ($file === $fileName . ".json") {
                break;
            }
        }
    }
    $buffer = file_get_contents($filePath);
    $data = json_decode($buffer, true);
    $data['name'] = $_POST['name'];
    $data['house'] = $_POST['house'];
    $data['hobbies'] = $_POST['textarea'];
    file_put_contents($filePath, json_encode($data));
    header("Location: ../anonymousVoting/php/index.php");
}

/**
 * validates the form during registration and authorization
 */
function index()
{
    // variables
    $postEmail = $_POST['email'];
    $postPassword = $_POST['pass'];
    $checkbox = $_POST['checkbox'];
    $_SESSION['email'] = $_POST['email'];

    $filePath = "../json/$postEmail.json";

    // json object
    $object = (object)[
        'email' => $postEmail,
        'password' => $postPassword,
        'checkbox' => $checkbox,
        'name' => '',
        'house' => '',
        'hobbies' => ''
    ];

    // form validation
    if ($dir = opendir('../json')) {
        while (false !== ($file = readdir($dir))) {
            if ($file === $postEmail . ".json") {
                $buffer = file_get_contents($filePath);
                $data = json_decode($buffer, true);
                if ($data['password'] === $postPassword) {
                    if ($data['name'] !== "" && $data['house'] !== "" && $data['hobbies'] !== "") {
                        header("Location: ../anonymousVoting/php/index.php");
                        return;
                    }
                    header("Location: userInfo.php");
                    return;
                } else {
                    $_SESSION['passError'] = "showError";
                    header("Location: index.php");
                    return;
                }
            }
        }
        file_put_contents($filePath, json_encode($object));
        header("Location: userInfo.php");
        return;
    }
}