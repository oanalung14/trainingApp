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
    $toReturn['message'] = "You must log in!";
    echo json_encode($toReturn);
    die();
}

$currentIdTraining = isset($_POST['id']) ? $_POST['id'] : '';

if (empty($currentIdTraining)) {
    $toReturn['message'] = "Invalid id";
    echo json_encode($toReturn);
    die();
}

// check if the user is already enrolled  && if there are remaining places
$userTraining = new UserTraining();
if( !$userTraining->isAlreadyEnrolled($_SESSION['userData']['id'],$currentIdTraining )){
    $currentTraining = Training::where('id', $currentIdTraining)->where('approved', 1)->firstOrFail();
    if( $currentTraining->max_participants > $userTraining->getEnrolledCount($currentIdTraining)){
        $userTraining->id_training = $currentIdTraining;
        $userTraining->id_user = $_SESSION['userData']['id'];
        $userTraining->save();
    } else {
        $toReturn['message'] = "No more places!";
        echo json_encode($toReturn);
        die();
    }
}



$toReturn['success'] = 1;
$toReturn['message'] = $currentTraining->max_participants - $userTraining->getEnrolledCount($currentTraining->id);
echo json_encode($toReturn);
die();
