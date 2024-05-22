<?php 
require_once("connection.php");
session_start();
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
  background-image: url(log.jpeg);
  
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
h2{
    text-align: center;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    
}

</style>
<body>
  
      
    <section id="login">
        <h2>Login</h2>
        <form id="loginForm" action="login.php" method="post">
          <label for="loginUsername"><b>Username:</b></label>
          <input type="text" id="username" name="username" required>
      
          <label for="loginPassword"><b>Password:</b></label>
          <input type="password" id="Pwd" name="pwd" required>
      
          <input type="submit" value="Login" name="sub">
        </form>
      </section>
      
      <?php 
        if(isset($_POST['sub'])){
          $username=$_POST["username"];
          $password=$_POST["pwd"];

          $check_qry = "select * from register where username='$username' and pwd='$password'";
          $res = mysqli_query($conn, $check_qry);
          if(mysqli_num_rows($res) > 0){
            echo "user login";
            $_SESSION['user']=$username; 
            header("Location: apply.php");
          } else {
            echo "incorrect password";
          }
        }
      ?>
    
</body>
</html>