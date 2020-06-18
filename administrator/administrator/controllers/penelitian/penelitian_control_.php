<?php 
// session_start();
if(isset($_REQUEST['model'])): // for secure single file
ob_start();
date_default_timezone_set('Asia/Jakarta');

// error_reporting(E_ALL);
     // ini_set('display_errors', 1);


require '../../libs/path.php'; 
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

if($model=='penelitian' AND $method=='tambah' ){
	

 	if(isset($_POST['simpan'])){
	
		$judul_penelitian = $_POST['judul_penelitian'];
		
		$mahasiswa_ketua = $_POST['mahasiswa_ketua']; 
		
		$sumber_dana = $_POST['sumber_dana'];
		
	 	$ketua_penelitian = $_POST['ketua_penelitian'];
	 
		$subdomain = $_POST['subdomain'];
	 	 
		$anggota_penelitian_1 = empty($_POST['anggota_penelitian_1'])?null:$_POST['anggota_penelitian_1'];
		
		$mahasiswa_penelitian_1 = empty($_POST['mahasiswa_penelitian_1'])?null:$_POST['mahasiswa_penelitian_1'];
		
		$tahun_penelitian = $_POST['tahun_penelitian'];
		
		
		#modul antar jurusan 
		
		$save = array($subdomain);  // memasukkan nama domain yang akan di eksekusi
		
		
		foreach($anggota_penelitian_1 as $anggota_array){
			$exp = explode('|',$anggota_array); 		// mengexplode nama anggota dan domain	
			if(!empty($exp[1])){						// kalau null jangan disimpan
				
				array_push($save,$exp[1]);				 // masukkan dalam array domain yang ada
				
			}
			
		}
		
		$hasil = array_unique($save);					// distinct array yang telah terkumpul
		
		
		
		########## jika penambahan oleh mahasiswa
		if(!empty($mahasiswa_ketua)){
			
			$ketua_penelitian = $mahasiswa_ketua;
		
		}
		############
		
		
		####//eksekusi
		
		foreach($hasil as $hasil){ //eksekusi
			
			$db='db_'.$hasil; // memilih db
			
			$penelitian->insertPenelitianDB($judul_penelitian,$ketua_penelitian,'','','','',$tahun_penelitian,$sumber_dana,$db);
			
			$id_penelitian = $penelitian->lastInsertId();

			$no =0;
			
			foreach($anggota_penelitian_1 as $anggota ){
				
				$member = explode('|',$anggota); 		// mengexplode nama anggota dan domain	
				
				if(!empty($member[0]) or !empty($mahasiswa_penelitian_1[$no])){
					
					$nama_dosen= $member[0];
					
					
					
					########### form anggota mahasiswa
					if(!empty($mahasiswa_penelitian_1[$no])){
						
						$nama_dosen = $mahasiswa_penelitian_1[$no];
						
					}
					// ############			
					
					
					
					$penelitian->insertAnggotaPenelitianDB($id_penelitian,$nama_dosen,$db);
					
				}
				$no++;
			}
			
		}
		
		
		########
		
		 header("location:".URL."penelitian?act=add");
		
		
	}
 
 }
 
