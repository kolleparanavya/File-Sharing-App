<?php
  session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uploadfiles";


// Connect to the MySQL server
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the form was submitted
if(isset($_GET['file_name'])) {
    $file_name = $_GET['file_name'];
    $file_path = './publicppts/'.$file_name;
    $user = $_SESSION["username"];
    $sql = "SELECT userid from ppts where ppt = '$file_name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
        if($row["userid"] == $user){
            if(unlink($file_path)) {
            $query = "DELETE FROM publicppt WHERE  ppt = '$file_name'";
            $result = mysqli_query($conn, $query);
            header("Location: http://localhost:3000/src/viewpublicppts.php");
        }
    }
        else{
            echo "<center><br></br><br></br><br></br><h1>You cannot delete that file</h1></center>";
            echo "<script>setTimeout(\"location.href = 'http://localhost:3000/src/viewpublicppts.php';\",1000);</script>";
        }
    }

?>