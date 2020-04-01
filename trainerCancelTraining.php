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

//the subject
$sub = "Your subject";
//the message
$msg = "Your message";
//recipient email here
$rec = "trainingappubb@gmail.com";
//send email
mail($rec,$sub,$msg);

header('Location: index_trainer.php');
die();
?>
