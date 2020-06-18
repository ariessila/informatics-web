<?php 
if(isset($model)):
date_default_timezone_set('Asia/Jakarta');

 $aksi = URL."controllers/external_link/external_link_control.php?model=external_link&method="; // halaman untuk eksekusi


switch($method){

default :
	
	echo"<div class='btn-group'>
			<a class='btn btn-primary' href='".URL."link/tambah' style='margin-bottom:30px;'>Tambah External Link</a>
			
		</div>
		<div class='panel panel-default' id='panel-default'>
			<div class='panel-heading text-center'><strong>Manajemen External Link</strong></div>
			<form role='form' action='' method='POST'>
			<table class='table'>
				<thead><tr>
					<th>No.</th>
					<th>URL External Link</th>
					<th colspan=2 class='text-center'>Tindakan</th>
				</tr></thead><tbody>";
		// include	"models/connect/config.php";
		$data  = $external_link->getExternalLink();
		$i=0;
		foreach($data as $data ){
			$i++;
		
			echo "<tr>
				<td>$i</td>
				<td><em>$data[link]</em></td>
				<td class='text-center'><div class='btn-group btn-group-xs'><a href='".URL."link/edit/".$data['id_link']."' class='btn btn-xs btn-info' data-toggle='tooltip' title='Edit'><i class='glyphicon glyphicon-pencil'></i></a></div></td>
				<td class='text-center'><div class='btn-group btn-group-xs'><a href='".$aksi."hapus&id=".$data['id_link']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Hapus' onclick='return confirm(\"Apakah Anda benar-benar ingin menghapus item ini?\");'><i class='glyphicon glyphicon-remove'></i></a></div></td>
			</tr>";
		}
		echo"</tbody>
			</table>
			</form>
			</div>";
	
	break;

case "tambah":
echo"<div class='panel panel-default'>
				<div class='panel-heading text-center'>
					<strong>Form Tambah External Link</strong>
				</div>
				<div class='panel-body'>
				<form role='form' action='".$aksi."tambah' method='POST'>
					<div class='form-group'>
						<input type='hidden' class='form-control' name='id_link'>
					</div>
					<div class='form-group'>
						<label>Masukkan URL :</label>
						<input type='text' class='form-control' name='link' placeholder='URL' required>
						<label class='text-info' style='font-style:italic;font-size:12px;'>contoh: www.dikti.go.id/</a></label>
					</div>
					<div class='form-group text-center'>
						<button type='submit' class='btn btn-sm btn-primary' name='simpan'><i class='glyphicon glyphicon-check'></i> Simpan</button>
						<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
					</div>
				</form>
				</div>
				</div>";

break;
	
case "edit":
$idnya = filter_var($parameter,FILTER_VALIDATE_INT);
if($idnya){

$detail = $external_link->getExternalLinkById($idnya);
echo	"<div class='panel panel-default'>
			<div class='panel-heading text-center'>
				<strong>Form Tambah External Link</strong>
			</div>
			<div class='panel-body'>
			<form role='form' action='".$aksi."edit' method='POST'>
				<div class='form-group'>
					<input type='hidden' class='form-control' value='".$detail['id_link']."' name='id_link'>
				</div>
				<div class='form-group'>
					<label>Masukkan URL :</label>
					<input type='text' class='form-control' name='link' value='".$detail['link']."' placeholder='URL' required>
					<label class='text-info' style='font-style:italic;font-size:12px;'>contoh: http://www.dikti.go.id/</a></label>
				</div>
				<div class='form-group text-center'>
					<button type='submit' class='btn btn-sm btn-primary' name='simpan'><i class='glyphicon glyphicon-check'></i> Simpan</button>
					<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
				</div>
			</form>
			</div>
		</div>";
	
	
}else{
	
	header('location:'.URL.'link');

}


break;

}

?>

<?php 
endif;
?>