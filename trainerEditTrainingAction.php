<?php
require_once('includes\init.php');
@session_start();
if (!isset($_SESSION['userData']) || $_SESSION['userData']['role'] != 1) {
    header('location: index.php');
}

$id_training = $_POST['id'];

$training = Training::find($id_training);

$title = isset($_POST['title']) ? $_POST['title'] : '';
$participants = isset($_POST['participants']) ? $_POST['participants'] : '';
$datetime = isset($_POST['datetime']) ? $_POST['datetime'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$duration = isset($_POST['duration']) ? $_POST['duration'] : '';
$id_trainer = isset($_SESSION['userData']['id']);

$training->date = $datetime;
$training->time = $datetime;
$training->duration = $duration;
$training->location = $location;
$training->max_participants = $participants;

$training->save();

header('Location: index_trainer.php');
die();
?>
