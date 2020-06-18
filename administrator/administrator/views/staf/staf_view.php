<?php 
if(isset($model)):

date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/staf/staf_control.php?model=staf&method="; 

switch($method){

default :
$acak = date('dm').mt_rand(1,17).mt_rand(99,300);
	echo "
	<a href='".URL."staf/tambah/".$acak."' class='btn btn-primary'>Tambah Staf</a>
	<br/>
	<br/>
	<table id='example2' class='table table-bordered table-striped ' >
	<thead>
		<tr >
			<th>Nip</th>
			<th>Nama </th>
			<th>Jabatan</th>
			<th>Foto</th>
			<th>Tindakan</th>
		</tr>
		
	</thead>
	<tbody>
	" ; // header tabel
		
		$pengelola = $pengelola->getPengelola(); //menghitung 
		$no =1;
	foreach($pengelola as $pengelola){	
		
		echo "
		<tr>
		
			<td>".$pengelola['nip']."</td>

			<td>".$pengelola['nama_pengelola']."</td>

			<td>".$pengelola['jabatan_pengelola']."</td>";
			echo (empty($pengelola['foto_pengelola']))?"<td><img style='width:90px; height:120px;' src='".ROOT."images/content/organization/images.jpg' /></td>":"	<td><img style='width:90px; height:120px;' src='".ROOT."images/content/organization/".$pengelola['foto_pengelola']."' /></td>";
		
			
			echo "
			<td> ";
			echo "
			
			<div class='btn-group btn-group-xs'><a href='".URL."staf/edit/".$pengelola['nip']."' class='btn btn-xs btn-info' data-toggle='tooltip' title='Edit'><i class='glyphicon glyphicon-pencil'></i></a></div> 
			
			| 
			
			<div class='btn-group btn-group-xs'><a href='".$aksi."hapus&id=".$pengelola['nip']."&file=".$pengelola['foto_pengelola']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Hapus' onclick='return confirm(\"Apakah Anda benar-benar ingin menghapus item ini?\");'><i class='glyphicon glyphicon-remove'></i></a></div>
			

			";
		echo"</td>
			
		</tr>
		
		";
		$no++;
	}
	echo "
	</tbody>	
	</table>
	";
	
	break;

case "tambah":

 echo"<div class='panel panel-default'>
		<div class='panel-heading text-center'>
			<strong>Form Tambah Staf/ Pengelola</strong>
		</div>
		<div class='panel-body'>";
		echo"<form role='form' action='".$aksi."tambah' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>NIP <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='nip' required>
		</div>
		<div class='form-group'>
			<label>Nama <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='nama_pengelola' required>
		</div>
		<div class='form-group'>
			<label>Jabatan <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='jabatan_pengelola' required>
		</div>
		<div class='form-group'>
			<label>Foto</label>
			<div class='input-group'>
				<input type='file' class='form-control' name='file'>
				<label class='text-warning' style='font-style:italic;font-size:12px;'>*format file .jpg, .png</a></label>
			</div>
		</div>
		<div class='form-group text-center'>
			<button type='submit' class='btn btn-sm btn-primary' name='simpan'><i class='glyphicon glyphicon-check'></i> Simpan</button>
			<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
		</div>
		</form>
	</div>";
	
break;

case "detail":
	if(filter_var($parameter, FILTER_VALIDATE_INT)){
	$pengelola  = $galeri->getGaleriById($parameter);
	
	echo "<h2>Album : ".$pengelola['nama']."</h2>";		
			
	echo "
	<div class='panel panel-default'>
		<div class='panel-heading text-center'>
			<strong>Form Tambah Album</strong>
		</div>
		<div class='panel-body'>
	
			<form role='form' class='form-horizontal' enctype='multipart/form-data' action='".$aksi."file_tambah' method='POST' name='form' class='form-horizontal'>	
				<div class='control-group'>											
					<label class='control-label' >Keterangan Gambar</label>
					<div class='controls'>
						<input type='text' name='keterangan' /> <br/>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class='control-group'>											
					<label class='control-label' >Gambar</label>
					<div class='controls'>
						*Format Gambar hanya png dan jpg<br/>
						<input type='file' name='file' />  <br/>	
						<input type='hidden' class='form-control' value='".$parameter."' name='id' />
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
					
				
				<div class='control-group'>											
					<label class='control-label' ></label>
					<div class='controls'>
						<input type='submit' name='submit' value='Tambahkan'  class='btn btn-success'>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
			</div> <!-- /control-group -->
		</div> <!-- /control-group -->
			
		
	
		
	</form><br/> ";
	
	echo "<table class='table'>
			<tr>
				<th>No</th>
				<th style='width:300px;'>Gambar</th>
				<th>Keterangan</th>
				<th>Tindakan</th>
			</tr>
	
		";
	$file = $galeri->getDetail($parameter);
	
	$no = 1;
	foreach($file as $file){
	echo "<tr> 
			<td>".$no."
			</td>
			<td>
				<img style='width:300px; height:200px;' src='".ROOT."images/content/gallery/".$file['nama_file']."'>
			</td>
			<td>";
		echo "".$file['keterangan'] ." ";
	
	echo "	</td>
			<td>
				<a href='".$aksi."file_hapus&id=".$file['id'] ."' class='btn btn-danger btn-small'>x</a>
			</td>
		 </tr>";
	$no++;
	}
	
	echo "</table>";

	}
break ;
case "edit":

	
	$detail = $pengelola->getPengelolaById($parameter);
	
	
 echo"<div class='panel panel-default'>
		<div class='panel-heading text-center'>
			<strong>Form Tambah Staf/ Pengelola</strong>
		</div>
		<div class='panel-body'>";
		echo"<form role='form' action='".$aksi."edit' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>NIP <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['nip']."' readonly name='nip' required>
			<input type='hidden' class='form-control' name='gambar' value='".$detail['foto_pengelola']."' required>
		</div>
		<div class='form-group'>
			<label>Nama <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['nama_pengelola']."' name='nama_pengelola' required>
		</div>
		<div class='form-group'>
			<label>Jabatan <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['jabatan_pengelola']."' name='jabatan_pengelola' required>
		</div>
		<div class='form-group'>
			<label>Foto</label>
			<div class='input-group'>
				<input type='file' class='form-control' name='file'>
				<label class='text-warning' style='font-style:italic;font-size:12px;'>*format file .jpg, .png</a></label>
			</div>
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
<script type='text/javascript'> 
 function hapusAlert(iddokumen){
		var conBox = confirm("Anda yakin ingin menghapus data ini?");
		if(conBox){ //modul/mod_berita/beritaAksi.php?act=berita&page=hapus&id=$berita[id]
			location.href="<?php echo $aksi."hapus" ;?>&id="+ iddokumen;
		}else{
			return false;
		}
	};

</script>

<?php endif;?>