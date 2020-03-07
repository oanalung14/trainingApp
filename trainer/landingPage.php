<!DOCTYPE html>
<html lang="en">
<title>Training app</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
    .w3-bar,h1,button {font-family: "Montserrat", sans-serif, background-color: #12065c}
    .fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Navbar -->
<div class="w3-top" style="background-color: #12065c;">
    <div class="w3-bar w3-card w3-left-align w3-large" style="background-color: #12065c;">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large " href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu" style="background-color: #12065c;"><i class="fa fa-bars"></i></a>
        <a href="http://localhost/trainingApp/index.php" class="w3-bar-item w3-button w3-padding-large w3-white" >Sign out</a>
        <a href="http://localhost/trainingApp/trainer/landingPage.php?it=1" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="color: white;" >test trainer</a>
        <?php
        $userId = $_GET['id'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "training";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM user_detail WHERE id='$userId'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
// output data of each row
            while($row = $result->fetch_assoc()) {
                echo "
<ul class=\"nav navbar-nav navbar-right\">
         <li>
            <a href=\"#\"><span class=\"glyphicon glyphicon-user \"style=\"color: white;\"></span>
                         <span style=\"color: white;\"> ".  $row["first_name"]. " ".  $row["last_name"]. " - Trainer </span>
           </a>
         </li>
      </ul>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>
</div>
<br>
<br>
<br>
<br>


<div class="container" style="width: 1400px">
    <h2>All traings</h2>
    <p>Here are all the trainings created by you:</p>
    <table class="table table-striped">
        <tr>
            <th></th>
            <th>Title</th>
            <th>Date</th>
            <th>Time</th>
            <th>Duration</th>
            <th>Location</th>
            <th>Status</th>
            <th>Description</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "training";
        $trainingNumber = 1;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM training";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "
                    <tr>
                        <td>". $trainingNumber. " </td>
                        <td>".  $row["title"]. "</td>
                        <td>" . $row["date"] . "</td>
                        <td>" . $row["time"] . "</td>
                        <td>" . $row["duration"] . "</td> 
                        <td>" . $row["location"] . "</td>
                        <td>" . $row["status"] . "</td> 
                        <td>" . $row["details"] . "</td>
                        <td><button type=\"button\" class=\"btn\">View training</button></td>
                        <td><button type=\"button\" class=\"btn btn-primary\" style=\"background-color: #12065c;\">Edit informations</button></td> ";
                        if ($row["status"]=="Upcoming"){
                            echo " <td><button type=\"button\" class=\"btn btn-danger\">Cancel training</button></td> ";
                        }
                 echo"   </tr>";
                $trainingNumber = $trainingNumber + 1;
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>

    </table>
</div>


<script>
    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>

</body>
</html>


