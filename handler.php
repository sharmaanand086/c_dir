<?php
 $servername = "localhost";
$username = "root";
$password = "anand@123";
$dbname = "certification";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 $name = $_POST['name'];
 $email = $_POST['email'];
 $city = $_POST['city'];
 $message = $_POST['message'];

   $sql = "INSERT INTO `requests`(`name`, `email`, `city`, `message`) VALUES('$name','$email','$city','$message')";
  $result = mysqli_query($conn, $sql);
  if($result == true){
    echo'1';
  }else{
    echo "2";
  }

  ?>
