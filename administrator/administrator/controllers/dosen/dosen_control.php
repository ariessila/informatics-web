<?php 
// session_start();
if(isset($_REQUEST['model'])): // for secure single file
ob_start();
date_default_timezone_set('Asia/Jakarta');

require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

if($model=='dosen' AND $method=='tambah' ){
	
 	if(isset($_POST['simpan'])){
		
		$nip = trim($_POST['nip']);
		
		$subdomain = $_POST['subdomain'];
		
		$nama_dosen = $_POST['nama_dosen'];
		
		$gelar_depan = $_POST['gelar_depan'];
		
		$gelar_belakang  = $_POST['gelar_belakang'];
		
		$jabatan_dosen = $_POST['jabatan_dosen'];
		
		$email_dosen = trim($_POST['email_dosen']);
		
		$bidang_penelitian = $_POST['bidang_penelitian'];
		
	 	$password_asli = $nip.'@'.substr(uniqid('', true), -5);
		
		$pass =  md5(md5($password_asli).md5($password_asli));
		
		#backup
		// $password =  password_hash($pass, PASSWORD_BCRYPT);		
		$password =  $pass;		
		
		$foto_dosen = '';
		
		if(!empty($_FILES['file']['name'])){
			
			$foto_dosen = $libs->uploadImageToFolder('../../../images/content/organization/',$_FILES['file']);	//upload

		}

		if($dosen->insertDosen($nip,$password,$nama_dosen,$jabatan_dosen,$email_dosen,$bidang_penelitian,$foto_dosen,$gelar_depan,$gelar_belakang,$subdomain))
		{
			 
			$libs->kirimEmail($email_dosen, $password_asli);
		
		}
		
		 header("location:".URL."dosen?act=add");
	}
 
 }
 
else if($model=='dosen' AND $method=='edit' ){

	
 	if(isset($_POST['simpan'])){
		
		$nip = $_POST['nip'];
		
		$foto_dosen = $_POST['foto_dosen'];
			
		$gelar_depan = $_POST['gelar_depan'];
		
		$gelar_belakang  = $_POST['gelar_belakang'];
		
		$nama_dosen = $_POST['nama_dosen'];
		
		$jabatan_dosen = $_POST['jabatan_dosen'];
		
		$email_dosen = trim($_POST['email_dosen']);
		
		$bidang_penelitian = $_POST['bidang_penelitian'];
		
		
	 	if(!empty($_FILES['file']['name'])){
			
			$libs-> hapusGambarSpesific("../../../images/content/organization/", $foto_dosen);
			
			$foto_dosen = $libs->uploadImageToFolder('../../../images/content/organization/',$_FILES['file']);	//upload

		}

		$dosen->updateDosen($nip,$nama_dosen,$jabatan_dosen,$email_dosen,$bidang_penelitian,$foto_dosen,$gelar_depan,$gelar_belakang); // method penyimpanan

		 header("location:".URL."dosen?act=edit");
	}

 }
 
else if($model=='dosen' AND $method=='file_tambah' ){
	
 	if(isset($_POST['submit'])){

	 	$id_galeri = $_POST['id'];
		
		$keterangan = $_POST['keterangan'];

		if(!empty($_FILES['file']['name'])){
			
			$nama_file = $libs->uploadImageToFolder('../../../images/content/organization/',$_FILES['file']);	//upload
		 	
			$thumbnail = $libs->uploadImageToFolderThumbnail('../../../images/content/gallery/',$nama_file);	//thumbnail
			
			if(!empty($nama_file) or $nama_file != false){
				
				$galeri->insetDetailGaleri($id_galeri,$keterangan,$nama_file); // method penyimpanan
				
				header("location:".URL."galeri/detail/".$id_galeri."?act=add");
				
			}else{
				
				echo"<script> alert('Gagal mengunggah file, harap ulangi sesuai format yang telah ditentukan'); </script>";
				
			}
			

		}
		// echo"<script> window.history.back(); </script>";
	}
 
 }
 
else if($model=='dosen' AND $method=='hapus'){

	$id = $_GET['id'];
	$file = $_GET['file'];
	
	$dosen->deleteDosen($id);
	
	
	if(file_exists("../../../images/content/organization/".$file)){
		$libs-> hapusGambarSpesific("../../../images/content/organization/", $file);
	}
	
	 
	header("location:".URL."dosen?act=del");
}

else if($model=='dosen' AND $method=='hapus_gambar'){

	$id = $_GET['id'];
	$file = $_GET['file'];
	
	$dosen->hapusGambarDosenByNip($id);
	
	
	if(file_exists("../../../images/content/organization/".$file)){
		$libs-> hapusGambarSpesific("../../../images/content/organization/", $file);
	}
	
	 
	header("location:".URL."dosen/edit/".$id."");
}

else if($model=='dosen' AND $method=='reset'){
	
	$id = $_REQUEST['id'];
	
	$valid = $dosen->getDosenById($id);
	
	if(!empty($valid)){
	$password_asli = $id.'@'.substr(uniqid('', true), -5);
		
	$pass =  md5(md5($password_asli).md5($password_asli));
	 
	 #backup
	$password =  $pass;		
	// $password =  password_hash($pass, PASSWORD_BCRYPT);		
		
	 if($dosen->resetDosen($id, $password))
		{
			
			$libs->kirimEmail($valid['email_dosen'], $password_asli);
			
			header("location:".URL."akun_dosen?pass=".$password_asli."");
		
		}else{
			
			header("location:".URL."akun_dosen?act=failed");
			
		}
	
	}else{
		
			header("location:".URL."akun_dosen?act=failed");
		
	}
	
}

else{
	
 header("location:".URL."dosen");
	
}
 else:
 header("location:".URL."dosen");
 
 endif;
?>