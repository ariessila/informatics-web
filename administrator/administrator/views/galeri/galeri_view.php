<?php 
if(isset($model)):

date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/galeri/galeri_control.php?model=galeri&method="; // galeri untuk eksekusi

$parameter =1;
// var_dump($method);
switch($method){

default :
$parameter= 1;
	
	echo "	
	<a style='margin-bottom:20px;' href='".URL."galeri/tambah' class='btn btn-primary'>Tambah Gambar</a>
	<br />
	";
	
	echo "<table class='table'>
			<tr>
				<th>No</th>
				<th style='width:300px;'>Gambar</th>
				<th>Keterangan</th>
				<th>Link</th>
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
				".$file['link']."
			</td>
			<td>
				<a onclick='return confirm(\"Apakah Anda benar-benar ingin menghapus item ini?\");' href='".$aksi."file_hapus&id=".$file['id'] ."' class='btn btn-danger btn-small'>x</a>
			</td>
		 </tr>";
	$no++;
	}
	
	echo "</table>";

break;

case "tambah":

		
	echo "

	<div class='panel panel-default'>
		<div class='panel-heading text-center'>
			<strong>Form Tambah Gambar</strong>
		</div>
		<div class='panel-body'>
	
			<form role='form' class='form-horizontal' enctype='multipart/form-data' action='".$aksi."file_tambah' method='POST' name='form' class='form-horizontal'>	
				<div class='control-group'>											
					<label class='control-label' >Keterangan Gambar</label>
					<div class='controls'>
						<input type='text' class='form-control'  name='keterangan' required/> <br/>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class='control-group'>											
					<label class='control-label' >Link (jika ada)</div>
						<div class='control'> contoh http://unhas.ac.id </label> </div>
					<div class='controls'>
						<input type='text' class='form-control'  name='link' /> <br/>
					<label class='control-label' ><font size='2pt'>Keterangan : jika gambar tidak memiliki link maka tautan akan ke halaman galeri </font></label>
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
	


break;

case "detail":
	if(filter_var($parameter, FILTER_VALIDATE_INT)){
	$album  = $galeri->getGaleriById($parameter);
	
	echo "<h2>Album : ".$album['nama']."</h2>";		
			
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
	// var_dump($parameter);
	if(filter_var($parameter, FILTER_VALIDATE_INT)){
	
	$detail = $galeri->getGaleriById($parameter);

		
	echo "
		<form role='form' enctype='multipart/form-data' action='".$aksi."edit' method='POST' name='form' class='form-horizontal'>
			<div class='control-group'>											
				<label class='control-label' >Nama Album</label>
				<div class='controls'>
					<input type='text' class='form-control' name='nama' id='nama' placeholder='nama' required value='".$detail['nama']."' />
					<input type='hidden' class='form-control' name='id' value='".$detail['id']."' />
				</div> <!-- /controls -->				
			</div> <!-- /control-group -->
			
			<div class='control-group'>											
				<label class='control-label' > </label>
				<div class='controls'>
					<button type='submit' name='submit' value='Ubah' class='btn btn-primary'>Submit</button>
				</div> <!-- /controls -->				
			</div> <!-- /control-group -->	
					
		</form>";

break;

}else{
		header("location:".URL."galeri");
		return false;
	}
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
