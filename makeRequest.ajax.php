<?php
require_once('includes/init.php');
@session_start();
// Return object.
$toReturn = [
    'success' => 0,
    'message' => '',
];

// A logged in user should not be able to access this page.
if (!isset($_SESSION['userData'])) {
    $toReturn['message'] = "You should log in!";
    echo json_encode($toReturn);
    die();
}
$id_user = $_SESSION['userData']['id'];
$content = isset($_POST['content']) ? $_POST['content'] : '';

if (empty($content)) {
    $toReturn['message'] = "The request must contain a text";
    echo json_encode($toReturn);
    die();
}

$newNotification = new Notifications();
$newNotification->id_user = $id_user;
$newNotification->content = $content;
$newNotification->save();

$toReturn['success'] = 1;
echo json_encode($toReturn);
die();
