<?php
require_once('includes\init.php');
@session_start();
if (!isset($_SESSION['userData']) || $_SESSION['userData']['role'] != 1) {
    header('location: index.php');
}

$trainingId = isset($_POST['id']) ? $_POST['id'] : '';
$content = isset($_POST['detail']) ? $_POST['detail'] : '';

$announcement = new Announcement();
$announcement->content = $content;
$announcement->id_training = $trainingId;

$announcement->save();
header('Location: index_trainer.php');
die();

?>