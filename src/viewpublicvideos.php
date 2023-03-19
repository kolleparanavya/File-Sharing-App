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
            background-color: #2a293e;
        }
        .widths {
            width : 200px;
        }
        div.dropdown{
            text-align: right;
        }
        div.search-form{
            text-align: right;
        }
        mark{
            background-color: yellow;
        }
        </style>
        <form action="">
  <div class="dropdown">
    <select name="navigate" onchange="location = this.value;">
      <option value="">Go Back</option>
      <option value="viewvideos.php">Move to Private Interface</option>
      <option value="http://localhost:3001/Dashboard">Move to Dashboard</option>
    </select>
  </div>
</form>
        <h1>PUBLIC INTERFACE</h1>
        <div class="otherfiles">
            
            <center>
            <a href="http://localhost:3000/src/viewpublicpdfs.php"><button class="button">pdfs</button></a>
                <a href="http://localhost:3000/src/viewpublicppts.php"><button class="button">Ppt's</button></a>
                <a href="http://localhost:3000/src/viewpublicdocs.php"><button class="button">Documents</button></a>
                <a href="http://localhost:3000/src/viewpublicimages.php"><button class="button">images</button></a>
                <a href="http://localhost:3000/src/viewpublicmusics.php"><button class="button">Musics</button></a>

            </center>
            
        </div>
</body>
<hr>
<div class="search-form">
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search Your Videos" value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">
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
    <th class='widths'>Delete</th>
  </tr>
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
  // Select all pdfs from the publicpdf table
  $search = "";
  if(isset($_GET["search"])){
      $search = $_GET["search"];
  }
  $sql = "SELECT video FROM publicvideo";
  $result = mysqli_query($conn, $sql);
  
  // Iterate over the result set
  $i = 1;
  if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
        $name = $row["video"];
        $folder = './publicvideos';
        $files = glob($folder . '/*.{mp4,avi,mkv,wmv}', GLOB_BRACE);
        foreach ($files as $file) {
            $file_name = basename($file);
            if ($file_name == $name) {
                echo '<tr>';
                echo '<td><center>'.$i.'</center></td>';
                echo '<td><center> <a href="'.$file.'" target="_blank"> <img src="video.png" alt="PPT icon" style="width:90px;height:90px;"> <br> <font color="black">'.str_ireplace($search, "<mark>$search</mark>", $file_name).'</font></a><center></td>';
                echo '<td><center><a href="'.$file.'" download>Download</center></a></td>';
                echo '<td><center>';
                echo '<a href="deletepublicvideos.php?file_name='.$file_name.'"><font color = "red">Delete</font></a>';
                echo '</center></td>';
                echo '</tr>';
                $i++;
            }
        }
    }
} 
else {
    echo "No Videos found for the current user";
}
mysqli_close($conn);
?>
</table>

</center>
</body>