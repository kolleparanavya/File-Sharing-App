<?php
session_start();
?>
<body>
    
    <style>
        .green{
            background-color: #aaf0d1;
            margin-left: 300px;
            margin-right: 300px;
            border-left: 2px solid black;
            border-right: 2px solid black;
        }
        .button{
            width: 100px;
            height: 40px;
        }
        .alert{
            margin-left: 300px;
            margin-right: 300px;
            background-color: #FFCCCB;
            border-left: 2px solid black;
            border-right: 2px solid black;
            padding: 10px;
            
        }
        .red{
            margin-left: 300px;
            margin-right: 300px;
            background-color: #FFCCCB;
            border-left: 2px solid black;
            border-right: 2px solid black;
            padding: 5px;
        }
        </style>

</body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "createdetails";
$conn = mysqli_connect($servername, $username ,$password,  $dbname);
if(!$conn){
    echo "connection uncessfull";
}
else {
    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $_SESSION["username"]= $_POST["email"];
        $sql = "SELECT * FROM createaccount WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            if (password_verify($pass, $user["password"])) {
                header("Location: http://localhost:3001/Dashboard");
            } else {
                // display error message
                echo "<center><br><br><br><br><br><div class = 'alert'>Invalid details ,login again";
echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Loginform';\",10000);</script></div><center>";
            }
        } else {
            // display error message
            echo "<center><br><br><br><br><br><div class = 'alert'>Invalid details ,login again";
echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Loginform';\",10000);</script></div></center>";
        }
    }
}
