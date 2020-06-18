<?php

class libs_model{


public function tgl_indo($tgl){
		//$tanggal = substr($tgl,8,2);
		$tanggal = date("j",strtotime($tgl));
		$bulan = $this->getBulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;		 
}	
	
public function generate_password($hash){
	
	$hasil = 1;
	return $hasil;
}


	
	public function kirimEmail($email, $isi){

		include("../../../PHPMailer/PHPMailerAutoload.php"); 
		include("../../../libs/path.php"); 
		
			
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				///*		
			//kirim email	
				$mail = new PHPMailer;
				$mail->isSMTP();
				$mail->SMTPDebug = 1;
				$mail->Debugoutput = 'html';
				$mail->Host = '74.125.200.108';
				$mail->Port = 587;
				$mail->SMTPSecure = 'tls';
				$mail->SMTPAuth = true;
				$mail->Timeout     =   60; // set the timeout (seconds)
				$mail->Username = "cmsunhas@gmail.com"; // username akun
				$mail->Password = "cmsunhas#123"; //password akun
				// syarat menggunakan smtp google:
				// 1. pastikan keamanan 2 langkah google telah mati(non aktif)
				// 2. pastikan konfigurasi 'akses untuk aplikasi tidak aman' diaktifkan
				 $mail->SMTPKeepAlive = true; 
				$mail->setFrom('cmsunhas@gmail.com', 'Akun Dosen CMS Website Program Studi Universitas Hasanuddin'); // oleh siapa
				$mail->addReplyTo($email, ''); //altermatif alamat
				$mail->addAddress($email, ''); // kesiapa mau dikirim

				$mail->Subject = "Akun CMS Website Universitas Hasanuddin"; // subyek ato judul
				$mail->Body = "Anda telah terdaftar di website prodi Universitas Hasanuddin <br/><br/>
								
								Silahkan melakukan login dengan membuka link berikut: ".ROOT."id/page/18/Dosen.html#login
								<br/>
								<br/>
								<br/>
								
								Username Anda adalah NIP Anda <br/>
								Password Anda adalah : ".$isi."<br/><br/>
								
								<br/>
								<br/>
								
								Anda dapat melakukan pengubahan data sesuai dengan profil Anda pada fitur CMS dosen yang telah disediakan serta menambahkan data publikasi, penelitian, dan pengabidan masyarakat yang telah dilakukan.<br/>
								<br/>
								Terima Kasih. <br/>
								<br/>
								Administrator
								"; //isi mail
								
				$mail->IsHTML(true);  
				$mail->send(); 
				}
			//	*/
			
			
	
				
	}

		public function notifBantuan($email,$isi,$penulis,$no_ticket,$tipe){

				include("../../../PHPMailer/PHPMailerAutoload.php"); 
				include("../../../libs/path.php"); 
				
					
				if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
						///*		
					//kirim email	
						$mail = new PHPMailer;
						$mail->isSMTP();
						$mail->SMTPDebug = 3;
						$mail->Debugoutput = 'html';
						$mail->Host = '74.125.200.108';
						// $mail->Host = 'smtp.gmail.com';
						$mail->Port = 587;
						$mail->SMTPSecure = 'tls';
						$mail->SMTPAuth = true;
						$mail->Timeout     =   60; // set the timeout (seconds)
						$mail->Username = "cmsunhas@gmail.com"; // username akun
						$mail->Password = "cmsunhas#123"; //password akun
						// syarat menggunakan smtp google:
						// 1. pastikan keamanan 2 langkah google telah mati(non aktif)
						// 2. pastikan konfigurasi 'akses untuk aplikasi tidak aman' diaktifkan
						$mail->SMTPKeepAlive = true; 
						$mail->setFrom('cmsunhas@gmail.com', 'Notifikasi Pesan masuk di Pusat Bantuan'); // oleh siapa
						$mail->addReplyTo($email, ''); //altermatif alamat
						$mail->addAddress($email, ''); // kesiapa mau dikirim
						$mail->addAddress('informatika.s1@eng.unhas.ac.id'); // pak amil

						switch ($tipe) {
							case 'new':
								$mail->Subject = "Pesan Masuk Terbaru di Pusat Bantuan"; // subyek ato judul
								$mail->Body = "Halo, Administrator! <br/><br/>
										
										Terdapat Pesan baru di pusat bantuan yang membutuhkan tanggapan anda secepatnya. Berikut isi pesan tersebut :
										<br/>
										<br/>
										<hr>
										
										Pengirim : ".$penulis." <br/>
										Isi pesan : ".$isi."<br/><br/>
										
										<br/>
										<hr>
										<i><small>Ini Merupakan Email Otomatis dari Website eng.unhas.ac.id.</small><i/>
										<br/>
										<br/>
										"; //isi mail
								break;

							case 'reply':
								$mail->Subject = "Pesan Balasan Terbaru di Pusat Bantuan"; // subyek ato judul
								$mail->Body = "Halo, Administrator! <br/><br/>
										
										Terdapat Pesan Balasan terbaru di pusat bantuan yang membutuhkan tanggapan anda secepatnya. Berikut isi pesan tersebut :
										<br/>
										<br/>
										<hr>
										
										No. Ticket	: ".$no_ticket."<br/>
										Pengirim 	: ".$penulis." <br/>
										Isi pesan 	: ".$isi."<br/>
										
										<br/>
										<hr>
										<i><small>Ini Merupakan Email Otomatis dari Website eng.unhas.ac.id.</small><i/>
										<br/>
										<br/>
										"; //isi mail
								break;
						}

										
						$mail->IsHTML(true);  
						$mail->send(); 
						}
					//	*/	
		}

