<?php
require 'function.php';
if (isset($_POST["signin_submit"])){

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT username FROM pemesan
WHERE  username ='$username'");


  if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc ($result);
    if(password_verify($password, $row["password"])) {
      header("Location: home.html");
      exit;

    }
  }
  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>sign up form</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<?php if(isset($error)) : ?>

<p>username/password salah<p>

<?php endif; ?>


<form action="" method="post" > 
<div id="login-box">
  <div class="right">
    <!-- <h1>Sign In</h1> -->
    <span class="ketlogin"> Sign In</span>
    <br>
    <br>
    <br>
    <input type="text" name="username" placeholder="Username" />
    <input type="password" name="password" placeholder="Password"/>
    <br>
    
    <input type="submit" name="signin_submit" value="Sign in" />
  </div>
  
  <div class="or">OR</div> 

  <div class="left">
      <span class="loginwith"> Wellcome!</span>
      <button class="social-signin facebook"><a href="login.html" style=" text-decoration: none;">Sign Up<a></a></button>
 </div>

</div>
<form>
<!-- partial -->
  
</body>
</html>