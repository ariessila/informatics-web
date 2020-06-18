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

if($model=='pengabdian' AND $method=='tambah' ){
	

 	if(isset($_POST['simpan'])){
		
		$judul_pengabdian = $_POST['judul_pengabdian'];
		
		$ketua_pengabdian = $_POST['ketua_pengabdian'];
		
		$mahasiswa_ketua = $_POST['mahasiswa_ketua'];
		
		$mahasiswa_pengabdian_1 = $_POST['mahasiswa_pengabdian_1'];
	
		$sumber_dana = $_POST['sumber_dana'];
		
		$subdomain = $_POST['subdomain'];
		
		$anggota_pengabdian_1 = empty($_POST['anggota_pengabdian_1'])?null:$_POST['anggota_pengabdian_1'];
				
		$tahun_pengabdian = $_POST['tahun_pengabdian'];
		
		
		########
		
		#modul antar jurusan 
		
		$save = array($subdomain);  // memasukkan nama domain yang akan di eksekusi
		
		
		foreach($anggota_pengabdian_1 as $anggota_array){
			
			$exp = explode('|',$anggota_array); 		// mengexplode nama anggota dan domain	
			
			if(!empty($exp[1])){						// kalau null jangan disimpan
				
				array_push($save,$exp[1]);				// masukkan dalam array domain yang ada
				
			}
			
		}
		
		$hasil = array_unique($save);					// distinct array yang telah terkumpul
		
		
		########## jika penambahan oleh mahasiswa
		if(!empty($mahasiswa_ketua)){
			
			$ketua_pengabdian = $mahasiswa_ketua;
		
		}
		############
		
		####//eksekusi
		
		foreach($hasil as $hasil){ //eksekusi
			
			$db='db_'.$hasil; // memilih db
			
			$pengabdian->insertPengabdianDB($judul_pengabdian,$ketua_pengabdian,'','','','',$tahun_pengabdian,$sumber_dana,$db);
			
			$id_pengabdian = $pengabdian->lastInsertId(); // mendapat id pengabdian di insert terakhir
		
			$no = 0; 
			
			foreach($anggota_pengabdian_1 as $anggota){
				
				$member = explode('|',$anggota); 		// mengexplode nama anggota dan domain	
				
				if(!empty($member[0]) or !empty($mahasiswa_pengabdian_1[$no])){
					
					$nama_dosen= $member[0];
					
					
					########### form anggota mahasiswa
					if(!empty($mahasiswa_pengabdian_1[$no])){
						
						$nama_dosen = $mahasiswa_pengabdian_1[$no];
						
					}
					// ############			
					
					
					$pengabdian->insertAnggotaPengabdianDB($id_pengabdian,$nama_dosen,$db);
					
				}
				
				$no++;
			
			}
			
		}
		
		######
		
		
		 header("location:".URL."pengabdian?act=add");
	}
 
 }
 
else if($model=='pengabdian' AND $method=='edit' ){

	
 	if(isset($_POST['simpan'])){
	
		$judul_pengabdian = $_POST['judul_pengabdian'];
		
		$sumber_dana = $_POST['sumber_dana'];
		
		$ketua_pengabdian = $_POST['ketua_pengabdian'];
		
		$mahasiswa_ketua = $_POST['mahasiswa_ketua'];
		
		$anggota_pengabdian_1 = empty($_POST['anggota_pengabdian_1'])?null:$_POST['anggota_pengabdian_1']; // insert
		
		$mahasiswa_pengabdian_1 = empty($_POST['mahasiswa_pengabdian_1'])?null:$_POST['mahasiswa_pengabdian_1']; // update
		
		$anggota_pengabdian_2= empty($_POST['anggota_pengabdian_2'])?null:$_POST['anggota_pengabdian_2']; // update
		
		$mahasiswa_pengabdian_2= empty($_POST['mahasiswa_pengabdian_2'])?null:$_POST['mahasiswa_pengabdian_2']; // update

		$id_mahasiswa_pengabdian_2 = empty($_POST['id_mahasiswa_pengabdian_2'])?null:$_POST['id_mahasiswa_pengabdian_2']; // id
		
		$tahun_pengabdian = $_POST['tahun_pengabdian'];

	 	$id_pengabdian = $_POST['id_pengabdian'];
		
		########## jika penambahan oleh mahasiswa
		if(!empty($mahasiswa_ketua)){
			
			$ketua_pengabdian = $mahasiswa_ketua;
		
		}
		############
		
		$pengabdian->updatePengabdian($id_pengabdian,$judul_pengabdian,$ketua_pengabdian,'','','','',$tahun_pengabdian,$sumber_dana);

		$no_angg1 = 0;
			foreach($anggota_pengabdian_1 as $anggota){ // insert
				
				
					########## jika penambahan oleh mahasiswa
					if(!empty($mahasiswa_pengabdian_1[$no_angg1])){
						
						$anggota = $mahasiswa_pengabdian_1[$no_angg1];
					
					}
					############
				
				
					$pengabdian->insertAnggotaPengabdian($id_pengabdian,$anggota);
					
				$no_angg1++;
				}
				
		
			
		

		
			$no_angg2 = 0;
			foreach($anggota_pengabdian_2 as $anggota){//untuk update anggota
				
					// var_dump($id_mahasiswa_pengabdian_2[$no_angg2]);
				$exp = explode('|',$anggota);
				
					
					$anggota_dosen = $exp[0];

					$id=$exp[1];
					
					
					########## jika penambahan oleh mahasiswa
					if(!empty($mahasiswa_pengabdian_2[$no_angg2])){
						
						$anggota_dosen   = $mahasiswa_pengabdian_2[$no_angg2];
						
						$id	=	$id_mahasiswa_pengabdian_2[$no_angg2];
					}
					############
				
				
				
				$pengabdian->updateAnggotaPengabdian($id_pengabdian,$anggota_dosen,$id);
				
				
				
				$no_angg2++;
			}
		

		header("location:".URL."pengabdian?act=edit");
	}

 }
 
 
else if($model=='pengabdian' AND $method=='hapus'){

	// $id = filter_var($_GET['id'],FILTER_VALIDATE_INT);
	$id = $_GET['id'];
	
	$pengabdian->deletePengabdian($id);
	
	header("location:".URL."pengabdian?act=del");
}
 
else if($model=='pengabdian' AND $method=='hapus_anggota'){

	// $id = filter_var($_GET['id'],FILTER_VALIDATE_INT);
	$id = $_GET['id'];
	
	$pengabdian->deleteAnggotaPengabdian($id);
	
	header("location:".URL."pengabdian/edit/".$_GET['back']."");
	// echo "<script>window.history.back();</script>";
}

else{
	
 // header("location:".URL."pengabdian");
	
}
 
 endif;
?>