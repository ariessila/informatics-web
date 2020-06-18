<?php 
// session_start();
if(isset($_REQUEST['model'])): // for secure single file
ob_start();
date_default_timezone_set('Asia/Jakarta');

// print_r($_REQUEST);


require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];


if($model=='halaman' AND $method=='tambah' ){
	
 	if(isset($_POST['tambah'])){
		
		$judul_id = $_POST['judul_id'];
		
		$judul_en = $_POST['judul_en'];

		$konten_en = $_POST['konten_en'];
		
		$konten_id = $_POST['konten_id'];
		
		$id = $_POST['id'];
		
		$nama_baru = '';
		
		$publish = $_POST['publish'];

		// $judul = filter_var($judul, FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 
		
 		$link_halaman_id = $libs->changeLink($judul_id);
		
 		$link_halaman_en = $libs->changeLink($judul_en);

		if(!empty($_FILES['file']['name'])){
		
			$nama_baru = $libs->uploadImage($_FILES['file']);	
			
		}

		$halaman->insertHalaman($judul_id,$judul_en,$konten_en,$konten_id,$link_halaman_id,$link_halaman_en,$nama_baru,$publish,$id); // method penyimpanan

		 header("location:".URL."halaman?act=add");
	}
 
 // return false;
 }
 
if($model=='halaman' AND $method=='file_tambah' ){
	
 	if(isset($_POST['submit'])){

		$id_halaman = $_POST['id'];
		
		$judul = $_POST['judul'];

		if(isset($_FILES['file'])){
		
			$nama_file = $libs->uploadPdf($_FILES['file']);	
			if($nama_file != '' or $nama_file != false){
				
				$halaman->insetFileHalaman($id_halaman,$judul,$nama_file); // method penyimpanan
				
				echo"<script> alert('Manambahkan File'); </script>";

			}else{
				echo"<script> alert('Tidak dapat menambah file, harap periksa file dan coba lagi'); </script>";
				
			}

		}
		
		echo"<script> window.history.back(); </script>";
	}
 
 }
 
if($model=='halaman' AND $method=='uraian_tambah' ){
	
 	if(isset($_POST['submit'])){
	
		$nama = $_POST['nama'];
		
		$id = $_POST['id'];

	
	
		$halaman->insertUraian($nama,$id); // method penyimpanan

		echo"<script> window.history.back(); </script>";
		
	}
 
 // return false;
 }

if ($model=='halaman' AND $method=='edit' ){
	
	if(isset($_POST['tambah'])){
		$judul_halaman_id = $_POST['judul_halaman_id'];
		
		$judul_halaman_en = $_POST['judul_halaman_en'];

		$konten_en = $_POST['konten_en'];
		
		$konten_id = $_POST['konten_id'];
		
		$id = $_POST['id'];
		
		$nama_baru = $_POST['gambar'];
		
		$publish = $_POST['publish'];

		// $judul = filter_var($judul, FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 
		
 		$link_halaman_id = $libs->changeLink($judul_halaman_id);
		
 		$link_halaman_en = $libs->changeLink($judul_halaman_en);
		
		if(!empty($_FILES['file']['name'])){
			
		 	$nama_baru = $libs->uploadImage($_FILES['file']);	
			
		}
		
		$halaman->updateHalaman($judul_halaman_id,$judul_halaman_en,$konten_en,$konten_id,$link_halaman_id,$link_halaman_en,$nama_baru,$publish,$id); // method penyimpanan
		
		// $halaman->updateHalaman($judul,$link,$isi,$nama_baru,$id); // method penyimpanan
		
		header("location:".URL."halaman?act=edit");
	}
}	

if($model=='halaman' AND $method=='uraian_hapus'){

	$id = $_GET['id'];
	
	$data = $halaman->deleteUraian($id);
	
	echo"<script> window.history.back(); </script>";

}

if($model=='halaman' AND $method=='hapus'){

	$id = $_GET['id'];
	
	$data = $halaman->getHalamanById($id);
	
	$libs->hapusGambarUpload($data['gambar_halaman']);
	
	$halaman->deleteHalaman($id);

	 echo"<script> alert('Menghapus data'); </script>";
	 
	 header("location:".URL."halaman?act=del");
}

if($model=='halaman' AND $method=='file_hapus'){

	$id = $_GET['id'];
	
	$data = $halaman->getFileById($id);
	
	$libs->deleteFile($data['nama_file']);
	
	$halaman->deleteFile($id);
	echo"<script> window.history.back(); </script>";


}

if($model=='halaman' AND $method=='hapus_gambar'){

	$id = $_GET['id'];
	
	$data = $halaman->getFileById($id);
	
	$libs->deleteFile($data['nama_file']);
	
	$halaman->hapusGambarHalamanById($id);
	
	 header("location:".URL."halaman/edit/".$id."");
	// echo"<script> window.history.back(); </script>";


}


 // header("location:".URL."halaman");
 
 endif;
?>