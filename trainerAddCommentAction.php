<?php
require_once('includes\init.php');
@session_start();
if (!isset($_SESSION['userData'])) {
    header('location: index.php');
}

$trainingId = isset($_POST['id']) ? $_POST['id'] : '';
$content = isset($_POST['detail']) ? $_POST['detail'] : '';
$id_trainer = isset($_SESSION['userData']['id']);

$comment = new Comment();
$comment->id_user = $id_trainer;
$comment->comment = $content;
$comment->id_training = $trainingId;
$comment->date = date("Y-m-d");


$comment->save();
header('Location: index_trainer.php');
die();

?>
