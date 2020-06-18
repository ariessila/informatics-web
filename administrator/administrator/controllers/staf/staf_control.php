<?php 
// session_start();
if(isset($_REQUEST['model'])): // for secure single file
ob_start();
date_default_timezone_set('Asia/Jakarta');

require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

if($model=='staf' AND $method=='tambah' ){
	
 	if(isset($_POST['simpan'])){
		
		$nip = $_POST['nip'];
		
		$nama_pengelola = $_POST['nama_pengelola'];
		
		$jabatan_pengelola = $_POST['jabatan_pengelola'];
		
		$foto_pengelola = '';
		
		if(!empty($_FILES['file']['name'])){
			
			$foto_pengelola = $libs->uploadImageToFolder('../../../images/content/organization/',$_FILES['file']);	//upload

		}

		$pengelola->insertPengelola($nip,$nama_pengelola,$jabatan_pengelola,$foto_pengelola); // method penyimpanan

		 header("location:".URL."staf?act=add");
	}
 
 }
 
else if($model=='staf' AND $method=='edit' ){

	
 	if(isset($_POST['simpan'])){
		
		$nip = $_POST['nip'];
		
		$nama_pengelola = $_POST['nama_pengelola'];
		
		$foto_pengelola = $_POST['gambar'];
			
		$jabatan_pengelola = $_POST['jabatan_pengelola'];
		
		if(!empty($_FILES['file']['name'])){
			
			$libs-> hapusGambarSpesific("../../../images/content/organization/", $foto_pengelola);
			
			$foto_pengelola = $libs->uploadImageToFolder('../../../images/content/organization/',$_FILES['file']);	//upload

		}

		$pengelola->updatePengelola($nip,$nama_pengelola,$jabatan_pengelola,$foto_pengelola); // method penyimpanan

		 header("location:".URL."staf?act=edit");
	}

 }
 
else if($model=='staf' AND $method=='file_tambah' ){
	
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
 
else if($model=='staf' AND $method=='hapus'){

	$id = $_GET['id'];
	$file = $_GET['file'];
	
	$pengelola->deletePengelola($id);
	
	
	if(file_exists("../../../images/content/organization/".$file)){
		$libs-> hapusGambarSpesific("../../../images/content/organization/", $file);
	}
	
	 
	header("location:".URL."staf?act=del");
}

else{
	
 header("location:".URL."staf");
	
}
 
 endif;
?>