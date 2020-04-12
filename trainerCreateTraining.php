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

?>
<div class="container">
    <b><h2 style="color:#003399; margin-left: 400px; margin-bottom: 40px ">Create training</h2></b>
        <form action="trainerCreateTrainingAction.php" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" id="title" placeholder="The name of the training" name="title">
            </div>
            <div class="form-group">
                <label for="detail">Description</label>
                <textarea class="form-control" id="detail" rows="3" name="detail"></textarea>
            </div>
            <div class="form-group">
                <label for="participants">Number of participants</label>
                <select class="form-control" id="participants" name="participants">
                    <option>5</option>
                    <option>10</option>
                    <option>25</option>
                    <option>40</option>
                    <option>100</option>
                </select>
            </div>
            <div class="form-group">
                <label for="datetime">Date and time</label>
                <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="datetime" name="datetime">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <select class="form-control" id="location" name="location">
                    <option>MSG - Negreanu</option>
                    <option>MSG - Kilimanjaro</option>
                    <option>MSG - Fuji</option>
                    <option>MSG - Aconcagua</option>
                    <option>NTT - Socrate</option>
                    <option>NTT - Saturn</option>
                    <option>NTT - Platon</option>
                    <option>NTT - Discovery</option>
                    <option>FSEGA - Victor Jinga</option>
                </select>
            </div>
            <div class="form-group">
                <label for="duration">How long will it take</label>
                <input class="form-control" id="duration" placeholder="3 hours" name="duration">
            </div>
            <button type="submit" class="btn btn-primary background-color-blue" style="background-color: #003399">Submit</button>
        </form>
</div>
<?php
require_once('includes/footer.php');
?>
