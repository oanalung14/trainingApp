<?php
require_once('includes/init.php');
@session_start();

$notification_id = $_POST['id'];

$notification = Notifications::find($notification_id);
$id_user = $notification->id_user;

//update user
$user = User::find($id_user);
$user->role = '1';
$user->save();

echo "<script type='text/javascript'>alert('Request successfully approved!');</script>";

//delete notification
$notification->delete();

header('Location: adminTrainerRequest.php');




