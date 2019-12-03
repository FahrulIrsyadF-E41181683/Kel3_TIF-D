 <?php
 require 'function.php';
if (isset($_POST["signup_submit"])){
  if (daftar($_POST) > 0){
    echo "<script>
          alert ('user berhasil ditambah');
        </script>";
  }else{
    echo mysqli_error($conn);}
}
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>sign up form</title>
  <link rel="stylesheet" href="./signup.css">

</head>
<body>
<!-- partial:index.partial.html -->
<form action="" method="post" >
<div id="login-box">
  <div class="left">
    <h1>Daftar Akun</h1>
     
  <input type="text" name="username" placeholder="Username" required/>
  <input type="text" name="email" placeholder="E-mail" required/> 
  <input type="tel" name="notelepon" placeholder="Telepon" required/> 
  <input type="password" name="password" placeholder="Password" required/>
  <input type="password" name="password2" placeholder="Retype password" required/>
  <input type="submit" name="signup_submit" value="Sign me up" />

  </div>
  
  <div class="right">
    <span class="loginwith">Sudah ada akun?</span>
    <button class="social-signin facebook"><a href="login.html" style=" text-decoration: none;">Login Now<a></a></button>
  </div>
<div class="or">OR</div> 
</div>
<!-- partial -->
  
</body>
</html>