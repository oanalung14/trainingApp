<?php
$email = $_GET['uname'];
$pas = $_GET['psw'];

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

$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pas'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if( $row["role"] == "0") {
            header('Location: http://localhost/trainingApp/admin/landingPage.php?id='. $row["id"]);

          //  die();
        }
        if( $row["role"] == "1") {
            header('Location: http://localhost/trainingApp/trainer/landingPage.php?id=' . $row["id"] );
         //   die();
        }
        if( $row["role"] == "2") {
            header('Location: http://localhost/trainingApp/user/landingPage.php?id=' . $row["id"] );
        //    die();
        }
    }
}
$conn->close();
?>


