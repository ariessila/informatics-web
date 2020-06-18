<?php 
// session_start();
if(isset($_REQUEST['model'])): // for secure single file
ob_start();
date_default_timezone_set('Asia/Jakarta');

require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];


if($model=='galeri' AND $method=='tambah' ){
	
 	if(isset($_POST['submit'])){
		
		$nama = $_POST['nama'];
		
		$nama = filter_var($nama, FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 
		
 		$link = $libs->changeLink($nama);

		
		$galeri->insertGaleri($nama,$link); // method penyimpanan

		echo"<script> alert('Menambah data'); </script>";
		
		 header("location:".URL."galeri");
	}
 
 }
 
if($model=='galeri' AND $method=='edit' ){
	
 	if(isset($_POST['submit'])){
		
		$nama = $_POST['nama'];
		
		$id = $_POST['id'];
		
		$nama = filter_var(trim($nama), FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 
	
 		$link = $libs->changeLink($nama);

		$galeri->updateGaleri($nama,$link,$id); // method penyimpanan

		echo"<script> alert('Mengubah data'); </script>";
		
		 header("location:".URL."galeri");
	}
 
 }
 
if($model=='galeri' AND $method=='file_tambah' ){
	
 	if(isset($_POST['submit'])){

	 	$id_galeri = $_POST['id'];
		
		$keterangan = $_POST['keterangan'];
		
		$link = $_POST['link'];

		if(!empty($_FILES['file']['name'])){
			
			$nama_file = $libs->uploadImageToFolder('../../../images/content/gallery/',$_FILES['file']);	//upload
		 	
			$thumbnail = $libs->uploadImageToFolderThumbnail('../../../images/content/gallery/',$nama_file);	//thumbnail
			
			if(!empty($nama_file) or $nama_file != false){
				
				$galeri->insetDetailGaleri($id_galeri,$keterangan,$nama_file,$link); // method penyimpanan
				
				 header("location:".URL."galeri?act=add");
			
				
			}else{
				
				echo"<script> alert('Gagal mengunggah file, harap ulangi sesuai format yang telah ditentukan'); </script>";
				
				echo"<script> window.history.back(); </script>";
				
			}
			

		}
	}
 
 }
 
if($model=='galeri' AND $method=='hapus'){

	$id = $_GET['id'];
		
	$galeri->deleteGaleri($id);

	 echo"<script> alert('Menghapus data'); </script>";
	 
	header("location:".URL."galeri?act=del");
	
}

if($model=='galeri' AND $method=='file_hapus'){

	$id = $_GET['id'];
	
	$data = $galeri->getGaleriDetilById($id);
	
	$libs-> hapusGambarSpesific("../../../images/content/gallery/", $data['nama_file']);
	$libs-> hapusGambarSpesific("../../../images/content/gallery/thumbnails/", $data['nama_file']);
	
	$galeri->deleteGaleriDetail($id);
	
	header("location:".URL."galeri?act=del");
	
}
 
 endif;
?>