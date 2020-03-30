<?php
@session_start();
$user_id = $_SESSION['userData']['id'];
$userDetail = new UserDetail();
$userDetail = $userDetail->where('id_user', $user_id)->firstOrFail();
?>
<!-- Navbar -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="http://localhost/trainingApp/index_trainer.php">Training management</a>
  </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $userDetail->first_name . ' ' . $userDetail->last_name ?></a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="http://localhost/trainingApp/trainerCreateTraining.php">Create training</a>
            <a class="dropdown-item" href="http://localhost/trainingApp/trainerJoinTraining.php">Join training</a>
            <a class="dropdown-item" href="http://localhost/trainingApp/trainer/trainerProfile.php">Profile</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </li>
</ul>