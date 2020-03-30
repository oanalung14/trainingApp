<?php
require_once('includes\init.php');
@session_start();
if (!isset($_SESSION['userData']) || $_SESSION['userData']['role'] != 1) {
    header('location: index.php');
}

$_add_css_to_head = array();
$_add_js_to_footer = array();
require_once('includes/header.php');
require_once('includes/nav_bar_trainer.php');

$trenings = new Training();
$trenings = $trenings->where('status', 'Upcoming')->get();
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
            foreach ($trenings as $trening) { ?>
                <tr>
                    <td><?php echo $trening->id; ?></td>
                    <td><?php echo $trening->title; ?></td>
                    <td><?php echo $trening->date; ?></td>
                    <td><?php echo $trening->time; ?></td>
                    <td><?php echo $trening->duration; ?></td>
                    <td><?php echo $trening->location; ?></td>
                    <td><?php echo $trening->max_participants; ?></td>
                    <td><?php echo $trening->details; ?></td>
                    <td><?php echo $trening->status; ?></td>
                    <td><button type="button" class="btn btn-primary background-color-blue" style="background-color: #003399" onclick="enroll('<?php echo $trening->id ?>')">Enroll</button></td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</div>
<?php
require_once('includes/footer.php');
?>