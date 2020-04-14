<?php
require_once('includes/init.php');
@session_start();
if (isset($_SESSION['userData'])) {
    // User is logged in.
    switch ($_SESSION['userData']['role']) {
        case '1':
            header('Location: index_trainer.php');
            break;
        case '2':
            header('Location: index_user.php');
            break;
        default:
            header('Location: index_admin.php');
            break;
    }
}
else {
    header('Location: login.php');
}
