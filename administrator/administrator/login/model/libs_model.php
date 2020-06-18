<?php

class libs_model{

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
	$v = trim($v, " ");
    $value = preg_replace('`~[\\\\/:*?"<>|]~', '', $v); 
    $value = preg_replace("~[']~", "", $value);
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
	
	$final_width_of_image = 270;
	$path_to_image_directory = $folder;
	$path_to_thumbs_directory = $folder.'thumbnails/';
    
	if(preg_match('/[.](jpg)$/', $filename)) {
        $im = imagecreatefromjpeg($path_to_image_directory . $filename);
    } else if (preg_match('/[.](gif)$/', $filename)) {
        $im = imagecreatefromgif($path_to_image_directory . $filename);
    } else if (preg_match('/[.](png)$/', $filename)) {
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