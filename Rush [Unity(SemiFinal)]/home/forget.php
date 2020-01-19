<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


$connection= new mysqli("localhost", "root", "", "sibolang(manbasdat)");
if (isset($_POST["kirim"]))
{
    $email= $_POST['email'];
    $selectquery = mysqli_query($connection, "SELECT * FROM pelanggan WHERE EMAIL_PELANGGAN='{$email}'") or die(myqli_error($connection));
    $count= mysqli_num_rows($selectquery);
    $row= mysqli_fetch_array($selectquery);

    if($count>0);
    {
        

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0 ;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
        $mail->Username   = 'fyrwm3@gmail.com';         // SMTP username
        $mail->Password   = 'gold2018';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('frywm3@gmail.com', 'Mailer');
        $mail->addAddress($email, $email);     // Add a recipient
    
        // Content
        $url = "http://" . $_SERVER["HTTP_HOST"] .dirname($_SERVER["PHP_SELF"]). "/reset.php";
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Forgot Password';
        $mail->Body    = "Hi $email your Password is {$row['PASSWORD_PELANGGAN']} <p> Atau Klik <a href='$url'>link ini</a> untuk mereset password </p>";
        $mail->AltBody = "Hi $email youR Password is {$row['PASSWORD_PELANGGAN']}";
    
        $mail->send();
        header("Location: homelogin.php");

    } catch (Exception $e) {
      echo "<script>
      alert ('email salah')
  </script>"; }
     }
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Rush Badminton</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/animate/animate.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

   <!-- forgot password -->
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="forget.css">

</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class=""><a href="#"></a></li>
          <li><a href="home1.php">Halaman Utama</a></li>
          
          <li class="nav-item dropdown"><img src="img/user.png"  width='40px'></li>
        </ul>
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h3 class="text-center">Lupa Kata Sandi?</h3>
                  <p>Password anda akan dikirim ke email anda<p>
        
                  <div class="panel-body">
    
                    <form action="" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="kirim" class="btn btn-lg btn-primary btn-block" value="Kirim" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
    </div>
  </section><!-- #hero -->
<br>

</body>
</html>
