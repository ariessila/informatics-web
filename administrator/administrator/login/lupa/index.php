<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../libs/path.php');
require("../../models/class.php"); 

 if(isset($_POST['login'])){
	 

 $email = empty($_POST['email'])?'':htmlentities(strip_tags($_POST['email']),ENT_QUOTES,'utf-8');
	
 
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

	if($users->authUserbyEmail($email) == 1){
			$n  = uniqid();
			$n  = substr($n,0,4);
			$password_asli = $n.'@'.substr(uniqid('', true), -5);
			
			$pass =  md5(md5($password_asli).md5($password_asli));
			
			
			$password =  $pass;		
			// $password =  password_hash($pass, PASSWORD_BCRYPT);		
			
			$isi = $password_asli;
			
			$users->updatePasswordByEmail($email,$password);
			
			$libs->kirimEmail($email, $isi);
			
			header("location:?email=1");

	}else{
		header("location:?email=0");
		
	}
	
}else{
	
	header("location:?email=0");
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


</head>

<body>
	<div class='container' id='container'>
		<div class='col-md-4 col-md-offset-4'>
			<div class='panel panel-default' id='panel-default'>	
				<div class='panel-heading' id='panel-heading'><h3 class='panel-title text-center' id='panel-title'><strong>Lupa Password</strong></h3></div>
				<div class='panel-body'>
				<form role='form' action='' method='POST' id='login' onsubmit='return sub();'>
					<div class='form-group'>
						<center><label class='text-center'>Masukkan Email Anda</label></center>
						<input type='text' class='form-control' id='form-control' placeholder='Email' name='email'>
					</div>
					
					<button type='submit' class='btn btn-sm btn-primary center-block' name='login'>Reset Password</button>
					</form>
					<?php 
					if(isset($_GET['email'])){
					echo " <br/>";
						if($_GET['email']==false){
						echo '
						<div class="alert alert-danger text-center" id="alert-danger">
						
							<a class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove" id="glyphicon-remove"></span></a><strong>Email Salah! </strong>
						
						</div>';
						}else{
							
							echo '
							<div class="alert alert-success text-center" id="alert-success">
							
								<a class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove" id="glyphicon-remove"></span></a><strong>Permintaan reset password telah dikirim</strong> silakan periksa email anda dan <a href="../">kembali ke halaman login</a>
							
							</div>	
							
						';
						
						}
					}
					
					?>			
				</div>
			</div>
		</div>
	</div>
</body>
</html>