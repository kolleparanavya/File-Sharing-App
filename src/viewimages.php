<body class='fullbody'>
<body>
    <style>
        .fullbody{
            background-image : url('background.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .button1{
            margin-left : 40px;
            border: none;
            white-space: pre-wrap; 
           word-wrap: break-word;
           width: 150px;
           text-decoration: none;
        }
        .button{
            width: 100px;
            height: 50px;
            margin-left: 40px;
            margin-bottom: 10px;
            margin-top: 10px;
            
        }
        .otherfiles{
            
            margin-top: 5px;
            background-color: #2b3f5c;
        }
        .widths {
            width : 200px;
        }
        div.home{
            text-align: right;
        }
        div.search-form{
            text-align: right;
        }
        mark{
            background-color: yellow;
        }
        .publicbutton{
            width: 200px;
            height: 50px;
        }
        </style>
        <div class='home'>
        <a  href = "http://localhost:3001/Dashboard"><b><font color="brown">HOME</font></b></a></div>
        <div class="otherfiles">
            
            <center>
            <a href="http://localhost:3000/src/viewpublicimages.php"><button class="publicbutton">View Public Interface</button></a>
                <a href="http://localhost:3000/src/viewpdf.php"><button class="button">pdf's</button></a>
                <a href="http://localhost:3000/src/viewppt.php"><button class="button">Ppt's</button></a>
                <a href="http://localhost:3000/src/viewdoc.php"><button class="button">Documents</button></a>
                <a href="http://localhost:3000/src/viewvideos.php"><button class="button">Videos</button></a>
                <a href="http://localhost:3000/src/viewmusics.php"><button class="button">Musics</button></a>
            </center>
            
        </div>
</body>
<hr>
<div class="search-form">
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search Your Image" value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">
            <input type="submit" value="Search">
        </form>
    </div>
<br></br>
<center>
<table border="2px">
  <tr>
     <th class='widths'>Serial Number</th>
    <th class='widths'>View files</th>
    <th class='widths'>Download Files</th>
    <th class='widths'>Delete Files</th>
    <th class='widths'>Public Sharing</th>
  </tr>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uploadfiles";

$user = $_SESSION["username"];

// Connect to the MySQL server
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select all pdfs of the current user
$search = "";
  if(isset($_GET["search"])){
      $search = $_GET["search"];
  }
$sql = "SELECT image FROM images WHERE userid = '$user'";
$result = mysqli_query($conn, $sql);
$i = 1;
// Iterate over the result set
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $name = $row["image"];
        $folder = './storeimages';
        $files = glob($folder . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        foreach ($files as $file) {
            $file_name = basename($file);
            if ($file_name == $name) {
                echo '<tr>';
                echo '<td><center>'.$i.'</center></td>';
                echo '<td><center> <a href="'.$file.'" target="_blank"> <img src="image.jpg" alt="PDF icon" style="width:90px;height:90px;"> <br> <font color="black">'.str_ireplace($search, "<mark>$search</mark>", $file_name).'</font></a><center></td>';
                echo '<td><center><a href="'.$file.'" download>Download</center></a></td>';
                // Generate a public link using the file path or a URL
                echo '<td><center>';
                echo '<a href="deleteimage.php?file_name='.$file_name.'"><font color = "red">Delete</font></a>';
                echo '</center></td>';
                echo '<td> <center><a href="pinsertimage.php?file_name='.$file_name.'" onclick="return confirm(\'Are you sure you want to move the file to public interface?\');">move the file to public interface</a></center></td>';
                echo '</tr>';
                $i++;
            }
        }
    }
} 
else {
    echo "No Images found for the current user";
}
?>
</table>
</center>
</body>