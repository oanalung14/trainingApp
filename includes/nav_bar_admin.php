<?php
@session_start();
$user_id = $_SESSION['userData']['id'];
$userDetail = new UserDetail();
$userDetail = $userDetail->where('id_user', $user_id)->firstOrFail();
?>
<!-- Navbar -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="http://localhost/trainingApp/index_admin.php">Training management</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $userDetail->first_name . ' ' . $userDetail->last_name ?></a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="adminTrainingRequest.php">Training requests</a>
            <a class="dropdown-item" href="#">Trainer requests</a>
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </li>
</ul>