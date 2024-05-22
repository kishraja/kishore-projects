<?php 
require_once("connection.php");
  $fullname = $_post[fullname];
  $dob = $_post[dob];
  $addres = $_post[addres];
  $documentupload = $_post[documentupload];
  $pannumber = $_post[pancardnumber];
  $aadharnumber =$_post[Aadharcardnumber];
session_start();
  if(empty($_SESSION['user'])){
    header("Location: login.php");
  }
  
  // Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{

  
    $INSERT = "INSERT Into apply (fullname , dob , addres , documentupload , pancardnumber , Aadharcardnumber) values(?,?,?,?,?,?)";

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssss", $fullname,$dob,$addres,$documentupload,$pannumber,$aadharnumber);
      $stmt->execute();
      echo " successfuly applied for the passport after the verification process passport will be  approved for your application ";
     $stmt->close();
     $conn->close();
    }

?>
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* styles.css */

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-image: url(pass.jpg);

}

header {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 20px 0;
}

nav {
  background-color: #444;
  padding: 10px 0;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  text-align: center;
}

nav ul li {
  display: inline;
  margin: 0 10px;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
}

section {
  padding: 20px;
}

footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px 0;
  position: fixed;
  bottom: 0;
  width: 100%;
}

form {
  max-width: 400px;
  margin: 0 auto;
}

input[type="text"], input[type="email"], input[type="password"], input[type="date"], textarea, input[type="file"] {
  width: 100%;
  padding: 10px;
  margin: 5px 0;
  box-sizing: border-box;
}

input[type="submit"] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

b{
  text-transform: uppercase;
}

p{
  text-align: center;
  text-decoration-color: black;
  text-shadow: #333;
  font-size: 32px;
}

</style>
<body>
<section id="apply">
  <p>Passport Application</p>
  
  <form id="applicationForm" action="apply.php" method="post">
    <label for="fullname"><b>Full Name:</b></label>
    <input type="text" id="fullname" name="fullname" required>

    <label for="dob"><b>Date of Birth:</b></label>
    <input type="date" id="dob" name="dob" required>
   
    <label for="address"><b>Address:</b></label>
    <textarea id="addres" name="addres" required></textarea>

    <label for="documentUpload"><b>Upload address proof Documents:</b></label>
    <input type="file" id="documentUpload" name="documentUpload" accept=".pdf,.doc,.docx" multiple required>

    <label for="pancardnumber"><b>pancardnumber:</b></label>
    <input type="text" id="pancardnumber" name="pancardnumber" required>

    <label for="aadharcardnumber"><b>Aadharcardnumber:</b></label>
    <input type="text" id="Aadharcardnumber" name="Aadharcardnumber" required>

    

    <input type="submit" value="Submit Application" onclick="redirect()" >
  </form>
</section>
<script>
  function redirect()
  {
    window.location.href="schedule.html"
  }
</script>

</body>
</html>