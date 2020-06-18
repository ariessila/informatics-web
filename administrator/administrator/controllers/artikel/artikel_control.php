<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(isset($_GET['model'])): // for secure
ob_start();
date_default_timezone_set('Asia/Jakarta');
require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

if($model=='artikel' AND $method=='tambah' ){
	
 	if(isset($_POST['tambah'])){
		$judul = $_POST['judul'];
		$judul = filter_var(strip_tags($judul), FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 
		$isi = $_POST['isi'];
		// $isi = $libs->stringHtml($isi); // belum butuh sanitasi
		$bahasa = $_POST['bahasa'];
		$link = $libs->changeLink($judul);
		$penulis = $_SESSION['nama_lengkap'];
		$publish = $_POST['publish'];
		$gambar = '';
		if(!empty($_FILES['file']['name'])){

			// $gambar = $libs->uploadImage($_FILES['file']);	// ke folder upload
			$gambar = $libs->uploadImageToFolder('../../../images/content/news/',$_FILES['file']);	//upload
		 	
			$thumbnail = $libs->uploadImageToFolderThumbnail('../../../images/content/news/',$gambar);	//thumbnail
			
		}

			 $artikel->insertArtikel($judul,$link,$isi,$gambar,$penulis,$bahasa); // method penyimpanan
			 
			 header("location:".URL."artikel?act=add");
	}
 
 }
elseif($model=='artikel' AND $method=='edit' ){
	
	if(isset($_POST['submit'])){
		$judul = $_POST['judul'];
		$judul = filter_var($judul, FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 

		$id = $_POST['id'];

		$gambar = $_POST['gambar'];
		
		$isi = $_POST['isi'];
		
		// $isi = filter_var($isi, FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 

		$bahasa = $_POST['bahasa'];
		
		$publish = $_POST['publish'];
		
		$penulis = $_SESSION['username'];
			
		$link = $libs->changeLink($judul);
		
		if(!empty($_FILES['file']['name'])){
			
			$libs-> hapusGambarSpesific("../../../images/content/news/", $_POST['gambar']);
			
			$libs-> hapusGambarSpesific("../../../images/content/news/thumbnails/", $_POST['gambar']);
			
			$gambar = $libs->uploadImageToFolder('../../../images/content/news/',$_FILES['file']);	//upload
		 	
			$thumbnail = $libs->uploadImageToFolderThumbnail('../../../images/content/news/',$gambar);	//thumbnail
			
		
		}
		
		$artikel->updateArtikel($judul,$link,$isi,$gambar,$penulis,$bahasa,$id,$publish); // method penyimpanan

		header("location:".URL."artikel?act=edit");

	}
}	
elseif($model=='artikel' AND $method=='hapus' ){

	$id = $_GET['id'];
	
	$data = $artikel->getArtikelById($id);
	
	// $libs->hapusFile($data['gambar']);

	$libs-> hapusGambarSpesific("../../../images/content/news/", $data['gambar']);
	
	$libs-> hapusGambarSpesific("../../../images/content/news/thumbnails/", $data['gambar']);

	$artikel->deleteArtikel($id);

	echo"<script> alert('Menghapus data'); </script>";
	
	header("location:".URL."artikel?act=del");
}
	
elseif($model=='artikel' AND $method=='hapus_gambar' ){

	$id = $_GET['id'];
	
	$data = $artikel->getArtikelById($id);
	// var_dump($data);
	// $libs->hapusFile($data['gambar']);

 	$libs-> hapusGambarSpesific("../../../images/content/news/", $data['gambar']);
	
	$libs-> hapusGambarSpesific("../../../images/content/news/thumbnails/", $data['gambar']);

	var_dump($artikel->hapusGambarArtikelById($id));
	echo 11;
	
	echo"<script> alert('Menghapus gambar'); </script>";
	
	header("location:".URL."artikel/edit/".$id."");
}



else{
	
	header("location:".URL."artikel");

}
 	
endif;
	// header("location:".URL."artikel");
?>
