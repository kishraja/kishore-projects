
<?php
require_once("connection.php");

$username = $_POST['username'];
$pwd = $_POST['pwd'];
$emailid  = $_POST['emailid'];





if (empty($username) || empty($pwd) || empty($emailid) )
{
  echo "empty field found";
}
else{
  $SELECT = "SELECT emailid From register Where emailid = ? Limit 1";
  $INSERT = "INSERT Into register (username , pwd , emailid) values(?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $emailid);
     $stmt->execute();
     $stmt->bind_result($emailid);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $username,$pwd,$emailid);
      $stmt->execute();
      echo "sucessfully registered";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
  }
?>