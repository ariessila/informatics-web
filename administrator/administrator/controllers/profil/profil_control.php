<?php 
session_start();
if(isset($_GET['model'])): // for secure
ob_start();
date_default_timezone_set('Asia/Jakarta');
require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

if($model=='profil' AND $method=='edit' ){
	
	if(isset($_POST['submit'])){
	
		$username = $_POST['username'];
		
		$nama_lengkap = $_POST['nama_lengkap'];
		
		$email = trim($_POST['email']);

		$users->editUser($username,$nama_lengkap,$email); // method penyimpanan
		
		header("location:".URL."profil?act=edit");

	}
}	
elseif($model=='profil' AND $method=='password' ){
	
	if($_POST['password1'] == $_POST['password2']){
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	
	$username = $_POST['username'];
	
	$password_asli = $password1;
	
	
	$pass 		=  md5(md5($password_asli).md5($password_asli));
	
	$password 	=  $pass;		
	
	#backup 
	 // $password =  password_hash($pass, PASSWORD_BCRYPT);		
	#backup
	 if($users->resetUser($username, $password)){
		 
		header("location:".URL."profil?act=edit");
	 
	 }else{
		 
		header("location:".URL."profil?act=failed");
	  
	 }
	
	
	
	}else{
		
	echo "<script> alert('Password tidak sama');window.history.back();</script>";
	
	}
}
else{
	
// header("location:".URL."profil");

}
 	
endif;
?>
