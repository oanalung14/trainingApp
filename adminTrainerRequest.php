<?php
require_once('includes/init.php');
@session_start();
if (!isset($_SESSION['userData']) || $_SESSION['userData']['role'] != 0) {
    header('location: index.php');
}

$_add_css_to_head = array();
$_add_js_to_footer = array();
require_once('includes/header.php');
require_once('includes/nav_bar_admin.php');

// Showtime.
$notifications= new Notifications();

$notifications = $notifications->all();
$notificationNumber = 1;
?>
<div class="container">
    <div class="row">
        <table class="table table-striped">
            <tr>
                <th></th>
                <th>Requester</th>
                <th>Comment</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            if (count($notifications) == 0) { ?>
                No results were found
            <?php }
            foreach ($notifications as $notification) { ?>
                <tr>
                    <form method="post">
                        <td><?php echo $notificationNumber ?></td>
                        <?php
                        $userDetail = new UserDetail();
                        $id_user = $notification->id_user;
                        $userDetail = $userDetail->where('id_user', $id_user)->firstOrFail();
                        ?>
                        <td><input class="form-control" id="id" name="id" hidden value="<?php echo $notification->id ?>"><?php echo $userDetail->first_name . ' ' . $userDetail->last_name; ?></td>
                        <td><?php echo $notification->content; ?></td>
                        <td><button type="submit" class="btn btn-info" formaction="/trainingApp/adminApproveTrainer.php">Approve</button></td>
                        <td><button type="submit" class="btn btn-info" formaction="/trainingApp/adminDeclineTrainer.php">Decline</button></td>
                    </form>
                </tr>
                <?php
                $notificationNumber++;
            }
            ?>
        </table>
    </div>
</div>
<?php
require_once('includes/footer.php');
?>
