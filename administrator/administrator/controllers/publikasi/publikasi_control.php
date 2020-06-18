<?php 
// session_start();

 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 

if($_REQUEST['model']): // for secure single file
ob_start();
date_default_timezone_set('Asia/Jakarta');

require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

if($model=='publikasi' AND $method=='tambah' ){
	
 	if(isset($_POST['simpan'])){
		
		$judul = $_POST['judul'];
		
		$deskripsi = $_POST['deskripsi'];
				
		$oleh = $_POST['oleh'];
		
		$mahasiswa_ketua = $_POST['mahasiswa_ketua'];
		
		$link = $_POST['link'];
		
		$anggota_publikasi_1 = empty($_POST['anggota_publikasi_1'])?null:$_POST['anggota_publikasi_1'];
		
		$mahasiswa_publikasi_1 = empty($_POST['mahasiswa_publikasi_1'])?null:$_POST['mahasiswa_publikasi_1'];
		
		$tahun = $_POST['tahun'];
	
		$subdomain = $_POST['subdomain'];
		
		$nip = '';
		// $nip = $_POST['nip'];
		
		$nama_file = $libs->uploadPdf($_FILES['file']);	
		
		########## jika penambahan oleh mahasiswa
		if(!empty($mahasiswa_ketua)){
			
			$oleh = $mahasiswa_ketua;
		
		}
		############
		
		##############
		#modul antar jurusan 
		
		$save = array($subdomain);  // memasukkan nama domain yang akan di eksekusi
		
		foreach($anggota_publikasi_1 as $anggota_array){
			$exp = explode('|',$anggota_array); 		// mengexplode nama anggota dan domain	
			if(!empty($exp[1])){						// kalau null jangan disimpan
				
				array_push($save,$exp[1]);				 // masukkan dalam array domain yang ada
				
			}
			
		}
		
		$hasil = array_unique($save);					// distinct array yang telah terkumpul
		// var_dump($hasil);
		
		####//eksekusi
		
		foreach($hasil as $hasil){ //eksekusi
			
			$db='db_'.$hasil; // memilih db
			
			$publikasi->insertPublikasiDB($judul,$deskripsi,$nama_file,$oleh,$tahun,$nip,$link,$db);
			
			$id_publikasi = $publikasi->lastInsertId(); // mendapat id publikasi di insert terakhir
			
			$no = 0;
			
			foreach($anggota_publikasi_1 as $anggota){
				
				$member = explode('|',$anggota); 		// mengexplode nama anggota dan domain	
				
				if(!empty($member[0]) or !empty($mahasiswa_publikasi_1[$no])){
					
					$nama_dosen= $member[0];
					 
					########### form anggota mahasiswa
					if(!empty($mahasiswa_publikasi_1[$no])){
						
						$nama_dosen = $mahasiswa_publikasi_1[$no];
						
					}
					// ############		
					
				$publikasi->insertAnggotaPublikasiDB($id_publikasi,$nama_dosen,$db);
					
				}
				$no++;
			}
			
		}
		
		######
		################
		

		header("location:".URL."publikasi?act=add");

		}else{
			header("location:".URL."publikasi?act=failed");
			
		}
		
		
	}
 
 
 
else if($model=='publikasi' AND $method=='edit' ){

	
 	if(isset($_POST['simpan'])){
	
		$judul = $_POST['judul'];
		
		$deskripsi = $_POST['deskripsi'];
				
		$oleh = $_POST['oleh'];
		
		$mahasiswa_ketua = $_POST['mahasiswa_ketua'];
		
		$anggota_publikasi_1 = empty($_POST['anggota_publikasi_1'])?null:$_POST['anggota_publikasi_1']; // insert
		
		$mahasiswa_publikasi_1 = empty($_POST['mahasiswa_publikasi_1'])?null:$_POST['mahasiswa_publikasi_1']; // insert
		
		$anggota_publikasi_2= empty($_POST['anggota_publikasi_2'])?null:$_POST['anggota_publikasi_2']; // update
		
		$mahasiswa_publikasi_2= empty($_POST['mahasiswa_publikasi_2'])?null:$_POST['mahasiswa_publikasi_2']; // update
		
		$id_mahasiswa_publikasi_2= empty($_POST['id_mahasiswa_publikasi_2'])?null:$_POST['id_mahasiswa_publikasi_2']; // update
		
		$nama_file = $_POST['gambar'];
		
		$tahun = $_POST['tahun'];
		
		$link = $_POST['link'];
		
		$nip = '';
		
		$id = $_POST['id'];
	
	
		########## jika penambahan oleh mahasiswa
		if(!empty($mahasiswa_ketua)){
			
			$oleh = $mahasiswa_ketua;
		
		}
		############
	
	
	if(!empty($_FILES['file']['name'])){
		
		$libs->deleteFile($nama_file);
		
		$nama_file = $libs->uploadPdf($_FILES['file']);	
			
	}
		$publikasi->updatePublikasi($judul,$deskripsi,$nama_file,$oleh,$tahun,$nip,$id,$link);
		
		$no_anggota1 = 0;
		
		foreach($anggota_publikasi_1 as $anggota){//untuk insert anggota
		
				########### form anggota mahasiswa
				if(!empty($mahasiswa_publikasi_1[$no_anggota1])){
					
					$anggota = $mahasiswa_publikasi_1[$no_anggota1];
					
				
				// ############			
				
				}
				$publikasi->insertAnggotaPublikasi($id,$anggota);
		
		$no_anggota1++;
		
		}
		
		$no_anggota2 =0;
		foreach($anggota_publikasi_2 as $anggota){
		if(!empty($anggota)){
			
			$exp = explode('|',$anggota);
				
				$anggota_dosen = $exp[0];
				
				$nama_dsn=$exp[1];
				var_dump($exp);
		}
				########## jika penambahan oleh mahasiswa
				if(!empty($mahasiswa_publikasi_2[$no_anggota2])){
					
					$anggota_dosen   = $mahasiswa_publikasi_2[$no_anggota2];
					
					$nama_dsn	=	$id_mahasiswa_publikasi_2[$no_anggota2];
				}
				############

				$publikasi->updateAnggotaPublikasi($id,$anggota_dosen,$nama_dsn);
				
			
			
		$no_anggota2++;	
		}
		
		
		 header("location:".URL."publikasi?act=edit");
	}

 }
 
 
else if($model=='publikasi' AND $method=='hapus'){

	$id = filter_var($_GET['id'],FILTER_VALIDATE_INT);
	
	$file = $_GET['file'];

	$libs->deleteFile($nama_file);
	
	$publikasi->deletePublikasi($id);
	
	header("location:".URL."publikasi?act=del");
}

 
else if($model=='publikasi' AND $method=='hapus_file'){

	$id = $_GET['id'];
	$file = $_GET['file'];
	
	$publikasi->deleteFileById($id);
	
	$libs->deleteFile($file);
	
		header("location:".URL."publikasi/edit/".$_GET['id']."");

}


else if($model=='publikasi' AND $method=='hapus_anggota'){

	// $id = filter_var($_GET['id'],FILTER_VALIDATE_INT);
	$id = $_GET['id'];
	
	$publikasi->deleteAnggotaPublikasi($id);
	
	header("location:".URL."publikasi/edit/".$_GET['back']."");
	// echo "<script>window.history.back();</script>";
}


else{
	
 // header("location:".URL."publikasi");
	
}
 
 endif;
?>