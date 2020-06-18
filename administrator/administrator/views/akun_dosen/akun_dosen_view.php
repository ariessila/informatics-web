<?php 
if(isset($model)):

date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/dosen/dosen_control.php?model=dosen&method="; 


// var_dump($method);
switch($method){
default :

if(isset($_GET['pass'])){
		
		$pass= $_GET['pass'];
		echo "
		<div class='alert alert-block alert-success fade in'>
		  <button data-dismiss='alert' class='close' type='button'>×</button>
		  <p>
			 Berhasil Mengubah Password Menjadi : ".$pass."<br/>
				Password juga telah dikirim melalui email yang terdaftar
		  </p>
		</div>";
	}
	echo "
	<div class='panel panel-default'>
			<div class='panel-heading text-center'><strong>Manajemen Dosen</strong></div>
			<div class='panel-body'>
				<form role='form' action='' method='POST'>
				<table class='table'>
					<thead>
					<tr>
						<th>Username</th>
						<th>Nama Dosen</th>
						<th>Email</th>
						<th colspan='2' class='text-center'>Tindakan</th>
					</tr>
					</thead>
					<tbody>";
					$dosen = $dosen->getDosen();
					foreach($dosen as $dosen){
						
					echo "
					<tr>
						<td>".$dosen['nip']."</td>
						<td>".$dosen['nama_dosen']."</td>
						<td>".$dosen['email_dosen']."</td>
						<td class='text-center'><div class='btn-group btn-group-xs'><a href='".$aksi."reset&id=".$dosen['nip']."' class='btn btn-xs btn-info' data-toggle='tooltip' title='Edit'><i class='glyphicon glyphicon-pencil'></i>  Reset Password</a></div></td>
						<td class='text-center'><div class='btn-group btn-group-xs'></div></td>
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
			<input type='text' class='form-control' name='nip' required>
		</div>
		<div class='form-group'>
			<label>Nama <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' name='nama_dosen' required>
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
			<label>Bidang Penelitian <span class='text-danger'>*</span></label>
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
			<input type='text' readonly class='form-control' name='nip' value='".$detail['nip']."' required>
		</div>
		<div class='form-group'>
			<label>Nama <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['nama_dosen']."' name='nama_dosen' required>
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
			<label>Bidang Penelitian <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['bidang_penelitian']."' name='bidang_penelitian' required>
		</div>
		<div class='form-group'>
			<label>Bidang Penelitian <span class='text-danger'>*</span></label>
			<input type='text' class='form-control' value='".$detail['foto_dosen']."' readonly name='foto_dosen' required>
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