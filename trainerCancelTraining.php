<?php
require_once('includes\init.php');
@session_start();
if (!isset($_SESSION['userData']) || $_SESSION['userData']['role'] != 1) {
    header('location: index.php');
}

$id_training = $_POST['id'];

$training = Training::find($id_training);
$training->status = 'Canceled';
$training->save();

$enrolledUsers = UserTraining::find($comment->id_training);
foreach ($enrolledUsers as $user) {
    $email = User::find($comment->email);

    $sub = "Canceled Training";
    $msg = "We are sorry to inform you that the training $training->title on $training->date was canceled";
    $rec = $email;
    mail($rec, $sub, $msg);
}

$sub = "Canceled Training";
$msg = "Trainig was succesfully canceled.";
$rec = "trainingappubb@gmail.com";
mail($rec, $sub, $msg);

header('Location: index_trainer.php');
die();
?>
