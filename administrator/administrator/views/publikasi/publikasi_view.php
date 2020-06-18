<?php 
if(isset($model)):

date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/publikasi/publikasi_control.php?model=publikasi&method="; 
// $nip = $_SESSION['nip_dosen'];
$nip = '';
$append = '';
// var_dump($method);
switch($method){
default :
		
		$semua =  $publikasi->countPublikasi();
	
		$per_page = 30; // jumlah query per 
	
		$i= 1;
	
		$pages = ceil($semua / $per_page); // melihat total blok yang ada
		
		$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
		
		$start = ($page-1)*$per_page; //startnya 
		
		$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging
		
		$publik = $publikasi->getPublikasi($start,$per_page); //menghitung 
		
		
		if($pages==0){echo "Data tidak ditemukan"; }

		
	echo "
	<a href='".URL."publikasi/tambah' class='btn btn-primary'>Tambah Publikasi</a>
	<br/>
	<br/>
	<div class='panel panel-default'>
			<div class='panel-heading text-center'><strong>Manajemen Publikasi</strong></div>
			<div class='panel-body'>
				<form role='form' action='' method='POST'>
				<table class='table'>
					<thead><tr>
						<th>No.</th>
						<th>Judul Publikasi</th>
						<th>Deskripsi</th>
						<th>Nama Anggota</th>
						<th>Tahun</th>
						<th colspan='3' class='text-center'>Tindakan</th>
					</tr></thead><tbody>";
					foreach($publik as $publik){
					
						
					echo "
					<tr>
						<td>".$no."</td>
						<td><a target='_blank' href='".ROOT.'files/'.$publik['nama_file']."'>".$publik['judul']." </a></td>
						<td>".substr($publik['deskripsi'],0,115)."</td>
						<td>".$publik['oleh'].'<br/>';
						
						$anggota = $publikasi->getAnggotaPublikasiById($publik['id']);
						
						foreach($anggota as $anggota){
							echo $anggota['nama_dosen'].'<br/>';
						}							
						
						echo"</td>
						<td>".$publik['tahun']."</td>
						<td></td>
						<td class='text-center'><div class='btn-group btn-group-xs'>
						<a href='".URL."publikasi/edit/".$publik['id']."' class='btn btn-xs btn-info' data-toggle='tooltip' title='Edit'><i class='glyphicon glyphicon-pencil'></i></a></div></td>
						<td class='text-center'><div class='btn-group btn-group-xs'><a href='".$aksi.'hapus&file='.$publik['nama_file'].'&id='.$publik['id']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Hapus' onclick='return confirm(&quot;Apakah Anda benar-benar ingin menghapus item ini?&quot;);'><i class='glyphicon glyphicon-remove'></i></a></div></td>
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

		
			$root = URL.'publikasi';//$_SERVER['PHP_SELF']; //."?view=".$req."&"; 
			
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
			<strong>Publikasi </strong>
		</div>
		<div class='panel-body'>";
		
	echo"<form role='form' action='".$aksi."tambah' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>Judul Artikel Ilmiah <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='judul' required>
			
			<input type='hidden' class='form-control' value='".$subdomain."' name='subdomain' required>
			
		</div>
		
		<div class='form-group'>
			<label>Nama Pertemuan Ilmiah / Seminar / Nama Jurnal dan Volume  <span class='text-danger'>*</span><br/> <label style='font-size:10pt;'>(contoh: Prosiding seminar nasional e-Indonesia Initiatives (eII-Forum) 2013, Institut Teknologi Bandung, Bandung)</label></label>
			<input type='text' class='form-control' name='deskripsi' required>
		</div>
		
		<div class='form-group'>
			<label >Nama Penulis Pertama <span class='text-danger'>*</span></label>
		</div>
		<div class='row'>
				
			<div class='col-md-6'> "; 
			
			echo "<select class='form-control' name='oleh' > <option value=''>Pilih Dosen</option>";
			
			#modul antar jurusan
			
			$append = ''; 
			
			$getJurusan = $jurusan->getJurusanByDomain($subdomain);
			
			
			$j = $jurusan->getJurusanByJurusan($getJurusan['jurusan']);
			
			foreach($j as $j){
				$database = 'db_'.$j['subdomain'];
				$ketua = $dosen->getDosenAll($database); // yang lama
				
				foreach($ketua as $ketua){
				
					echo  "<option value='".$ketua['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
				
					$append .=  "<option value='".$ketua['nama_dosen']."|".$ketua['subdomain']."'>".$ketua['nama_dosen']."</option>";
				}
				
				
				
			}
			
			##############
			  
			echo "</select>";
			
			echo"
			</div>
			
			<div class='col-md-6'>
				<input placeholder='isi disini jika ketua adalah mahasiswa' class='form-control form-group' name='mahasiswa_ketua' />
			</div>
			
		</div>
		
		<div class='tambah'></div>	

		<div class='form-group'>
			<label>Tahun <span class='text-danger'>*</span></label>";
			
			echo " <select name='tahun' class='form-control'>
						<option value='1970' selected>Pilih Tahun</option>
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
			<label>Link (jika ada)</label>
			<input type='text' class='form-control' name='link' value='' >
		</div>
		
		<div class='controls'>
			<label >Masukkan file ( jika ada)</label>
			<div class='controls'>
			<input type='file' name='file'  > Format yang didukung adalah *.pdf
			</div>	
		</div> <!-- /controls -->		
		
		<div class='controls'>
			<label style='font-size:10pt;'>Keterangan : Tautan judul akan terisi sesuai dengan form Link yang anda isi, jika kosong maka tautan akan mengarah ke file yang anda upload <br/></label>
		</div> <!-- /controls -->	
		
		<div class='form-group text-center'>
			<input type='button' id='btn1' class='btn btn-sm btn-success' value='Tambah Anggota '/>
			<button type='submit' class='btn btn-sm btn-primary' name='simpan'><i class='glyphicon glyphicon-check'></i> Simpan</button>
			<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
		</div>
		</form>
	</div>";
	
break;

case "edit":
	
$detail = $publikasi->getPublikasiById($parameter,$nip);	

 echo"<div class='panel panel-default'>
		<div class='panel-heading text-center'>
			<strong>Publikasi </strong>
		</div>
		<div class='panel-body'>";

		echo"<form role='form' action='".$aksi."edit' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>Judul Publikasi <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='judul' value='".$detail['judul']."' required>
			<input type='hidden' class='form-control' name='id' value='".$detail['id']."'  required>
			<input type='hidden' class='form-control' name='nip' value='".$detail['nip']."'  required>
			<input class='form-control' type='hidden' value='".$subdomain."' name='subdomain'/> 
		</div>
		
		<div class='form-group'>
			<label>Deskripsi Publikasi <span class='text-danger'>*</span></label>
			<input type='text' value='".$detail['deskripsi']."' class='form-control' name='deskripsi' required>
		</div>
		
		<div class='form-group'>
			<label >Nama Penulis Pertama <span class='text-danger'>*</span></label>
		</div>
		<div class='row'>
				
			<div class='col-md-6'> ";
	
		
			echo "<select class='form-control' name='oleh'> <option value=''>Pilih Dosen</option>";
			
			#modul antar jurusan
			
			$getJurusan = $jurusan->getJurusanByDomain($subdomain);
			
			$ada_ketua = '';
			
			$j = $jurusan->getJurusanByJurusan($getJurusan['jurusan']);
			
			foreach($j as $j){
				
				$database = 'db_'.$j['subdomain'];
				
				$ketua = $dosen->getDosenAll($database); // yang lama
				
				foreach($ketua as $ketua){
					
					$selected = ($detail['oleh'] == $ketua['nama_dosen'])?'selected':'';	
							
					if($selected == 'selected'){
						$ada_ketua = 1;
					}
					
					echo  "<option $selected value='".$ketua['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
					
					$append .=  "<option value='".$ketua['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
			
				}
				
			}
			######################
			
			  
			echo "</select>";
			$mahasiswa_ketua = ($ada_ketua!='')?'':$detail['oleh'];
	echo "</div>
			
			<div class='col-md-6'>
				<input placeholder='isi disini jika ketua adalah mahasiswa' class='form-control form-group' value='".$mahasiswa_ketua."' name='mahasiswa_ketua' />
			</div>
			
		</div>";
			
		$anggota = $publikasi->getAnggotaPublikasiById($parameter);
		
		foreach($anggota as $anggota){
			echo "
			<div class='form-group'>
			<label>Nama Anggota </label>
			";
			echo "
			<div class='row'>
			<div class='col-md-6'>
			<select class='form-control' name='anggota_publikasi_2[]' ><option value=''>Pilih Dosen</option>";
			
			#modul antar jurusan
			
			$getJurusan = $jurusan->getJurusanByDomain($subdomain);
			
			$mahasiswa_ada = '';
			
			$j = $jurusan->getJurusanByJurusan($getJurusan['jurusan']);
			
			foreach($j as $j){
				$database = 'db_'.$j['subdomain'];
				$ketua = $dosen->getDosenAll($database); // yang lama
				
				foreach($ketua as $ketua){
					
					$selected = ($anggota['nama_dosen'] == $ketua['nama_dosen'])?'selected':'';	
					
					if($selected == 'selected'){
							
							$mahasiswa_ada = 1;

						}

					echo  "<option $selected value='".$ketua['nama_dosen']."|".$anggota['nama_dosen']."'>".$ketua['nama_dosen']."</option>";
				
				}
				
			}
			
			#######
			
			
			echo "</select></div>";
				
					$mahasiswa_publikasi_2 = ($mahasiswa_ada != '')?'':$anggota['nama_dosen'];
				
			echo "
			
			<div class='col-md-4'>
				<input placeholder='isi disini jika ketua adalah mahasiswa' class='form-control form-group' value='".$mahasiswa_publikasi_2."' name='mahasiswa_publikasi_2[]' />
				
				<input type='hidden' placeholder='isi disini jika ketua adalah mahasiswa' class='form-control form-group' value='".$anggota['nama_dosen']."' name='id_mahasiswa_publikasi_2[]' />
				
				
			</div>
			
			
			<div class='col-md-2'> <a href='".$aksi.'hapus_anggota&id='.$anggota['id']."&back=".$parameter."' class='btn btn-sm btn-danger' ><i class='glyphicon glyphicon-trash'></i> Hapus</a></div>";
			
			echo " </div></div> ";
			
		}

		echo "		<div class='edit'></div>	"; // div append
		
		
		
	echo "<div class='form-group'>
			<label>Tahun <span class='text-danger'>*</span></label>";
			
			echo " <select name='tahun' class='form-control'>
						<option value='1970' selected>Pilih Tahun</option>
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
			<label>Nama File </label>
			<div class='row'>
				<div class='col-md-6'>
					<input type='text' readonly='' class='form-control' name='gambar' value='".$detail['nama_file']."'>
				</div>
				<div class='col-md-6 form-group'>
					<a href='".$aksi."hapus_file&id=".$detail['id']."&file=".$detail['nama_file']."' class='btn btn-sm btn-default'> <i class='glyphicon glyphicon-remove'></i> Hapus File</a>
				</div>
			
				
			</div>
		</div>
		
		<div class='form-group'>
			<label>Link (jika ada)</label>
			<input type='text' class='form-control' name='link' value='".$detail['link']."' value='' >
		</div>
		 
		
		<div class='controls'>
			<label > Format yang didukung adalah *.pdf</label>
			<div class='controls'>
			<input type='file' name='file'  >
			</div>	
		</div> <!-- /controls -->		
		
		<div class='controls'>
			<label style='font-size:10pt;'>Keterangan : Tautan judul akan terisi sesuai dengan form Link yang anda isi, jika kosong maka tautan akan mengarah ke file yang anda upload <br/></label>
		</div> <!-- /controls -->	
		<div class='form-group text-center'>
			<input type='button' id='btn_edit' class='btn btn-sm btn-success' value='Tambah Anggota Peneliti '/>
			<button type='submit' class='btn btn-sm btn-primary' name='simpan'><i class='glyphicon glyphicon-check'></i> Simpan</button>
			<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
		</div>
		</form>
	</div>";
	
break;

}

$append = "<div class='form-group'><label >Nama Anggota <span class='text-danger'>*</span></label></div><div class='row'><div class='col-md-6'><select class='form-control' name='anggota_publikasi_1[]' ><option value=''>Pilih Dosen</option>".$append."</select></div><div class='col-md-6'><input placeholder='isi disini jika ketua adalah mahasiswa' class='form-control form-group' name='mahasiswa_publikasi_1[]' /></div></div>";
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
