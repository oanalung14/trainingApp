<?php
require_once('includes\init.php');
@session_start();
if (!isset($_SESSION['userData']) || $_SESSION['userData']['role'] != 1) {
    header('location: index.php');
}

$id = isset($_POST['id']) ? $_POST['id'] : '';

$training = new Training();
$training = $training->where('id', $id)->firstOrFail();

$title = isset($_POST['title']) ? $_POST['title'] : '';
$detail = isset($_POST['descr']) ? $_POST['descr'] : '';
$participants = isset($_POST['participants']) ? $_POST['participants'] : '';
$datetime = isset($_POST['datetime']) ? $_POST['datetime'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$duration = isset($_POST['duration']) ? $_POST['duration'] : '';
$id_trainer = isset($_SESSION['userData']['id']);

$training->id = $id;
$training->title = $title;
$training->date = $datetime;
$training->time = $datetime;
$training->duration = $duration;
$training->location = $location;
$training->details = $detail;
$training->max_participants = $participants;
$training->id_trainer = $id_trainer;

$training->save();

header('Location: index_trainer.php');
die();
?>
