<?php 
if(isset($model)):

date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/kerjasama/kerjasama_control.php?model=kerjasama&method="; 


// var_dump($method);
switch($method){
default :

	$semua =  $kerjasama->countKerjasama();
	
		$per_page = 30; // jumlah query per 
	
		$i= 1;
	
		$pages = ceil($semua / $per_page); // melihat total blok yang ada
		
		$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
		
		$start = ($page-1)*$per_page; //startnya 
		
		$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging
		
		$kerja = $kerjasama->getKerjasama($start,$per_page); //menghitung 
		
		
		if($pages==0){echo "Data tidak ditemukan"; }


	
	
		
	echo "
	<a href='".URL."halaman/edit/5' class='btn btn-primary'>Deskripsi</a> &nbsp	<a href='".URL."kerjasama/tambah' class='btn btn-primary'>Tambah Kerjasama</a>
	<br/>
	<br/>
	<div class='panel panel-default'>
			<div class='panel-heading text-center'><strong>Manajemen Kerjasama</strong></div>
			<div class='panel-body'>
				<form role='form' action='' method='POST'>
				<table class='table'>
					<thead><tr>
						<th>No.</th>
						<th>Institusi</th>
						<th>Deskripsi Kerjasama</th>
						<th>Tahun</th>
						<th>Masa Berlaku</th>
						<th colspan='2' class='text-center'>Tindakan</th>
					</tr></thead><tbody>";
					
					foreach($kerja as $kerja){
					echo "
					<tr>
						<td>".$no."</td>
						<td>".$kerja['institusi']."</td>
						<td>".$kerja['jenis_kerjasama']."</td>
						<td>".$kerja['tahun']."</td>
						<td>".$kerja['masa_berlaku']."</td>
						<td class='text-center'><div class='btn-group btn-group-xs'>
						<a href='".URL."kerjasama/edit/".$kerja['id_kerjasama']."' class='btn btn-xs btn-info' data-toggle='tooltip' title='Edit'><i class='glyphicon glyphicon-pencil'></i></a></div></td>
						<td class='text-center'><div class='btn-group btn-group-xs'><a href='".$aksi.'hapus&id='.$kerja['id_kerjasama']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Hapus' onclick='return confirm(&quot;Apakah Anda benar-benar ingin menghapus item ini?&quot;);'><i class='glyphicon glyphicon-remove'></i></a></div></td>
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
			
			$root = URL.'kerjasama';//$_SERVER['PHP_SELF']; //."?view=".$req."&"; 
			
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

case "tambah":
 echo"<div class='panel panel-default'>
		<div class='panel-heading text-center'>
			<strong>Kerjasama </strong>
		</div>
		<div class='panel-body'>";
				
	echo"<form role='form' action='".$aksi."tambah' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>Institusi <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='institusi' required>
		</div>
		<div class='form-group'>
			<label>Deskripsi Kerjasama </label>
			<textarea name='jenis_kerjasama'>
			</textarea>
		</div>
		<div class='form-group'>
			<label>Tahun <span class='text-danger'>*</span></label>
			";
			echo " <select name='tahun' class='form-control'>
						<option value='' selected>Pilih Tahun</option>
				";
					
				for($ii=1990;$ii<=2047;$ii++){
					echo "
						<option value='".$ii."'>".$ii."</option>
					";
					
				}
			
			echo "</select>";
			
			echo "
		</div>
		<div class='form-group'>
			<label>Masa Berlaku <span class='text-danger'>*</span></label>
			";
			echo " <select name='masa_berlaku' class='form-control'>
						<option value='' selected>Pilih Tahun</option>
				";
					
				for($ii=1990;$ii<=2047;$ii++){
					echo "
						<option value='".$ii."'>".$ii."</option>
					";
					
				}
			
			echo "</select>";
			
			echo "
		</div>
		<div class='form-group text-center'>
			<button type='submit' class='btn btn-sm btn-primary' name='simpan'><i class='glyphicon glyphicon-check'></i> Simpan</button>
			<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
		</div>
		</form>
	</div>";
	
break;

case "edit":

	
	$detail = $kerjasama->getKerjasamaById($parameter);
	
	echo"<form role='form' action='".$aksi."edit' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>Institusi <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='institusi' value='".$detail['institusi']."' required>
			<input type='hidden' class='form-control' name='id_kerjasama' value='".$detail['id_kerjasama']."' required>
		</div>
		<div class='form-group'>
			<label>Deskripsi Kerjasama </label>
			<textarea name='jenis_kerjasama'>
			".$detail['jenis_kerjasama']."
			</textarea>
		</div>
		<div class='form-group'>
			<label>Tahun <span class='text-danger'>*</span></label>
			";
			echo " <select name='tahun' class='form-control'>
						<option value='' selected>Pilih Tahun</option>
				";
					
				for($ii=1990;$ii<=2047;$ii++){
					$pas = ($detail['tahun'] == $ii)?'selected':'';
					echo "
						<option ".$pas." value='".$ii."'>".$ii."</option>
					";
					
				}
			
			echo "</select>";
			echo "
		</div>
		
		<div class='form-group'>
			<label>Masa Berlaku <span class='text-danger'>*</span></label>
			";
			echo " <select name='masa_berlaku' class='form-control'>
						<option value='' selected>Pilih Tahun</option>
				";
					
				for($ii=1990;$ii<=2047;$ii++){
					$pas = ($detail['masa_berlaku'] == $ii)?'selected':'';
					echo "
						<option ".$pas." value='".$ii."'>".$ii."</option>
					";
					
				}
			
			echo "</select>";
			
			echo "
		</div>
		<div class='form-group text-center'>
			<button type='submit' class='btn btn-sm btn-primary' name='simpan'><i class='glyphicon glyphicon-check'></i> Simpan</button>
			<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
		</div>
		</form>
	</div>";
	
break;

}

?>

		
<?php endif;?>