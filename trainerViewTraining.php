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

$trainingId = $_POST['id'];
$training = Training::find($trainingId);

$title = isset($_POST['title']) ? $_POST['title'] : '';
$participants = isset($_POST['participants']) ? $_POST['participants'] : '';
$datetime = isset($_POST['datetime']) ? $_POST['datetime'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$duration = isset($_POST['duration']) ? $_POST['duration'] : '';
$id_trainer = isset($_SESSION['userData']['id']);
?>
<html>
<head>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        .item1 { grid-area: header; }
        .item2 { grid-area: menu; }
        .item3 { grid-area: main; }
        .item4 { grid-area: right; width: 200px}
        .item5 { grid-area: footer; }

        .grid-container {
            display: grid;
            grid-template-areas:
                'header header header header header header'
                'menu main main main right right'
                'menu footer footer footer footer footer';
            grid-gap: 10px;
            background-color: white;
            padding: 10px;
        }

        .grid-container > div {
            background-color: rgba(255, 255, 255, 0.8);
            text-align: left;
            padding: 20px 0;
            font-size: 30px;
        }
    </style>
</head>
<body>
<div class="grid-container">
    <div style="text-align: center;" class="item1"><b style="color: #003399; font-size: 30px; text-align: center;"><?php echo $training->title; ?></b></div>
    <div tyle="text-align: center;"  class="item2"><i class='fas fa-laptop' style='font-size:200px;color: #003399;text-align: center;'></i></div>
    <div class="item3">
        <h3 style="font-size: 20px;"><b style="color: #003399">When:</b> <?php echo $training->date; ?></h3>
        <h3 style="font-size: 20px;"><b style="color: #003399">Duration:</b> <?php echo $training->duration; ?></h3>
        <h3 style="font-size: 20px;"><b style="color: #003399">Where:</b><?php echo $training->location; ?></h3>
        <h3 style="font-size: 20px;"><b style="color: #003399">Status:</b><?php echo $training->status; ?></h3>
        <h3 style="font-size: 20px;"><b style="color: #003399">Seats:</b><?php echo $training->max_participants; ?></h3>
        <h3 style="font-size: 20px;"><b style="color: #003399">Short description:</b><br><?php echo $training->details; ?></h3>
    </div>
    <div class="item4">
        <h2 style="font-size: 25px;"><b style="color: #003399">Announcements</b></h2>

        <?php if ($_SESSION['userData']['role'] == 1){ ?>
            <form action="trainerCreateAnnouncementAction.php" method="post">
                <input class="form-control" id="id" name="id" hidden value="<?php echo $training->id ?>">
                <div class="form-group">
                    <textarea class="form-control" id="detail" rows="3" name="detail" placeholder="Write a new announcement"></textarea>
                </div>
                <button type="submit" class="btn btn-primary background-color-blue" style="background-color: #003399">Add</button>
            </form>
        <?php }
        else { ?>
            <br>
        <?php }?>



    </div>
    <div style="width: 600px" class="item5"><h2 style="font-size: 25px;"><b style="color: #003399">Comments</b></h2>
    <form action="trainerAddCommentAction.php" method="post">
        <input class="form-control" id="id" name="id" hidden value="<?php echo $training->id ?>">
        <div class="form-group">
            <textarea class="form-control" id="detail" rows="3" name="detail" placeholder="Write comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary background-color-blue" style="background-color: #003399">Add</button>
    </form>
    </div>
</div>

</body>
<?php
require_once('includes/footer.php');
?>
