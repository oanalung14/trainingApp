<?php
require_once('includes/init.php');
@session_start();
// Return object.
$toReturn = [
    'success' => 0,
    'message' => '',
];

// A logged in user should not be able to access this page.
if (isset($_SESSION['userData'])) {
    $toReturn['message'] = "You are already logged in!";
    echo json_encode($toReturn);
    die();
}

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';


if (empty($email) || empty($password)) {
    $toReturn['message'] = "Invalid email / password";
    echo json_encode($toReturn);
    die();
}

// We get the user and check it's password.
$user = new User();
$user = $user->where('email', $email)->first();
if ($user == NULL || $user->password != $password) {
    $toReturn['message'] = "Invalid email / password";
    echo json_encode($toReturn);
    die();
}

$userData = $user->toArray();
$_SESSION['userData'] = $userData;

$toReturn['success'] = 1;
echo json_encode($toReturn);
die();
