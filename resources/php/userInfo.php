<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	return;
}

// variables
$postName = isset($_POST['userName']) ? $_POST['userName'] : false;
$postHouse = isset($_POST['house']) ? $_POST['house'] : false;
$postTextarea = isset($_POST['textarea']) ? $_POST['textarea'] : false;
$fileName = $_SESSION['email'];
$filePath = "../json/$fileName.json";

// if at least one of the fields is empty we return an error
if (!$postName || !$postHouse || !$postTextarea) {
	$_SESSION['inputsError'] = 'showError';
	echo 'http://localhost/GAME_OF_THRONES/public/userInfo.php';
	return;
}

// writes fields to the value file
$buffer = file_get_contents($filePath);
if (!$buffer){
	return;
}

$data = json_decode($buffer, true);

$data['name'] = $_POST['userName'];
$data['house'] = $_POST['house'];
$data['hobbies'] = $_POST['textarea'];
file_put_contents($filePath, json_encode($data), JSON_PRETTY_PRINT);
echo 'http://localhost/GAME_OF_THRONES/public/index.php';
