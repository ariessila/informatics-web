<?php 
session_start();
if(isset($_GET['model'])): // for secure
ob_start();
date_default_timezone_set('Asia/Jakarta');
require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

if($model=='pengumuman' AND $method=='tambah' ){
	
 	if(isset($_POST['tambah'])){
		$judul = $_POST['judul'];
		$judul = filter_var(strip_tags($judul), FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 
		$konten = $_POST['konten'];
		// $isi = $libs->stringHtml($isi); // belum butuh sanitasi
		$bahasa = $_POST['bahasa'];
		$link = $libs->changeLink($judul);
		$tanggal = date("Y-m-d");
		$gambar = '';
		if(!empty($_FILES['file']['name'])){

			$gambar = $libs->uploadImageToFolder('../../../images/content/news/',$_FILES['file']);	//upload
		 	
			$thumbnail = $libs->uploadImageToFolderThumbnail('../../../images/content/news/',$gambar);	//thumbnail
			
		}
		
			 $pengumuman->insertPengumuman($judul,$konten,$tanggal,$link,$gambar,$bahasa); // method penyimpanan
			 
			 header("location:".URL."pengumuman?act=add");
	}
 
 }
elseif($model=='pengumuman' AND $method=='edit' ){
	
	if(isset($_POST['submit'])){
		$judul = $_POST['judul'];
		$judul = filter_var($judul, FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 

		$id = $_POST['id'];

		$gambar = $_POST['gambar'];
		
		$konten = $_POST['konten'];
		
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
		
		$pengumuman->updatePengumuman($judul,$konten,$link,$gambar,$bahasa,$id); // method penyimpanan

		header("location:".URL."pengumuman?act=edit");

	}
}	
elseif($model=='pengumuman' AND $method=='hapus' ){

	$id = $_GET['id'];
	
	$data = $pengumuman->getPengumumanById($id);
	
	// $libs->hapusFile($data['gambar']);

	$libs-> hapusGambarSpesific("../../../images/content/news/", $data['gambar']);
	
	$libs-> hapusGambarSpesific("../../../images/content/news/thumbnails/", $data['gambar']);

	$pengumuman->deletePengumuman($id);

	echo"<script> alert('Menghapus data'); </script>";
	
	header("location:".URL."pengumuman?act=del");
}
elseif($model=='pengumuman' AND $method=='hapus_gambar' ){

	$id = $_GET['id'];
	
	$data = $pengumuman->getPengumumanById($id);
	
	// $libs->hapusFile($data['gambar']);

	$libs-> hapusGambarSpesific("../../../images/content/news/", $data['gambar']);
	
	$libs-> hapusGambarSpesific("../../../images/content/news/thumbnails/", $data['gambar']);

	$pengumuman->hapusGambarHalamanById($id);

	echo"<script> alert('Menghapus data'); </script>";
	
	header("location:".URL."pengumuman/edit/".$id."");
}
else{
	
	// header("location:".URL."pengumuman");

}
 	
endif;
	// header("location:".URL."pengumuman");
?>
