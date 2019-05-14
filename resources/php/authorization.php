<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	return;
}

isset($_POST['email']) ? $_POST['email'] : false;
// variables
$postEmail = isset($_POST['email']) ? $_POST['email'] : false;
$postPassword = isset($_POST['pass']) ? $_POST['pass'] : false;
$postCheckbox = isset($_POST['checkbox']) ? $_POST['checkbox'] : false;
if (!$postEmail && !$postPassword && !$postCheckbox){
	return;
}
$_SESSION['email'] = $_POST['email'];

$filePath = "../json/$postEmail.json";

// json object
$object = (object)[
	'email' => $postEmail,
	'password' => $postPassword,
	'checkbox' => $postCheckbox,
	'name' => '',
	'house' => '',
	'hobbies' => ''
];

// form validation
$buffer = file_get_contents($filePath);
if (!$buffer) {
	file_put_contents($filePath, json_encode($object), JSON_PRETTY_PRINT);
	header("Location: ../../public/userInfo.php");
	return;
}

$data = json_decode($buffer, true);

if ($data['password'] !== $postPassword) {
	$_SESSION['passError'] = "showError";
	header("Location: ../../public/index.php");
	return;
}

if ($data['name'] && $data['house'] && $data['hobbies']) {
	$_SESSION['userError'] = "showError";
	header("Location: ../../public/index.php");
	return;
}

header("Location: ../../public/userInfo.php");
