<?php
@session_start();
$user_id = $_SESSION['userData']['id'];
$userDetail = new UserDetail();
$userDetail = $userDetail->where('id_user', $user_id)->firstOrFail();
?>
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $userDetail->first_name . ' ' . $userDetail->last_name ?></a>
	<div class="dropdown-menu">
	  <a class="dropdown-item" href="#">Settings</a>
	  <a class="dropdown-item" href="logout.php">Logout</a>
	</div>
</li>