public function notif(){
	if(isset($_GET['act'])){	
			if($_GET['act']=='add'){
				echo "
				
				<div class='alert alert-block alert-success fade in'>
				  <button data-dismiss='alert' class='close' type='button'>×</button>
				  <p>
					 Berhasil Menambahkan Data
				  </p>
				</div>";
				}
				
			if($_GET['act']=='edit'){	
				echo "<div class='alert alert-block alert-success fade in'>
				  <button data-dismiss='alert' class='close' type='button'>×</button>
				  <p>
					 Berhasil mengubah Data
				  </p>
				</div>";
			}
			if($_GET['act']=='del'){	
				echo "<div class='alert alert-block alert-success fade in'>
				  <button data-dismiss='alert' class='close' type='button'>×</button>
				  <p>
					 Berhasil Menghapus Data
				  </p>
				</div>";
			}
			if($_GET['act']=='failed'){
				echo "<div class='alert alert-block alert-danger fade in'>
				  <button data-dismiss='alert' class='close' type='button'>×</button>
				  <p>
					 Gagal Mengubah Data
				  </p>
				</div>
			";
		}
	}
}
			
public function getBulan($bln){
	switch ($bln){
		case 1: 
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
} 


public function anti_injection($data){
	$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter;
}

public function cek_login(){
@session_start();
	$timeout=$_SESSION['timeout'];
	if(time()<$timeout){
		$this->timer();
		return true;
	}else{
		unset($_SESSION['timeout']);
		return false;
	}
}

public function stringHtml($text){
	
    $save = trim(htmlentities($text, ENT_QUOTES));
    $save = str_replace('\\', '&#92;', $save);
    return $save;
}

public function changeLink($v){
	$v = strtolower($v);
	$v = htmlspecialchars(trim($v));
	$v = str_replace('&', 'dan', $v);
	
	
    $value = preg_replace('~[\\\\/:*?"<>|]~', '', $v); 
    $value = preg_replace("~[']~", "", $value);
    $value = str_replace("`", "", $value);
    $value = str_replace("'", "", $value);
    $value = str_replace('"', '', $value);
    $value = str_replace(" ", "-", $value);
	$value = $value.".html";
    return $value;
}

public function timer(){
	@session_start();
	
	$time = 10000;
	
	return $_SESSION['timeout'] = time()+$time;
}

public function unsavequery($text){
    $save = html_entity_decode($text, ENT_QUOTES);
    return $save;
}

public function uploadImage($file){
		
	//kode untuk upload ke folder gambar 
	$tmp_name = $file["tmp_name"];

	$ext = explode('.',$file['name']);
	
	$extension = (empty($ext[1]))?'':$ext[1];
	
	$namaberu = uniqid().'.'.$extension;
	
 	$name = '../../../upload/'.$namaberu;
	
	//fungsi cut dari temp file ke yang kita mau
	
	$size = ceil($file['size']/1024); // disini misalkan tidak ada file maka akan 0
	@$cek =  empty($file)?array():getimagesize($file['tmp_name']);
	// var_dump($cek);
	
	if(!empty($cek['mime']) and $size<=1026){ 
	
			if($extension == 'png' or $extension=='jpg' or $extension=='jpeg' or $extension=='JPEG' or $extension=='JPG' or $extension=='PNG'){
				
				if(move_uploaded_file($tmp_name, $name)){
				
					return $namaberu;
				
				}else{
					
					return '';
				
				}; //fungsi untuk memindahkan gambar 
			
			}else{
			
				return '';
			}
		}
		else{
			
			return false;
			
		}
	}
	
public function uploadPdf($file){
		
	//kode untuk upload ke folder gambar 
	$tmp_name = $file["tmp_name"];

	$ext = explode('.',$file['name']);
	
	$extension = (empty($ext[1]))?'':$ext[1];
	
	$namaberu = uniqid().'.'.$extension;
	
 	$name = '../../../files/'.$namaberu;
	
	//fungsi cut dari temp file ke yang kita mau
	
	$size = ceil($file['size']/1024); // disini misalkan tidak ada file maka akan 0
	// var_dump($cek);
	
	if($size<=5326){ 
	
			if($extension == 'pdf'){
				
				if(move_uploaded_file($tmp_name, $name)){
				
					return $namaberu;
				
				}else{
					
					return '';
				
				}; //fungsi untuk memindahkan gambar 
			
			}else{
			
				return '';
			}
		}
		else{
			
			return false;
			
		}
	}
	
public function uploadImageToFolder($folder,$file){
		
	//kode untuk upload ke folder gambar 
	$tmp_name = $file["tmp_name"];

	$ext = explode('.',$file['name']);
	
	$extension = (empty($ext[1]))?'':$ext[1];
	
	$namaberu = uniqid().'.'.$extension;
	
 	$name = $folder.$namaberu;
	
	//fungsi cut dari temp file ke yang kita mau
	
	$size = ceil($file['size']/1024); // disini misalkan tidak ada file maka akan 0
	@$cek =  empty($file)?array():getimagesize($file['tmp_name']);
	// var_dump($cek);
	
	if(!empty($cek['mime']) and $size<=1026){ 
	
			if($extension == 'png' or $extension=='jpg' or $extension=='jpeg' or $extension=='JPEG' or $extension=='JPG' or $extension=='PNG'){
				
				if(move_uploaded_file($tmp_name, $name)){
				
					return $namaberu;
				
				}else{
					
					return '';
				
				}; //fungsi untuk memindahkan gambar 
			
			}else{
			
				return '';
			}
		}
		else{
			
			return false;
			
		}
	}
	
public function uploadImageToFolderThumbnail($folder,$filename){
	
	$tujuan = $folder.'thumbnails';
	
	$final_width_of_image = 380;
	$path_to_image_directory = $folder;
	$path_to_thumbs_directory = $folder.'thumbnails/';
    
	if(preg_match('/[.](jpg)$/', $filename) or preg_match('/[.](JPG)$/', $filename) or preg_match('/[.](JPEG)$/', $filename) or preg_match('/[.](jpeg)$/', $filename)) {
        $im = imagecreatefromjpeg($path_to_image_directory . $filename);
    } else if (preg_match('/[.](gif)$/', $filename)) {
        $im = imagecreatefromgif($path_to_image_directory . $filename);
    } else if (preg_match('/[.](png)$/', $filename) or preg_match('/[.](PNG)$/', $filename)) {
        $im = imagecreatefrompng($path_to_image_directory . $filename);
    }
     
    $ox = imagesx($im);
    $oy = imagesy($im);
     
    $nx = $final_width_of_image;
    $ny = floor($oy * ($final_width_of_image / $ox));
     
    $nm = imagecreatetruecolor($nx, $ny);
     
    imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
     
    if(!file_exists($path_to_thumbs_directory)) {
      if(!mkdir($path_to_thumbs_directory)) {
           die("Folder tidak tersedia");
      } 
       }
 
    imagejpeg($nm, $path_to_thumbs_directory . $filename);
	
	
	imagedestroy($im);
    imagedestroy($nm);
	
	
}

public function hapusGambarUpload($data){
		if (file_exists("../../../upload/$data")) {
			unlink("../../../upload/$data");
		}
	
	}
	
public function hapusGambarSpesific($url,$data){
		$hapus = $url.$data;
		
		if (file_exists("$hapus")) {
			unlink("$hapus");
			
			return true;
		}else{
			return false;
		}
	
	}
	
public function deleteFile($data){
		if (file_exists("../../../files/$data")) {
			unlink("../../../files/$data");
		}
	
	}
public function hapusFile($data){
		if (file_exists("../../../files/$data")) {
			unlink("../../../files/$data");
		}
	
	}

	
}



?>
