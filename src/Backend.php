<?php
session_start();
$user = $_SESSION["username"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uploadfiles";
$conn = mysqli_connect($servername, $username ,$password,  $dbname);

if(!$conn){
    echo "connection uncessfull";
}
else{
if(isset($_POST['submit']) && $_FILES['fileupload']['error'] == 0){
    $file_name = $_FILES['fileupload']['name'];
    $file_size = $_FILES['fileupload']['size'];
    $tmp_name = $_FILES['fileupload']['tmp_name'];
    $error = $_FILES['fileupload']['error'];
    if($error == 0){
        if($file_size > 1000000000000){
            echo"Sorry your file is too large";
        }
        else{
            $_SESSION["filename"] = $file_name;
            $file_exten = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_lo = strtolower($file_exten);
            
            
            $allowimages = array("jpg","jpeg","png");
            $allowpdf = array("pdf");
            $allowdoc = array("docx");
            $allowppts = array("pptx");
            $allowvideos = array("mp4", "avi", "mkv", "wmv");
            $allowmusics = array("mp3","wav","aiff","flac","aac","m4a","ogg","mpeg");
            #inserting images in images table
            if(in_array($file_lo , $allowimages)){
                $file_path = 'storeimages/'.$file_name;
                move_uploaded_file($tmp_name, $file_path);
                $sql = "INSERT INTO images(image,extension,userid)
                VALUES('$file_name','$file_exten','$user');";
                if(mysqli_query($conn,$sql)){
                    header("Location: http://localhost:3000/src/Viewimages.php");
                }
                else{
                    echo "<center><br></br><br></br><br></br><h1>File aleady exist</h1></center>";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Dashboard';\",1000);</script>";
                }
                
            }
            #inserting pdfs in pdf table
            else if(in_array($file_lo , $allowpdf)){
                $file_path = 'storepdf/'.$file_name;
                move_uploaded_file($tmp_name, $file_path);
                $sql = "INSERT INTO pdfs(pdf,extension,userid)
                VALUES('$file_name','$file_exten','$user');";
                 if(mysqli_query($conn,$sql)){
                    header("Location: http://localhost:3000/src/viewpdf.php");
                    }
                    else{
                        echo "<center><br></br><br></br><br></br><h1>File aleady exist</h1></center>";
                        echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Dashboard';\",1000);</script>";
                    }

                
            }
            #inserting documents in documents table
            else if(in_array($file_lo , $allowdoc)){
                $file_path = 'storedoc/'.$file_name;
                move_uploaded_file($tmp_name, $file_path);
                $sql = "INSERT INTO documents(doc,extension,userid)
                VALUES('$file_name','$file_exten','$user');";
                 if(mysqli_query($conn,$sql)){
                    header("Location: http://localhost:3000/src/viewdoc.php");
                    }
                    else{
                        echo "<center><br></br><br></br><br></br><h1>File aleady exist</h1></center>";
                        echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Dashboard';\",1000);</script>";
                    }
                
            }
            #inserting ppts in ppts table
            else if(in_array($file_lo , $allowppts)){
                $file_path = 'storeppt/'.$file_name;
                move_uploaded_file($tmp_name, $file_path);
                $sql = "INSERT INTO ppts(ppt,extension,userid)
                VALUES('$file_name','$file_exten','$user');";
                 if(mysqli_query($conn,$sql)){
                    header("Location: http://localhost:3000/src/Viewppt.php");
                    }
                    else{
                        echo "<center><br></br><br></br><br></br><h1>File aleady exist</h1></center>";
                        echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Dashboard';\",1000);</script>";
                    }
                
            }
            #inserting videos in videos table
            else if(in_array($file_lo , $allowvideos)){
                $file_path = 'storevideos/'.$file_name;
                move_uploaded_file($tmp_name, $file_path);
                $sql = "INSERT INTO videos(video,extension,userid)
                VALUES('$file_name','$file_exten','$user');";
                 if(mysqli_query($conn,$sql)){
                    header("Location: http://localhost:3000/src/viewvideos.php");
                    }
                    else{
                        echo "<center><br></br><br></br><br></br><h1>File aleady exist</h1></center>";
                        echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Dashboard';\",1000);</script>";
                    }
                
            
                
            }
            else if(in_array($file_lo , $allowmusics)){
                $file_path = 'storemusics/'.$file_name;
                move_uploaded_file($tmp_name, $file_path);
                $sql = "INSERT INTO musics(music,extension,userid)
                VALUES('$file_name','$file_exten','$user');";
                 if(mysqli_query($conn,$sql)){
                    header("Location: http://localhost:3000/src/viewmusics.php");
                    }
                    else{
                        echo "<center><br></br><br></br><br></br><h1>File aleady exist</h1></center>";
                        echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Dashboard';\",1000);</script>";
                    }
                
            }
            
            
    }
}
}
else{
    echo "sorry file not uploaded";
}
mysqli_close($conn);
}

?>