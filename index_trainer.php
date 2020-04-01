<?php
require_once('includes/init.php');
@session_start();
if (!isset($_SESSION['userData']) || $_SESSION['userData']['role'] != 1) {
  header('location: index.php');
}

$_add_css_to_head = array();
$_add_js_to_footer = array();
require_once('includes/header.php');
require_once('includes/nav_bar_trainer.php');

// Showtime.
$trenings = new Training();

$trenings = $trenings->all();
$trainingNumber = 1;
?>
<div class="container">
	<div class="row">
		<table class="table table-striped">
	        <tr>
	            <th></th>
	            <th>Title</th>
	            <th>Date</th>
	            <th>Duration</th>
	            <th>Location</th>
	            <th>Status</th>
	            <th>Description</th>
	            <th></th>
	        </tr>
			<?php
			if (count($trenings) == 0) { ?>
				No results were found
			<?php }
			foreach ($trenings as $trening) { ?>
				<tr>
                    <form method="post">
                    <td><?php echo $trainingNumber ?></td>
                    <td><input class="form-control" id="id" name="id" hidden value="<?php echo $trening->id ?>"><?php echo $trening->title; ?></td>
                    <td><?php echo $trening->date; ?></td>
                    <td><?php echo $trening->duration; ?></td>
                    <td><?php echo $trening->location; ?></td>
                    <td><?php echo $trening->status; ?></td> 
                    <td><button type="submit" class="btn btn-primary background-color-blue" formaction="/trainingApp/trainerEditTraining.php" style="background-color: #003399">Edit informations</button></td>
                    <?php if ($trening->status == "Upcoming"){ ?>
                        <td><button type="submit" class="btn btn-danger" formaction="/trainingApp/trainerCancelTraining.php">Cancel training</button></td>
                    <?php }
                    else { ?>
						<td>&nbsp;</td>
                    <?php }?>
                    </form>
                </tr>
			<?php 
				$trainingNumber++;
				}
			?>
		</table>
	</div>
</div>
<?php
require_once('includes/footer.php');
?>