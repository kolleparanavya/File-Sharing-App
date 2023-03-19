<body>
    <style>
        .font{
            font-family:'Courier New', Courier, monospace;
        }
        </style>
</body>

<?php
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

// Check if the file name was passed in the query string
if(isset($_GET['file_name'])) {
    $file_name = $_GET['file_name'];
    $source = './storevideos/'.$file_name;
    $destination = './publicvideos/'.$file_name;
    if(file_exists($source)) {
        if(copy($source, $destination)) {
            // Insert the file information into the "publicpdf" table
            $sql = "INSERT INTO publicvideo (video) VALUES ('$file_name')";
            if (mysqli_query($conn, $sql)) {
                header("Location: http://localhost:3000/src/viewpublicvideos.php");
            }
            else{
                echo "<center><br></br><br></br><br></br><br></br><h1 class='font'>The file is already in public interface</h1><img src='oops.png' alt='image' height='200px' width='400px'></center>";
            }
        }
    }
}
?>