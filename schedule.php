<?php

$dateandtime = $_POST['dateandtime'];






if (!empty($dateandtime) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "passport";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{

  $INSERT = "INSERT Into schedule (dateandtime) values(?)";

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("s", $dateandtime);
      $stmt->execute();
      echo "appointment fixed successfully we will shortly ";
     $stmt->close();
     $conn->close();
    }
}
?>