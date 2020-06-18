<?php 
if(isset($model)):

date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/dosen/dosen_control.php?model=dosen&method="; 


// var_dump($method);
switch($method){
default :
	echo "
	<a href='".URL."dosen/tambah' class='btn btn-primary'>Tambah Data Dosen</a>
	<br/>
	<br/>
	<div class='panel panel-default'>
			<div class='panel-heading text-center'><strong>Manajemen Dosen</strong></div>
			<div class='panel-body'>
				<form role='form' action='' method='POST'>
				<table class='table'>
					<thead>
					<tr>
						<th>NIP</th>
						<th>Nama Dosen</th>
						<th>Email</th>
						<th>Bidang Keahlian</th>
						<th>File Foto</th>
						<th colspan='2' class='text-center'>Tindakan</th>
					</tr>
					</thead>
					<tbody>";
					$dosen = $dosen->getDosen();
					foreach($dosen as $dosen){
						$fotodosen = empty($dosen['foto_dosen'])?'default99.jpg':$dosen['foto_dosen'];
					echo "
					<tr>
						<td>".$dosen['nip']."</td>
						<td>".$dosen['gelar_depan']." ".$dosen['nama_dosen'].", ".$dosen['gelar_belakang']."</td>
						<td>".$dosen['email_dosen']."</td>
						<td>".$dosen['bidang_penelitian']."</td>
						<td><img style='width:80px; height:100px; ' src='".ROOT."images/content/organization/".$fotodosen."' /></td>
						<td class='text-center'><div class='btn-group btn-group-xs'><a href='".URL."dosen/edit/".$dosen['nip']."' class='btn btn-xs btn-info' data-toggle='tooltip' title='Edit'><i class='glyphicon glyphicon-pencil'></i></a></div></td>
						<td class='text-center'><div class='btn-group btn-group-xs'><a href='".$aksi."hapus&id=".$dosen['nip']."&file=".$dosen['foto_dosen']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Hapus' onclick='return confirm(&quot;Apakah Anda benar-benar ingin menghapus item ini?&quot;);'><i class='glyphicon glyphicon-remove'></i></a></div></td>
					</tr>";
					};
					
					echo "
					</tbody>
					</table></form>
				</div>
			</div>
	";
	
	break;

case "tambah":
 echo"<div class='panel panel-default'>
		<div class='panel-heading text-center'>
			<strong>Dosen </strong>
		</div>
		<div class='panel-body'>";
		echo"<form role='form' action='".$aksi."tambah' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>NIP <span class='text-danger'>*</span></label>
			<input onkeypress=\"return nomor1(event);\" type='text' class='form-control' name='nip' required>
		</div>
		<div class='form-group'>
			<label>Nama Tanpa Gelar <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='nama_dosen' required>
			<input type='hidden' class='form-control' value='".$subdomain."' name='subdomain' required>
		</div>
		<div class='form-group'>
			<div class='col-md-6'>
				<div class='form-group' class=''>
					<label>Gelar Depan </label>
					<input type='text' class='form-control ' name='gelar_depan'>
				</div>
			</div>
			
			<div class='col-md-6'>
				<div class='form-group'>
					<label>Gelar Belakang </label>
					<input type='text' class='form-control' name='gelar_belakang' >
				</div>
			</div>
		</div>
		<div class='form-group'>
			<label>Jabatan <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='jabatan_dosen' required>
		</div>
		<div class='form-group'>
			<label>Email <span class='text-danger'>* (Password akan dikirim ke email dosen yang bersangkutan)</span></label>
			<input type='text' class='form-control' name='email_dosen' required>
		</div>
		<div class='form-group'>
			<label>Bidang Keahlian <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='bidang_penelitian' required>
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

case "edit":

	
	$detail = $dosen->getDosenById($parameter);
		
 echo"<div class='panel panel-default'>
		<div class='panel-heading text-center'>
			<strong>Dosen </strong>
		</div>
		<div class='panel-body'>";
		echo"<form role='form' action='".$aksi."edit' method='POST' enctype='multipart/form-data'>
		<div class='form-group'>
			<label>NIP <span class='text-danger'>*</span></label>
			<input onkeypress=\"return nomor1(event);\" type='text' readonly class='form-control' name='nip' value='".$detail['nip']."' required>
		</div>
		<div class='form-group'>
			<label>Nama Tanpa Gelar <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['nama_dosen']."' name='nama_dosen' required>
		</div>
		<div class='form-group'>
			<div class='col-md-6'>
				<div class='form-group' class=''>
					<label>Gelar Depan </label>
					<input type='text' class='form-control ' value='".$detail['gelar_depan']."' name='gelar_depan'>
				</div>
			</div>
			
			<div class='col-md-6'>
				<div class='form-group'>
					<label>Gelar Belakang </label>
					<input type='text' class='form-control' value='".$detail['gelar_belakang']."' name='gelar_belakang' >
				</div>
			</div>
		</div>
		<div class='form-group'>
			<label>Jabatan <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['jabatan_dosen']."' name='jabatan_dosen' required>
		</div>
		<div class='form-group'>
			<label>Email <span class='text-danger'>*</span></label>
			<input type='text' class='form-control'  value='".$detail['email_dosen']."' name='email_dosen' required>
		</div>
		<div class='form-group'>
			<label>Bidang Keahlian <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['bidang_penelitian']."' name='bidang_penelitian' required>
		</div>
		<div class='form-group'>
			<label>Foto </label>
			<div class='row'>
					<div class='col-md-6'>
					<input type='text' class='form-control' value='".$detail['foto_dosen']."' readonly name='foto_dosen' required>
					</div>
					<div class='col-md-6 form-group'>
						<a  href='".$aksi."hapus_gambar&id=".$detail['nip']."&file=".$detail['foto_dosen']."' class='btn btn-sm btn-default'> <i class='glyphicon glyphicon-remove'></i> Hapus Gambar</a>
					</div>
				</div>	
			
		
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

<?php endif;?>