<?php
require_once('includes/init.php');
@session_start();
if (!isset($_SESSION['userData']) || $_SESSION['userData']['role'] != 2) {
  header('location: index.php');
}

$_add_css_to_head = array();
$_add_js_to_footer = array(
	'resources/index_user.js',
    'resources/make_request.js'
);
require_once('includes/header.php');
require_once('includes/nav_bar_user.php');


$trenings = new Training();

$trenings = $trenings->where('status', 'Upcoming')->where('approved', 1)->get();

$userTraining = new UserTraining();
$userEnrolledTraining = $userTraining->getEnrolled($_SESSION['userData']['id']);
?>
<div class="container">
	<div class="row">
		<table class="table table-striped">
	        <tr>
	            <th>Id</th>
	            <th>Title</th>
	            <th>Date</th>
	            <th>Time</th>
	            <th>Duration</th>
	            <th>Location</th>
	            <th>Remaining places</th>
	            <th>Details</th>
	            <th>Status</th>
	            <th></th>
	        </tr>
			<?php
			if (count($trenings) == 0) { ?>
				0 results
			<?php }
			foreach ($trenings as $trening) {
			    $remainingPlaces = $trening->max_participants - $userTraining->getEnrolledCount($trening->id);
			    ?>
				<tr>
                    <td><?php echo $trening->id; ?></td>
                    <td><?php echo $trening->title; ?></td>
                    <td><?php echo $trening->date; ?></td>
                    <td><?php echo $trening->time; ?></td>
                    <td><?php echo $trening->duration; ?></td>
                    <td><?php echo $trening->location; ?></td>
                    <td id="places<?php echo $trening->id ?>"><?php echo $remainingPlaces; ?></td>
                    <td><?php echo $trening->details; ?></td>
                    <td><?php echo $trening->status; ?></td>
                    <?php
                        if (!in_array($trening->id, $userEnrolledTraining)) { ?>
                    <td><button id="e<?php echo $trening->id ?>" type="button" class="btn btn-primary background-color-blue" style="background-color: #003399" onclick="enroll('<?php echo $trening->id ?>')">Enroll</button></td>
                       <?php } else { ?>
                    <td><button type="button" class="btn btn-primary background-color-blue" style="background-color: #003399" disabled>Enroll</button></td>
                       <?php } ?>

                </tr>
			<?php }
			?>
		</table>
	</div>
</div>
<?php
require_once('includes/footer.php');
?>