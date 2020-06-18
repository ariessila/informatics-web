<?php 

$url = isset($_GET['p']) ? $_GET['p'] : null;
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);      // memecah URL menjadi variabel GET P menjadi :
#config dasar
$model 		= ($url[0] != 'en')?$url[0]='id':$url[0]='en';	// untuk bahasa
$method 	= !empty($url[1])?$url[1]:'';					// untuk model yang digunakan
$parameter 	= !empty($url[2])?$url[2]:null;					// parameter untuk eksekusi
$metode = $method;

#nama folder aktif
$a = $_SERVER['SCRIPT_FILENAME'];
$root3 	= explode("www/",$a);
$rootpasca 	= explode("pasca/",$root3[1]);
$root2 	= explode("/",end($rootpasca));
$root	= $root2[0]; // halaman aktif
// var_dump($rootpasca);
 if(!empty($method)):

 
 if($method=='download' and !empty($method)){

	$direktori = "../files/";

	$filename = $parameter;

	if(file_exists($direktori.$filename)){
		$file_extension = strtolower(substr(strrchr($filename,"."),1));

		switch($file_extension){
		  case "pdf": $ctype="application/pdf"; 
		  break;
		  default: $ctype="application/pdf";
		}
	echo $direktori.$filename;
		if ($file_extension=='php'){
		  echo "<h1>Access forbidden!</h1>
				
				<p>Maaf, file yang Anda download sudah tidak tersedia atau filenya (direktorinya) telah diproteksi.  <br /></p>";
		  exit;
		}
		else{
		  

		  header("Content-Type: octet/stream");
		  header("Pragma: private"); 
		  header("Expires: 0");
		  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		  header("Cache-Control: private",false); 
		  header("Content-Type: $ctype");
		  header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
		  header("Content-Transfer-Encoding: binary");
		  header("Content-Length: ".filesize($direktori.$filename));
		  readfile("$direktori$filename");
		  exit();   
		}
	}else{
		  echo "<h1>Access forbidden!</h1>
				<p>Maaf, file yang Anda download sudah tidak tersedia atau filenya (direktorinya) telah diproteksi. <br />
				</p>";
		  exit;
	}

}else{

header("location:".ROOT."");
}

endif;
?>
