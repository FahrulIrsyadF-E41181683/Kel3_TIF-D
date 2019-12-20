<!DOCTYPE html>
<html class="h-100" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Rush Badminton</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style_bank.css" rel="stylesheet">

    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->
    <div class="row justify-content-center h-100">
        <div class="col-xl-6">
            <div class="card-body pt-5 card login-form mb-0 mt-5">
                <form action="" method="POST" class="mt-5 mb-5 login-input" enctype="multipart/form-data">
                
                <div class="content">
                        <h3>Pilih Metode Pembayaran</h3>
                
                    <div class="menu">
                        <ul>
                            <li><a class="klik_menu btn btn-success text-white" id="bayar">BAYAR LANGSUNG</a></li>
                            <li><a class="klik_menu btn btn-success text-white" id="transfer">TRANSFER BANK</a></li>
                        </ul>
                    </div>
                    
                </form>
                
                <div class="badan">
                <!-- isi dari class badan -->
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$('.klik_menu').click(function(){
			var menu = $(this).attr('id');
			if(menu == "bayar"){
				$('.badan').load('bayar.php');						
			}else if(menu == "transfer"){
				$('.badan').load('transfer.php');						
			}
		});				
	});
</script>
</html>





