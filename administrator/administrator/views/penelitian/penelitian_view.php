<?php 
if(isset($model)):

date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/penelitian/penelitian_control.php?model=penelitian&method="; 
$append = '';
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
	 
// var_dump($method);
switch($method){
default :

	$semua =  $penelitian->countPenelitian();
	
		$per_page = 30; // jumlah query per 
	
		$i= 1;
	
		$pages = ceil($semua / $per_page); // melihat total blok yang ada
		
		$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
		
		$start = ($page-1)*$per_page; //startnya 
		
		$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging
		
		$peneliti = $penelitian->getPenelitian($start,$per_page); //menghitung 
		
		
		if($pages==0){echo "Data tidak ditemukan"; }


	
	
		
	echo "
	<a href='".URL."halaman/edit/4' class='btn btn-primary'>Deskripsi</a> &nbsp	<a href='".URL."penelitian/tambah' class='btn btn-primary'>Tambah Penelitian </a>
	<br/>
	<br/>
	<div class='panel panel-default'>
			<div class='panel-heading text-center'><strong>Manajemen Penelitian</strong></div>
			<div class='panel-body'>
				<form role='form' action='' method='POST'>
				<table class='table'>
					<thead><tr>
						<th>No.</th>
						<th>Judul Penelitian</th>
						<th>Ketua Penelitian</th>
						<th>Tahun Penelitian</th>
						<th>Sumber Dana</th>
						<th colspan='2' class='text-center'>Tindakan</th>
					</tr></thead><tbody>";
					foreach($peneliti as $peneliti){
						$anggota = $penelitian->getAnggotaPenelitianById($peneliti['id_penelitian']);
						
					echo "
					<tr>
						<td>".$no."</td>
						<td>".$peneliti['judul_penelitian']."</td>
						<td>".$peneliti['ketua_penelitian']."<br/>";
						
						foreach($anggota as $anggota){
							echo $anggota['nama_dosen'].'<br/>';
						}
						
						echo "</td>
						<td>".$peneliti['tahun_penelitian']."</td>
						<td>".$peneliti['sumber_dana']."</td>
						<td class='text-center'><div class='btn-group btn-group-xs'>
						<a href='".URL."penelitian/edit/".$peneliti['id_penelitian']."' class='btn btn-xs btn-info' data-toggle='tooltip' title='Edit'><i class='glyphicon glyphicon-pencil'></i></a></div></td>
						<td class='text-center'><div class='btn-group btn-group-xs'><a href='".$aksi.'hapus&id='.$peneliti['id_penelitian']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Hapus' onclick='return confirm(&quot;Apakah Anda benar-benar ingin menghapus item ini?&quot;);'><i class='glyphicon glyphicon-remove'></i></a></div></td>
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
			
			$root = URL.'penelitian';//$_SERVER['PHP_SELF']; //."?view=".$req."&"; 
			
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
			<strong>Penelitian </strong>
		</div>
		<div class='panel-body'>";
		
	echo"<form role='form' action='".$aksi."tambah' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>Judul Penelitian <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='judul_penelitian' required>
		</div>
		<div class='form-group'>
			<label>Sumber Dana<span class='text-danger'>*</span></label>
			<input class='form-control' type='text' name='sumber_dana'/> 
			
			<input class='form-control' type='hidden' value='".$subdomain."' name='subdomain'/> 
 
		</div>
		
		<div class='form-group'>
			<label >Ketua Peneliti <span class='text-danger'>*</span></label>
		</div>
		<div class='row'>
				
				
			<div class='col-md-6'>
			
				
				";
				echo "<select class='form-control' name='ketua_penelitian' > <option value=''>Pilih Dosen</option>";
				
				// $ketua = $dosen->getDosen(); // yang lama
				
				
				
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
			<label>Nama Anggota Penelitan </label>
		</div>
		
		<div class='row'>
					
			<div class='col-md-6'>	
			
			
				";
				echo "<select class='form-control' name='anggota_penelitian_1[]' ><option value=''>Pilih Dosen</option>";
				
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
				
					<input placeholder='isi disini jika anggota adalah mahasiswa' class='form-control form-group' name='mahasiswa_penelitian_1[]' />
					
				</div>
				
		</div>
		
		<div class='form-group'>
			<label>Nama Anggota Penelitan </label>
		</div>
		
		<div class='row'>
					
			<div class='col-md-6'>	
				
				";
				echo "<select class='form-control' name='anggota_penelitian_1[]' ><option value=''>Pilih Dosen</option>";
				
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
			
				<input placeholder='isi disini jika anggota adalah mahasiswa' class='form-control form-group' name='mahasiswa_penelitian_1[]' />
				
			</div>
		
			
		</div>

		<div class='tambah'></div>	

		<div class='form-group'>
			<label>Abstrak <span class='text-danger'>*</span></label>
			<textarea class='form-control' id='editor1' name='abstrak'></textarea>
		</div>
		<div class='form-group'>
			<label>Tujuan Penilitian <span class='text-danger'>*</span></label>
			<textarea class='form-control' id='editor2' name='tujuan_penilitian'></textarea>
		</div>
		<div class='form-group'>
			<label>Manfaat Penilitian <span class='text-danger'>*</span></label>
			<textarea class='form-control' id='editor3' name='manfaat_penilitian'></textarea>
		</div>
		<div class='form-group'>
			<label>Hasil Penilitian <span class='text-danger'>*</span></label>
			<textarea class='form-control' id='editor4' name='hasil_penilitian'></textarea>
		</div>
		<div class='form-group'>
			<label>Nama Grant<span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='grant' required>
		</div>
		<div class='form-group'>
			<label>Nama Laboratorium <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='nama_lab' required>
		</div>
		<div class='form-group'>
			<label>Kata Kunci <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='kata_kunci' required>
		</div>
		<div class='form-group'>
			<label>Durasi penelitian <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='durasi_penelitian' required>
		</div>
		<div class='form-group'>
			<label>Tahun <span class='text-danger'>*</span></label>";
			
			echo " <select name='tahun_penelitian' class='form-control'>
						<option value='1970' selected>Pilih Tahun</option>
				";
					
				for($ii=2006;$ii<=2047;$ii++){
					echo "
						<option value='".$ii."'>".$ii."</option>
					";
					
				}
			
			echo "</select>";
			
		echo "
		</div>
		<div class='form-group'>
			<label>Pilih Gambar Pendukung Abstrak ( < 1 MB )</label>
			<div class='col-md-4 input-group'>
				<input type='file' class='form-control' name='file' id='uploadFile' accept='image/*'>
				<label class='text-info' style='font-style:italic;font-size:12px;'>*format file .jpg, .png</a></label>
			</div>
		</div>
		
		<div class='form-group text-center'>
			<input type='button' id='btn1' class='btn btn-sm btn-success' value='Tambah Anggota Peneliti '/>
			
			<button type='submit' class='btn btn-sm btn-primary' name='simpan'><i class='glyphicon glyphicon-check'></i> Simpan</button>
			
			<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
		</div>
		</form>
	</div>";
	
break;

case "edit":

	
	$detail = $penelitian->getPenelitianById($parameter);
	
echo"<form role='form' action='".$aksi."edit' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>Judul Penelitian <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['judul_penelitian']."' name='judul_penelitian' required>
			<input type='hidden' class='form-control' value='".$detail['id_penelitian']."' name='id_penelitian' required>
		</div>
		<div class='form-group'>
			<label>Sumber Dana<span class='text-danger'>*</span></label>
			<input class='form-control' type='text' value='".$detail['sumber_dana']."' name='sumber_dana'/> 

			<input class='form-control' type='hidden' value='".$subdomain."' name='subdomain'/> 
			
		</div>
		
		<div class='form-group'>
			<label >Ketua Peneliti<span class='text-danger'>*</span></label>
		</div>
		<div class='row'>
				
			<div class='col-md-6'>";
			
			echo "<select class='form-control' name='ketua_penelitian' ><option value=''>Pilih Dosen</option>";

			#modul antar jurusan
			
			$getJurusan = $jurusan->getJurusanByDomain($subdomain);
			
			$ada_ketua = '';
			
			$j = $jurusan->getJurusanByJurusan($getJurusan['jurusan']);
			
			foreach($j as $j){
				$database = 'db_'.$j['subdomain'];
				$ketua = $dosen->getDosenAll($database); // yang lama
				foreach($ketua as $ketua){
					$selected = ($detail['ketua_penelitian'] == $ketua['nama_dosen'])?'selected':'';	
											
						if($selected == 'selected'){
							$ada_ketua = 1;
						}

					
					echo  "<option $selected value='".$ketua['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
					
					$append .= "<option value='".$ketua['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
			
				}
				
			}
			######################
			
			echo "</select>";
			
			$mahasiswa_ketua = ($ada_ketua!='')?'':$detail['ketua_penelitian'];
			
			echo "
			</div>
			
			<div class='col-md-6'>
				<input placeholder='isi disini jika ketua adalah mahasiswa' class='form-control form-group' value='".$mahasiswa_ketua."' name='mahasiswa_ketua' />
			</div>
			
		</div>
		
		";
		
		$anggota = $penelitian->getAnggotaPenelitianById($parameter);
		
		foreach($anggota as $anggota){
			echo "
			<div class='form-group'>
			<label>Nama Anggota Penelitan </label>
			";
			echo "
			<div class='row'>
			<div class='col-md-6'>
			<select class='form-control'  name='anggota_penelitian_2[]' ><option value=''>Pilih Dosen</option>";
			
			#modul antar jurusan
			
			$getJurusan = $jurusan->getJurusanByDomain($subdomain);
			
			
			$j = $jurusan->getJurusanByJurusan($getJurusan['jurusan']);
			
			
			$mahasiswa_ada = '';

			foreach($j as $j){
				$database = 'db_'.$j['subdomain'];
				$ketua = $dosen->getDosenAll($database); // yang lama
				
				
				foreach($ketua as $ketua){
					
					$selected1 = ($anggota['nama_dosen'] == $ketua['nama_dosen'])?'selected':'';	
					
					
					if($selected1 == 'selected'){
						
						$mahasiswa_ada = 1;
		
					};
					
					echo  "<option $selected1 value='".$ketua['nama_dosen']."|".$anggota['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
					
				}
				
			}
			
			#######
			
			echo "</select></div>";
			
			$mahasiswa_penelitian_2 = ($mahasiswa_ada != '')?'':$anggota['nama_dosen'];
			
			echo "
				<div class='col-md-4'>
			
					<input placeholder='isi disini jika anggota adalah mahasiswa' value='".$mahasiswa_penelitian_2."' class='form-control form-group' 	name='mahasiswa_penelitian_2[]' />
					
					<input type='hidden' placeholder='isi disini jika anggota adalah mahasiswa' class='form-control form-group' name='id_mahasiswa_penelitian_2[]' value='".$anggota['nama_dosen']."' />
					
				</div>";
				
			echo "<div class='col-md-2'> <a href='".$aksi.'hapus_anggota&id='.$anggota['id']."&back=".$parameter."' class='btn btn-sm btn-danger' ><i class='glyphicon glyphicon-trash'></i> Hapus</a></div>";
		
			echo " </div></div> ";
			
		}

		echo "		<div class='edit'></div>	"; // div append
		
		echo "
		
		<div class='form-group'>
			<label>Tahun <span class='text-danger'>*</span></label>";
			
			echo " <select name='tahun_penelitian' class='form-control'>
						<option value='1970' selected>Pilih Tahun</option>
				";
					
				for($ii=2006;$ii<=2047;$ii++){
					$selected = ($detail['tahun_penelitian'] == $ii)?'selected':'';
					echo "
						<option $selected value='".$ii."'>".$ii."</option>
					";
					
				}
			
			echo "</select>";
			
		echo "
		</div>
		<div class='form-group'>
			<label>Abstrak <span class='text-danger'>*</span></label>
			<textarea class='form-control' id='editor1' name='abstrak' value='".$detail['abstrak']."'></textarea>
		</div>
		<div class='form-group'>
			<label>Tujuan Penilitian <span class='text-danger'>*</span></label>
			<textarea class='form-control' id='editor2' name='tujuan_penilitian'>";
				echo $detail['tujuan_penilitian'];
			echo "</textarea>
		</div>
		<div class='form-group'>
			<label>Manfaat Penilitian <span class='text-danger'>*</span></label>
			<textarea class='form-control' id='editor3' name='manfaat_penilitian'>";
				echo $detail['manfaat_penilitian'];
			echo "</textarea>
		</div>
		<div class='form-group'>
			<label>Hasil Penilitian <span class='text-danger'>*</span></label>
			<textarea class='form-control' id='editor4' name='hasil_penilitian'>";
				echo $detail['hasil_penilitian'];
			echo "</textarea>
		</div>
		<div class='form-group'>
			<label>Nama Grant<span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='grant' value='".$detail['grant_abstrak']."' required>
		</div>
		<div class='form-group'>
			<label>Nama Laboratorium <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='nama_lab' value='".$detail['nama_lab']."' required>
		</div>
		<div class='form-group'>
			<label>Kata Kunci <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='kata_kunci' value='".$detail['kata_kunci']."' required>
		</div>
		<div class='form-group'>
			<label>Pilih Gambar Pendukung Abstrak ( < 1 MB )</label>
			<div class='row'>
				<div class='col-md-6'>
					<input type='text' readonly class='form-control'  name='file_view'  value='".$detail['abstrak_img']."'>
				</div>
				<div class='col-md-6 form-group'>
					<a  href='".$aksi."hapus_gambar&id=".$detail['id_penelitian']."' class='btn btn-sm btn-default'> <i class='glyphicon glyphicon-remove'></i> Hapus Gambar</a>
				</div>
			</div>
		</div>
		<div class='form-group'>
			<label>Ganti Gambar</label>
			<div class='col-md-6 input-group'>
				<input type='file'  name='file' accept='image/*' id='uploadFile' class='form-control'>
				<label class='text-info' style='font-style:italic;font-size:12px;'>*format file .jpg, .png </label>
			</div>
		</div>

		<div class='form-group text-center'>
			<input type='button' id='btn_edit' class='btn btn-sm btn-success' value='Tambah Anggota Peneliti '/>
			<button type='submit' class='btn btn-sm btn-primary' name='simpan'><i class='glyphicon glyphicon-check'></i> Simpan</button>
			<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
			<br/><br/>
		</div>
		</form>
	</div>";
	
	
break;

}

$append = "	<div class='form-group'><label>Nama Anggota Penelitan </label></div><div class='row'><div class='col-md-6'>	<select class='form-control' name='anggota_penelitian_1[]' ><option value=''>Pilih Dosen</option>".$append."</select></div><div class='col-md-6'><input placeholder='isi disini jika anggota adalah mahasiswa' class='form-control form-group' name='mahasiswa_penelitian_1[]' /></div></div>";
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

<?php endif;?>
