<?php 
session_start();
if(isset($_GET['model'])): // for secure
ob_start();
date_default_timezone_set('Asia/Jakarta');
require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

if($model=='pengaturan' AND $method=='tambah' ){
	
 }
elseif($model=='pengaturan' AND $method=='edit' ){
	
	if(isset($_POST['submit'])){
	
		$id_nama_website = $_POST['id_nama_website'];

		$icon = $_POST['icon'];
		
		$nama_website = $_POST['nama_website'];
		
		$nama_website_en = $_POST['nama_website_en'];
		
		$footer = $_POST['footer'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];
		$fax = $_POST['fax'];
		$email = $_POST['email'];
		
		if(!empty($_FILES['file']['name'])){
			
			$libs-> hapusGambarSpesific("../../../images/header/", $_POST['icon']);
			
			$icon = $libs->uploadImageToFolder('../../../images/header/',$_FILES['file']);	//upload
		 	
		}
		
		$pengaturan->updatePengaturan($id_nama_website,$nama_website,$nama_website_en,$icon,$alamat,$telepon,$fax,$email,$footer); // method penyimpanan
		
		header("location:".URL."pengaturan?act=edit");

	}
}	
elseif($model=='pengaturan' AND $method=='hapus' ){

	header("location:".URL."pengaturan");
	
}
else{
	
header("location:".URL."pengaturan");

}
 	
endif;
?>