else if($model=='penelitian' AND $method=='edit' ){

	###
	###kelemahan sistem adalah modul antar jurusan hanya menambahkan ke database yang lain tidak dapat edit dan menghapus karena beda nomor id, kecuali mengambil resiko, misalkan ganti id menjadi nama ketua ato yang lain. namun resiko nya adalah sistem menjadi lambat
	###
 	if(isset($_POST['simpan'])){
	
		$judul_penelitian = $_POST['judul_penelitian'];
		$sumber_dana = $_POST['sumber_dana'];
		
		$ketua_penelitian = $_POST['ketua_penelitian'];		
		
		$mahasiswa_ketua = $_POST['mahasiswa_ketua'];		

		$anggota_penelitian_1 = empty($_POST['anggota_penelitian_1'])?null:$_POST['anggota_penelitian_1']; // insert
		
		$mahasiswa_penelitian_1 = empty($_POST['mahasiswa_penelitian_1'])?null:$_POST['mahasiswa_penelitian_1']; // insert
		
		$anggota_penelitian_2= empty($_POST['anggota_penelitian_2'])?null:$_POST['anggota_penelitian_2']; // update
		
		$mahasiswa_penelitian_2 = empty($_POST['mahasiswa_penelitian_2'])?null:$_POST['mahasiswa_penelitian_2']; // update
		
		$id_mahasiswa_penelitian_2 = empty($_POST['id_mahasiswa_penelitian_2'])?null:$_POST['id_mahasiswa_penelitian_2']; // update
		
		$tahun_penelitian = $_POST['tahun_penelitian'];
		
	 	$id_penelitian = $_POST['id_penelitian'];
	 	
		$subdomain = $_POST['subdomain'];
		
		#modul antar jurusan 
		
		$save = array($subdomain);  // memasukkan nama domain yang akan di eksekusi
		
		foreach($anggota_penelitian_1 as $anggota_array){
			$exp = explode('|',$anggota_array); 		// mengexplode nama anggota dan domain	
			if(!empty($exp[1])){						// kalau null jangan disimpan
				
				array_push($save,$exp[1]);				 // masukkan dalam array domain yang ada
				
			}
			
		}
		
		$hasil = array_unique($save);					// distinct array yang telah terkumpul
		
		####//eksekusi
		foreach($hasil as $hasil){ //eksekusi
		
			$db='db_'.$hasil; // memilih db
	
		########## jika penambahan oleh mahasiswa

			if(!empty($mahasiswa_ketua)){
				
				$ketua_penelitian = $mahasiswa_ketua;
			
			}
			############
			
			
			$penelitian->updatePenelitianDB($id_penelitian,$judul_penelitian,$ketua_penelitian,'','','','',$tahun_penelitian,$sumber_dana,$db);
			
					
				$no_anggota1 =0;
				
				foreach($anggota_penelitian_1 as $anggota){
					
						########### form anggota mahasiswa
						if(!empty($mahasiswa_penelitian_1[$no_anggota1])){
							
							$anggota = $mahasiswa_penelitian_1[$no_anggota1];
							
						}
						// ############			
						
						$penelitian->insertAnggotaPenelitianDB($id_penelitian,$anggota,$db);
				
				$no_anggota1++;		
				
				}
				
				
				$no_anggota2 =0;
			
				
				foreach($anggota_penelitian_2 as $anggota){ //untuk update anggota
					
					$exp = explode('|',$anggota);
						
						$anggota_dosen = $exp[0];

						$id=$exp[1];
						
						########## jika penambahan oleh mahasiswa
						if(!empty($mahasiswa_penelitian_2[$no_anggota2])){
							
							$anggota_dosen   = $mahasiswa_penelitian_2[$no_anggota2];
							
							$id	=	$id_mahasiswa_penelitian_2[$no_anggota2];
						}
						############
						
						$penelitian->updateAnggotaPenelitian($id_penelitian,$anggota_dosen,$id,$db);
						
				$no_anggota2++;
				}
					
		}

		 header("location:".URL."penelitian?act=edit");
	
	}

 }
 
 
else if($model=='penelitian' AND $method=='hapus'){

	// $id = filter_var($_GET['id'],FILTER_VALIDATE_INT);
	$id = $_GET['id'];
	$file = $_GET['file'];
	
	$penelitian->deletePenelitian($id);
	
	header("location:".URL."penelitian?act=del");
}

else if($model=='penelitian' AND $method=='hapus_anggota'){

	// $id = filter_var($_GET['id'],FILTER_VALIDATE_INT);
	$id = $_GET['id'];
	$file = $_GET['file'];
	
	$penelitian->deleteAnggotaPenelitian($id);
	
	header("location:".URL."penelitian/edit/".$_GET['back']."");
	// echo "<script>window.history.back();</script>";
}

else{
	
 // header("location:".URL."penelitian");
	
}
 
 endif;
?>