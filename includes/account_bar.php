<?php
@session_start();
$user_id = $_SESSION['userData']['id'];
$userDetail = new UserDetail();
$userDetail = $userDetail->where('id_user', $user_id)->firstOrFail();
?>
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $userDetail->first_name . ' ' . $userDetail->last_name ?></a>
	<div class="dropdown-menu">
	  <a class="dropdown-item" href="#" onclick="openMakeRequestForm(); return false;">Make request</a>
	  <a class="dropdown-item" href="logout.php">Logout</a>
	</div>
</li>

<div class="modal" tabindex="-1" role="dialog" id="makeRequestForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request</h5>
                <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-content">
                    <div class="form-group">
                        <label for="content_input"><b>Content:</b></label>
                        <textarea class="form-control textarea-great"  placeholder="Enter your text" id="content" name="content" required></textarea>
                    </div>
                    <button onclick="sendRequest(); return false">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>