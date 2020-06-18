<?php 
if(isset($model)):

date_default_timezone_set('Asia/Jakarta');
$aksi = URL."controllers/komentar/komentar_control.php?model=komentar&method="; 


// var_dump($method);
switch($method){
default :

		$semua =  $komentar->countKomentar();
		$per_page = 30; // jumlah query per 
	
		$i= 1;
	
		$pages = ceil($semua / $per_page); // melihat total blok yang ada
		
		$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
		
		$start = ($page-1)*$per_page; //startnya 
		
		$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging
		
		$kerja = $komentar->getKomentar($start,$per_page); //menghitung 
		
		
		if($pages==0){echo "Data tidak ditemukan"; }


	
	
		
	echo "
	<br/>
	<div class='panel panel-default'>
			<div class='panel-heading text-center'><strong>Manajemen Komentar</strong></div>
			<div class='panel-body'>
				<form role='form' action='' method='POST'>
				<table class='table'>
					<thead><tr>
						<th>No.</th>
						<th>Tanggal</th>
						<th>Artikel</th>
						<th>Komentar</th>
						<th>Nama</th>
						<th>Email</th>
						<th class='text-center'>Tindakan</th>
					</tr></thead><tbody>";
					
					foreach($kerja as $kerja){
						$judul_artikel = $komentar->getNamaArtikel($kerja['id_artikel']);
						
					echo "
					<tr>
						<td>".$no."</td>
						<td>".$libs->tgl_indo($kerja['tanggal_komentar'])."</td>
						<td>".$judul_artikel['judul']."</td>
						<td>".$kerja['isi_komentar']."</td>
						<td>".$kerja['nama_komentar']."</td>
						<td>".$kerja['email_komentar']."</td>
						<td class='text-center'><div class='btn-group btn-group-xs'><a href='".$aksi.'hapus&id='.$kerja['id_komentar']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Hapus' onclick='return confirm(&quot;Apakah Anda benar-benar ingin menghapus item ini?&quot;);'><i class='glyphicon glyphicon-remove'></i></a></div></td>
					</tr>";
					$no++;
					}
					echo "
					</tbody>
				</table>
				</form>
			</div>
	</div>
	";
	
	
	
	echo "<center><ul class='pagination pagination-small center m-t-none m-b-none'>";

			// $req = empty($_REQUEST['view'])?'':$_REQUEST['view']; // mencari kata carinya
			
			$root = URL.'komentar';//$_SERVER['PHP_SELF']; //."?view=".$req."&"; 
			
			$blok = 10;
			$ini  = ceil($page/$blok);
			
			$mulai   =  ($blok * $ini) - ($blok-1);
			$selesai =  ($blok<=$pages)?($ini * $blok):$pages ;
			
			$kurang1 = $page -1;
			$tambah1 = $page +1 ;
			
			if($pages >=1 && $page<=$pages){

				echo ($page!=1 or empty($page))?"<li style='cursor:pointer;'  ><a href='$root&hal=$kurang1'> Back </a> </li> ":'';
				for($x=$mulai; $x<=$selesai; $x++)
					if($x==$page){
						
						echo "<li style='cursor:pointer;' class='active'> <a >$x</a> </li> ";
						
					}
					else{ 
						echo "<li style='cursor:pointer;'  ><a href='$root?hal=$x'>$x</a></li> ";
					};
				
				echo ($page!=$pages)?"<li style='cursor:pointer;'  ><a href='$root?hal=$tambah1'> Next </a> </li> ":'';
									
				
			};
	echo "</ul> </center>";
	
	break;

}

?>

<?php endif;?>