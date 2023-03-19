
<body>
    <center>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <style>
        .body{
            margin: 0%;
        }
        .alert{
            margin-left: 300px;
            margin-right: 300px;
            background-color: #FFCCCB;
            border-left: 2px solid black;
            border-right: 2px solid black;
            padding: 10px;
            
        }
        .green{
            background-color: #aaf0d1;
            margin-left: 300px;
            margin-right: 300px;
            border-left: 2px solid black;
            border-right: 2px solid black;
        }
    </style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "createdetails";
$conn = mysqli_connect($servername, $username ,$password,  $dbname);
if(!$conn){
    echo "connection uncessfull";
}
else{
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $place = $_POST["place"];
    $sch = $_POST["school"];
    $sub = $_POST["subject"];

    $passrepeat = $_POST["pswrepeat"];
    $passwordhash = password_hash($pass, PASSWORD_DEFAULT);
    $errors = array();

    
    if(empty($email) or empty($pass) or empty($passrepeat)){
        array_push($errors,"All fields are required");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors,"Email is not valid");
    }
    if(strlen($pass)<8){
        array_push($errors, "password must be atleast 8 characters long");
    }
    if($pass != $passrepeat){
        array_push($errors,"Password does not match");
    }
    $sql = "SELECT * from createaccount WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);
    $rowcount = mysqli_num_rows($result);
    if($rowcount > 0){
        array_push($errors,"Email already exist");
    }
    if(count($errors)>0){
        foreach ($errors as $error){
            echo "<div class = 'alert'>$error</div>";
            echo "Invalid details , Create account again";
echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Createaccount';\",1000);</script>";
        }

    }
    else{
        $sql = "INSERT INTO createaccount(name,email,password,place,school,subject)
        VALUES('$name','$email','$passwordhash','$place','$sch','$sub');";
        if(mysqli_query($conn,$sql)){
            echo "Created Account Sucessfully now you can login in";
echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Loginform';\",1000);</script>";
    }
}
}
}
?>

    </center>
</body>