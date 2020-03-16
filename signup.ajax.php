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

$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';
$department = isset($_POST['department']) ? $_POST['department'] : '';
$experience = isset($_POST['experience']) ? $_POST['experience'] : '';


if (empty($first_name) || 
    empty($last_name) ||
    empty($email) || 
    empty($password) ||
    empty($password_confirm) ||
    empty($department) ||
    empty($experience)) {
    $toReturn['message'] = "All fields must be completed.";
    echo json_encode($toReturn);
    die();
}

if ($password != $password_confirm) {
    $toReturn['message'] = "Passwords are not identical.";
    echo json_encode($toReturn);
    die();
}

$user = new User();
$user = $user->where('email', $email)->first();
if ($user != NULL) {
    $toReturn['message'] = "Email already exists.";
    echo json_encode($toReturn);
    die();
}

$user = new User();
$user->email = $email;
$user->password = $password;
$user->role = 0;
$user->save();

$userDetails = new UserDetail();
$userDetails->id_user = $user->id;
$userDetails->first_name = $first_name;
$userDetails->last_name = $last_name;
$userDetails->department = $department;
$userDetails->experience = $experience;
$userDetails->save();

// Login the user.
$userData = $user->toArray();
$_SESSION['userData'] = $userData;

$toReturn['success'] = 1;
echo json_encode($toReturn);
die();
