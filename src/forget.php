<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "createdetails";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  echo "connection Unsucessfull";
} else {
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $answer = $_POST['security-answer'];
    $rp = $_POST['reppsw'];
    $passwordhash = password_hash($pass, PASSWORD_DEFAULT);

    // Check if the email exists in the database
    $email_query = "SELECT * FROM createaccount WHERE email='$email'";
    $email_result = mysqli_query($conn, $email_query);

    if (mysqli_num_rows($email_result) == 0) {
      echo "Invalid email address";
    } else {
      // Check if the password and repeated password match
      if ($pass == $rp) {
        // Check if the user's answer matches one of the security questions
        $security_query = "SELECT * FROM createaccount WHERE email='$email' AND (place = '$answer' OR school = '$answer' OR subject='$answer')";
        $security_result = mysqli_query($conn, $security_query);

        if (mysqli_num_rows($security_result) == 0) {
          echo "Invalid security answer";
        } else {
          // Update the password for the user with the specified email address
          $update_query = "UPDATE createaccount SET password='$passwordhash' WHERE email='$email'";
          if (mysqli_query($conn, $update_query)) {
            echo "<center><br></br><br></br><br></br>Hence Details reset , Login again</center>";
            echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Loginform';\",1000);</script>";
          } else {
            echo "<center><br></br><br></br><br></br>Invalid details to set the password , Proceed again</center>";
            echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Forgetpassword';\",1000);</script>";
          }
        }
      } else {
        echo "<center><br></br><br></br><br></br>Passwords does not match , Proceed again</center>";
            echo "<script>setTimeout(\"location.href = 'http://localhost:3001/Forgetpassword';\",1000);</script>";
      }
    }
  }
}

mysqli_close($conn);
?>
