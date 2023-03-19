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
    $file_path = './storepdf/'.$file_name;
    $user = $_SESSION["username"];
    // Delete the file from the storage folder
    if(unlink($file_path)) {
        // Delete the file from the database
        $sql = "DELETE FROM pdfs WHERE pdf = '$file_name' AND userid = '$user'";
        if (mysqli_query($conn, $sql)) {
            header("Location: http://localhost:3000/src/viewpdf.php");
        } else {
            echo "Error deleting file from database: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting file from storage folder.";
    }
} else {
    echo "Error: No file specified.";
}
?>