<?php 

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/pengabdian/pengabdian_control.php?model=pengabdian&method="; 

$append  = '';

// var_dump($method);

switch($method){
	default :

	$semua =  $pengabdian->countPengabdian();
	
		$per_page = 30; // jumlah query per 
	
		$i= 1;
	
		$pages = ceil($semua / $per_page); // melihat total blok yang ada
		
		$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
		
		$start = ($page-1)*$per_page; //startnya 
		
		$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging
		
		$peneliti = $pengabdian->getPengabdian($start,$per_page); //menghitung 
		
		$append  = '';
		
		if($pages==0){echo "Data tidak ditemukan"; }


	
	
		
	echo "
	<a href='".URL."halaman/edit/19' class='btn btn-primary'>Deskripsi</a> &nbsp	<a href='".URL."pengabdian/tambah' class='btn btn-primary'>Tambah Pengabdian </a>
	<br/>
	<br/>
	<div class='panel panel-default'>
			<div class='panel-heading text-center'><strong>Manajemen Pengabdian</strong></div>
			<div class='panel-body'>
				<form role='form' action='' method='POST'>
				<table class='table'>
					<thead><tr>
						<th>No.</th>
						<th>Judul Pengabdian</th>
						<th>Ketua Pengabdian</th>
						<th>Tahun Pengabdian</th>
						<th>Sumber Dana</th>
						<th colspan='2' class='text-center'>Tindakan</th>
					</tr></thead><tbody>";
					foreach($peneliti as $peneliti){
						
					$anggota = $pengabdian->getAnggotaPengabdianById($peneliti['id']);
						
					echo "
					<tr>
						<td>".$no."</td>
						<td>".$peneliti['judul_pengabdian']."</td>
						<td>".$peneliti['ketua'].'<br/>';
						
						foreach($anggota as $anggota){
							echo $anggota['nama_dosen'].'<br/>';
						}
						
						echo "</td>
						<td>".$peneliti['tahun']."</td>
						<td>".$peneliti['sumber_dana']."</td>
						<td class='text-center'><div class='btn-group btn-group-xs'>
						<a href='".URL."pengabdian/edit/".$peneliti['id']."' class='btn btn-xs btn-info' data-toggle='tooltip' title='Edit'><i class='glyphicon glyphicon-pencil'></i></a></div></td>
						<td class='text-center'><div class='btn-group btn-group-xs'><a href='".$aksi.'hapus&id='.$peneliti['id']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Hapus' onclick='return confirm(&quot;Apakah Anda benar-benar ingin menghapus item ini?&quot;);'><i class='glyphicon glyphicon-remove'></i></a></div></td>
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
			
			$root = URL.'pengabdian';//$_SERVER['PHP_SELF']; //."?view=".$req."&"; 
			
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
			<strong>Pengabdian </strong>
		</div>
		<div class='panel-body'>";
		
	echo"<form role='form' action='".$aksi."tambah' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>Judul Pengabdian <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='judul_pengabdian' required>
			<input type='hidden' class='form-control' value='".$subdomain."' name='subdomain' required>
		</div>
		<div class='form-group'>
			<label >Sumber Dana <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='sumber_dana' required>
		</div>
		
		<div class='form-group'>
			<label >Ketua <span class='text-danger'>*</span></label>
		</div>
		<div class='row'>
				
				
			<div class='col-md-6'>
				
				";
				echo "<select class='form-control' name='ketua_pengabdian' > <option value=''>Pilih Dosen</option>";
				
				#modul antar jurusan
				
				$append = ''; 
				
				$getJurusan = $jurusan->getJurusanByDomain($subdomain);
				
				
				$j = $jurusan->getJurusanByJurusan($getJurusan['jurusan']);
				
				foreach($j as $j){
					$database = 'db_'.$j['subdomain'];
					$ketua = $dosen->getDosenAll($database); // yang lama
					
					foreach($ketua as $ketua){
					
						echo  "<option value='".$ketua['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
						// $append .= "<option value='".$ketua['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
				
					}

				}
				
				##############
				
				echo "</select>";
			
				echo "
			</div>
			
			<div class='col-md-6'>
				<input placeholder='isi disini jika ketua adalah mahasiswa' class='form-control form-group' name='mahasiswa_ketua' />
			</div>
		</div>
		
		
		<div class='form-group'>
			<label>Nama Anggota Pengabdian</label>
		</div>
		
		<div class='row'>
					
			<div class='col-md-6'>	
			
			";
			echo "<select class='form-control' name='anggota_pengabdian_1[]' ><option value=''>Pilih Dosen</option>";
			
			$getJurusan = $jurusan->getJurusanByDomain($subdomain);
			
			$j = $jurusan->getJurusanByJurusan($getJurusan['jurusan']);
			
			foreach($j as $j){
				$database = 'db_'.$j['subdomain'];
				$ketua = $dosen->getDosenAll($database); // yang lama
				
				foreach($ketua as $ketua){
				
					echo  "<option value='".$ketua['nama_dosen']."|".$ketua['subdomain']."'>".$ketua['nama_dosen']."</option>";
					
					$append .=  "<option value='".$ketua['nama_dosen']."|".$ketua['subdomain']."'>".$ketua['nama_dosen']."</option>";
			
				}
				
			}
			
			echo "</select>";
		
			echo "
		
			</div>
			<div class='col-md-6'>
			
				<input placeholder='isi disini jika anggota adalah mahasiswa' class='form-control form-group' name='mahasiswa_pengabdian_1[]' />
				
			</div>
		</div>
		
		
		
		<div class='form-group'>
			<label>Nama Anggota Pengabdian </label>
		</div>
		<div class='row'>
					
			<div class='col-md-6'>	
			";
			echo "<select class='form-control' name='anggota_pengabdian_1[]' ><option value=''>Pilih Dosen</option>";
			
			$getJurusan = $jurusan->getJurusanByDomain($subdomain);
			
			$j = $jurusan->getJurusanByJurusan($getJurusan['jurusan']);
			
			foreach($j as $j){
				$database = 'db_'.$j['subdomain'];
				$ketua = $dosen->getDosenAll($database); // yang lama
				
				foreach($ketua as $ketua){
				
					echo  "<option value='".$ketua['nama_dosen']."|".$ketua['subdomain']."'>".$ketua['nama_dosen']."</option>";
			
				}
					
			}
			
			echo "</select>";
		
			echo "
		
			</div>
			<div class='col-md-6'>
			
				<input placeholder='isi disini jika anggota adalah mahasiswa' class='form-control form-group' name='mahasiswa_pengabdian_1[]' />
				
			</div>
		</div>


		<div class='tambah'></div>	

		
		<div class='form-group'>
			<label>Tahun <span class='text-danger'>*</span></label>";
			
			echo " <select name='tahun_pengabdian' class='form-control'>
						<option value='1970' selected>Pilih Tahun</option>
				";
					
				for($ii=2006;$ii<=2047;$ii++){
					echo "
						<option  value='".$ii."'>".$ii."</option>
					";
					
				}
			
			echo "</select>";
			
		echo "
		</div>
		<div class='form-group text-center'>
			<input type='button' id='btn1' class='btn btn-sm btn-success' value='Tambah Anggota Pengabdian '/>
			<button type='submit' class='btn btn-sm btn-primary' name='simpan'><i class='glyphicon glyphicon-check'></i> Simpan</button>
			<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
		</div>
		</form>
	</div>";
	
break;

case "edit":

	
	$detail = $pengabdian->getPengabdianById($parameter);
	
echo"<form role='form' action='".$aksi."edit' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>Judul Pengabdian <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['judul_pengabdian']."' name='judul_pengabdian' required>
			<input type='hidden' class='form-control' value='".$detail['id']."' name='id_pengabdian' required>
		</div>
		<div class='form-group'>
			<label>Sumber Dana <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['sumber_dana']."' name='sumber_dana' required>
			<input class='form-control' type='hidden' value='".$subdomain."' name='subdomain'/> 
		</div>
		
			
		<div class='form-group'>
			<label >Ketua <span class='text-danger'>*</span></label>
		</div>
		<div class='row'>
				
			<div class='col-md-6'>";
				echo "<select class='form-control' name='ketua_pengabdian' > <option value=''>Pilih Dosen</option>";
				
				#ketua
				
				#modul antar jurusan
				
				$getJurusan = $jurusan->getJurusanByDomain($subdomain);
				
				
				$j = $jurusan->getJurusanByJurusan($getJurusan['jurusan']);
				
				foreach($j as $j){
					$database = 'db_'.$j['subdomain'];
					$ketua = $dosen->getDosenAll($database); // yang lama
					
					foreach($ketua as $ketua){
						$selected = ($detail['ketua'] == $ketua['nama_dosen'])?'selected':'';	
						
						if($selected == 'selected'){
							$ada_ketua = 1;
						}

					
						echo  "<option $selected value='".$ketua['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
						
						$append .= "<option value='".$ketua['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
				
					}
					
					
				}
				######################
	 
				 
			echo "</select>
			
			</div>
				";
				
			#form input berhubungan dengan selected pada menu ketua
			
			$mahasiswa_ketua = empty($ada_ketua)?$detail['ketua']:'';
			
			echo "
			
			
			<div class='col-md-6'>
			
				<input placeholder='isi disini jika anggota adalah mahasiswa' class='form-control form-group' name='mahasiswa_ketua' value='".$mahasiswa_ketua."' />
				
			</div>
			
		</div>";
		
		#######batas ketua
				
		$anggota = $pengabdian->getAnggotaPengabdianById($parameter);
		
		foreach($anggota as $anggota){
			echo "
			<div class='form-group'>
			<label>Nama Anggota Pengabdian </label>
			";
			echo "
			<div class='row'>
			<div class='col-md-6'>
			<select class='form-control' name='anggota_pengabdian_2[]' ><option value=''>Pilih Dosen</option>";
			
			
			#modul antar jurusan
			
			
			$getJurusan = $jurusan->getJurusanByDomain($subdomain);
			
			$anggota_mahasiswa = 1;
			
			$j = $jurusan->getJurusanByJurusan($getJurusan['jurusan']);
			
			$ada = '';

			foreach($j as $j){
				
				$database = 'db_'.$j['subdomain'];
				
				$ketua = $dosen->getDosenAll($database); // yang lama
				
				
				foreach($ketua as $ketua){
					$selected1 = ($anggota['nama_dosen'] == $ketua['nama_dosen'])?'selected':'';	
					
					if($selected1== "selected"){
						
						$ada = 1;
		
					};
					 
					echo  "<option $selected1 value='".$ketua['nama_dosen']."|".$anggota['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
			
				}
				
			}
			
			######			
			
			echo "</select>
			</div>";
			
			#form input berhubungan dengan selected pada menu anggota diaats
			
			$mahasiswa_pengabdian_2 =($ada != '')?'':$anggota['nama_dosen'];
			
			echo "
			<div class='col-md-4'>
			
				<input type='text' placeholder='isi disini jika anggota adalah mahasiswa' class='form-control form-group' name='mahasiswa_pengabdian_2[]' value='".$mahasiswa_pengabdian_2."' />
				
				<input type='hidden' placeholder='isi disini jika anggota adalah mahasiswa' class='form-control form-group' name='id_mahasiswa_pengabdian_2[]' value='".$anggota['nama_dosen']."' />
				
			</div>
			";
			#######
			
			echo "<div class='col-md-2'> <a href='".$aksi.'hapus_anggota&id='.$anggota['id']."&back=".$parameter."' class='btn btn-sm btn-danger' ><i class='glyphicon glyphicon-trash'></i> Hapus</a></div>";
			
			echo " </div></div> ";
			
		}

		echo "		<div class='edit'></div>	"; // div append
		
		
		echo "<div class='form-group'>
			<label>Tahun <span class='text-danger'>*</span></label>";
			
			echo " <select name='tahun_pengabdian' class='form-control'>
						<option value='' selected>Pilih Tahun</option>
				";
					
				for($ii=2006;$ii<=2047;$ii++){
					$selected = ($detail['tahun'] == $ii)?'selected':'';
					echo "
						<option $selected value='".$ii."'>".$ii."</option>
					";
					
				}
			
			echo "</select>";
			
		echo "
		</div>
		<label></label>
		
		<br/>
		<div class='form-group text-center'>
			<input type='button' id='btn_edit' class='btn btn-sm btn-success' value='Tambah Anggota Peneliti '/>
			<button type='submit' class='btn btn-sm btn-primary' name='simpan'><i class='glyphicon glyphicon-check'></i> Simpan</button>
			<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
		</div>
		</form>
	</div>";
	
	
break;

}


$append = "<div class='form-group'><label>Nama Anggota Pengabdian </label></div><div class='row'><div class='col-md-6'><select class='form-control' name='anggota_pengabdian_1[]' ><option value=''>Pilih Dosen</option>".$append."</select></div><div class='col-md-6'><input placeholder='isi disini jika anggota adalah mahasiswa' class='form-control form-group' name='mahasiswa_pengabdian_1[]' /></div></div>";
// var_dump($append);
?>


<script>
$(document).ready(function(){
	
    $("#btn1").click(function(){
        $(".tambah").append(" <?php echo $append;?>");
    });
    
    $("#btn_edit").click(function(){
        $(".edit").append(" <?php echo $append;?>");
    });
    
});
</script>