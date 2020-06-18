<?php 
@session_start();
if(isset($_POST['valdata'])){
	
			include  '../model/class.php';
			include("../administrator/libs/path.php");
			
			$judul = filter_var((htmlentities(strip_tags(trim($_POST['judul'])),ENT_QUOTES)), FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 
			$captcha = filter_var((htmlentities(strip_tags(trim($_POST['captcha'])),ENT_QUOTES)), FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 
			$konten =filter_var((htmlentities(strip_tags(trim($_POST['komentar'])),ENT_QUOTES)), FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 
			$email = filter_var((htmlentities(strip_tags(trim($_POST['email'])),ENT_QUOTES)), FILTER_SANITIZE_MAGIC_QUOTES); // sanitasi 
			$validcode = filter_var($_POST['valdata'],FILTER_VALIDATE_INT);
			// var_dump($_POST);
			$ip = $_SERVER['REMOTE_ADDR'];
			
			 $cek = $komentar->countKomentarById($ip,$validcode);
				$sesi_captcha = $_SESSION['captcha']['code'];
				
				
				
				if($cek<=2){ // defaultnya 0
					if($captcha == $sesi_captcha){	
						if(!empty($judul) or !empty($email) or !empty($konten)){
							
							$komentar->insertKomentar($validcode,$judul,$email,$konten,$ip); // method penyimpanan
							
						}
						else{
						echo "<script> alert('pastikan semua field terisi');  window.history.back();</script>";
							
						}
						
					}else{
						echo "<script> alert('masukkan kode dengan benar');  window.history.back();</script>";

					}
					
					
					// echo "	<script>
						 // window.history.back();
					// </script>";
					$back = $artikel->getArtikelById($validcode, 'id');		
							
					 header("location:".ROOT."id/news/".$validcode."-".$back['link']."");
							
				}else{
					
					echo "<script> alert('anda sudah tidak bisa mengirim komentar anda hari ini'); </script>";
					
					header("location:../");
						
				}
			
			return true;
			
			// header("location:../");
			 
		}else{
			header("location:../");
		}
?>