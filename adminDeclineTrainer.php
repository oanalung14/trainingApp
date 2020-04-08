<?php
require_once('includes/init.php');
@session_start();

$notification_id = $_POST['id'];

$notification = Notifications::find($notification_id);

//delete notification
$notification->delete();

echo "<script type='text/javascript'>alert('Request declined!');</script>";

header('Location: adminTrainerRequest.php');




