<?php
require_once('includes\init.php');
@session_start();
if (!isset($_SESSION['userData']) || $_SESSION['userData']['role'] != 1) {
    header('location: index.php');
}

$title = isset($_POST['title']) ? $_POST['title'] : '';
$detail = isset($_POST['detail']) ? $_POST['detail'] : '';
$participants = isset($_POST['participants']) ? $_POST['participants'] : '';
$datetime = isset($_POST['datetime']) ? $_POST['datetime'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$duration = isset($_POST['duration']) ? $_POST['duration'] : '';
$id_trainer = isset($_SESSION['userData']['id']);

$training = new Training();
$training->title = $title;
$training->date = $datetime;
$training->time = $datetime;
$training->duration = $duration;
$training->location = $location;
$training->status = 'Upcoming';
$training->details = $detail;
$training->max_participants = $participants;
$training->id_trainer = $id_trainer;

$training->save();
$training2 = $training->where('title', $title)->first();
header('Location: index_trainer.php');
die();

?>

