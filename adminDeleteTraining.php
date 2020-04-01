<?php
require_once('includes/init.php');
@session_start();

$id_training = $_POST['id'];

$training = Training::find($id_training);
$training->delete();

header('Location: index_admin.php');