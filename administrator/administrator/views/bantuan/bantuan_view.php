<?php 
if(isset($model)):

date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/bantuan/bantuan_control.php?model=bantuan&method="; 

// var_dump($method);
switch($method){
default :

echo "
<div class='row'>
	<div class='col col-sm-9'>
		<div class='panel panel-primary' id='komentar'>
			<div class='panel-heading'><strong><span class='glyphicon glyphicon-pencil'></span>KOTAK KOMENTAR</strong></div>
				<div class='panel-body'>
					<div class='col-md-12'>
						<form action='".$aksi."tambah_post' method='post'>
						<textarea class='errot form-control' name='post' ></textarea>
						<div class='panel-footer pull-right'>
							<button type='submit' class='btn btn-primary' name='submit' value='1'>Kirim</a>
						</div>
						</form>
					</div>			
				</div>
			</div>
		</div>
	</div>
				
<h4><p><strong>DAFTAR TANGGAPAN</strong></p></h4><br>";



	#####
	$semua =  $bantuan->countBantuan();

	$per_page = 30; // jumlah query per 

	$i= 1;

	$pages = ceil($semua / $per_page); // melihat total blok yang ada
	
	$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
	
	$start = ($page-1)*$per_page; //startnya 
	
	$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging
	
	$post = $bantuan->getBantuan($start,$per_page); //menghitung 
	
	foreach($post as $post){
		
	echo "
	
	<div class='panel panel-primary col col-sm-9'>
	
	<div class='row'>
		<div class='col col-sm-12 '>
			<div class='row'>
					<div class='col-md-12' style='background-color:#f0f0f0;'>
						<br/>
						<div class='keterangan'>Oleh 
							<i class='glyphicon glyphicon-user icon'></i> <strong>".$post['penulis']."</strong> - pada <i class='glyphicon glyphicon-calendar icon'></i> <strong>".$libs->tgl_indo($post['tanggal'])."</strong>
						</div>
						<br>
						<p>".$post['konten']." 
						";
						
						
						$pukul = strtotime($post['jam']);
						
						 $pukul  = $post['jam'];
						
						 $expire  = date("Y-m-d H:i:s", time() + 120);
						
						// echo $pukul = strtotime($pukul);
						// echo " : ";
						// echo $expire = strtotime($expire);
						
						
						if(($post['penulis'] == $_SESSION['nama_lengkap'])){
							
							// echo "<a href ='###' onclick='return confirm(\"yakin menghapus data ini\");' ><button  class='close  btn-danger' type='button'>×</button></a>";
							
						}
						
						echo "
						</p>
					</div>";
					$detail = $bantuan->getBantuanReply($post['no_ticket']);
					foreach($detail as $detail){
						echo"
						<div class='col-md-11' style='margin-left:20px; margin-bottom:10px; margin-top:10px;'>
							<p> 
								<i class='glyphicon glyphicon-user icon'></i> <strong>".$detail['penulis']."</strong> 
								
								".$detail['konten']."
							
							</p>
							<div style='font-size:9pt;margin-top:-10px;'>
							- pada  <strong>".$libs->tgl_indo($detail['tanggal'])."</strong>	
							</div>
						</div>
						";
					}
					
					echo "
					<form action='".$aksi."tambah_reply' method='post'>	
					<div class='col-md-10' style='margin-left:20px;'>
						<input type='hidden' name='no_ticket' value='".$post['no_ticket']."'/>
						<textarea rows='1' name='konten' required class='errot form-control col-md-11' type='text' placeholder='Tambahkan Komentar' /></textarea>
					</div>
					<button type='submit' name='submit' value='1' class='btn btn-primary'>Kirim</button></a></p>
					</form>
				</div>	
			</div>
		</div>
	</div>
	
	";
		
		
	}
	
	
	echo "<div class='col-md-9' style=''><center><ul class='pagination pagination-small center m-t-none m-b-none'>";

			$req = empty($_REQUEST['view'])?'':$_REQUEST['view']; // mencari kata carinya
			
			$root = URL.'bantuan';//$_SERVER['PHP_SELF']; //."?view=".$req."&"; 
			
			$blok = 20;
			$ini  = ceil($page/$blok);
			
			$mulai   =  ($blok * $ini) - ($blok-1);
			$selesai =  ($blok<=$pages)?($ini * $blok):$pages ;
			
			$kurang1 = $page -1;
			$tambah1 = $page +1 ;
			
			if($pages >=1 && $page<=$pages){

				echo ($page!=1 or empty($page))?"<li style='cursor:pointer;' ><a  href='$root&hal=$kurang1'> Back </a> </li> ":'';
				for($x=$mulai; $x<=$selesai; $x++)
					if($x==$page){
						
						echo "<li style='cursor:pointer;' class='active'> <a >$x</a> </li> ";
						
					}
					else{ 
						echo "<li style='cursor:pointer;'  ><a href='$root?hal=$x'>$x</a></li> ";
					};
				
				echo ($page!=$pages)?"<li style='cursor:pointer;'  ><a href='$root?hal=$tambah1'> Next </a> </li> ":'';
									
				
			};
	echo "</ul> </center>
	</div>
	";	
		
		$req = empty($_REQUEST['view'])?'':$_REQUEST['view']; // mencari kata carinya
	
break;

}

?>

<?php endif;?>
