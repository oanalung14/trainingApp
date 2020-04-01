<?php
require_once('includes/init.php');
@session_start();

$id_training = $_POST['id'];

$training = Training::find($id_training);
$training->approved = '1';
$training->save();

header('Location: adminTrainingRequest.php');