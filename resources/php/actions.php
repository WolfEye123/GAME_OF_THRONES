<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ($_POST['function'] === '1') {
		index();
	} else if ($_POST['function'] === '2') {
		userInfo();
	}
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
	if (!$_POST['name'] || !$_POST['house'] || !$_POST['textarea']) {
		$_SESSION['inputsError'] = 'showError';
		header("Location: ../../public/userInfo.php");
		return;
	}

	// writes fields to the value file
	if ($dir = opendir("../json")) {
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
	file_put_contents($filePath, json_encode($data), JSON_PRETTY_PRINT);
	header("Location: ../../public/index.php");
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
	if ($dir = opendir("../json")) {
		$found = false;
		while ($file = readdir($dir)) {
			if ($file === $postEmail . ".json") {
				$found = true;
				break;
			}
		}
		if (!$found) {
			file_put_contents($filePath, json_encode($object), JSON_PRETTY_PRINT);
			header("Location: ../../public/userInfo.php");
			return;
		}
		$buffer = file_get_contents($filePath);
		$data = json_decode($buffer, true);
		if ($data['password'] === $postPassword) {
			if ($data['name'] && $data['house'] && $data['hobbies']) {
				$_SESSION['userError'] = "showError";
				header("Location: ../../public/index.php");
				return;
			}
			header("Location: ../../public/userInfo.php");
			return;
		} else {
			$_SESSION['passError'] = "showError";
			header("Location: ../../public/index.php");
			return;
		}
	}
}
