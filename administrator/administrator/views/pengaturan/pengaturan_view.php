<?php 
if(isset($model)):
date_default_timezone_set('Asia/Jakarta');

 $aksi = URL."controllers/pengaturan/pengaturan_control.php?model=pengaturan&method="; // halaman untuk eksekusi


switch($method){
default :
	$detail = $pengaturan->getPengaturanById(1);
	
	echo "
	<div class='col-sm-12'>
				<div class='panel panel-default'>
				<div class='panel-body'>
					<form role='form' action='".$aksi."edit' method='POST' enctype='multipart/form-data'>
					<div class='form-group'>
						<label>Nama Website Indonesia</label>
							<input type='text' class='form-control' name='nama_website' value='".$detail['nama_website']."'>
							<input type='hidden' class='form-control' name='id_nama_website' value='".$detail['id_nama_website']."'>
							
					</div>
					<div class='form-group'>
						<label>Nama Website Inggris</label>
						
							<input type='text' class='form-control' name='nama_website_en' value='".$detail['nama_website_en']."'>
							
						
					</div>
					<div class='form-group'>
						<label>Kontak (footer website)</label>
						
							<!--<input type='text' class='form-control' name='alamat' value='".$detail['alamat']."'>-->
							<textarea name='alamat' class=' form-control' maxlength='255'>".$detail['alamat']."</textarea>
							
							<input type='hidden' class='form-control' name='telepon' value='".$detail['telepon']."'>
							<input type='hidden' class='form-control' name='fax' value='".$detail['fax']."'>
							<input type='hidden' class='form-control' name='email' value='".$detail['email']."'>
					</div>
					
					<div class='form-group'>
						<label>Footer</label>
							<input type='text' class='form-control' name='footer' value='".$detail['footer']."'>
							<input type='hidden' class='form-control' name='icon' value='".$detail['icon']."'>
							
					</div>
					<div class='form-group'>
						<label> Icon : <img style='width:30px;height:30px; margin-bottom:10px;' src='".ROOT."images/header/".$detail['icon']."'>
							<input type='file' class='form-control' name='file' ><br/>
						</label>
						<div class='input-group'>
							<span class='input-group-btn'><button class='btn btn-primary' type='submit' name='submit'><i class='glyphicon glyphicon-edit'></i> Simpan</button></span>
						</div>
					</div>
					</form>
				</div>
				</div>
			</div>
	";
	break;

case "tambah":
echo"<div class='panel panel-default'>
				<div class='panel-heading text-center'>
					<strong>Form Tambah Artikel</strong>
				</div>
				<div class='panel-body'>
				<form role='form' action='".$aksi."tambah' method='POST' enctype='multipart/form-data'>
					<div class='form-group'>
						<input type='hidden' class='form-control' name='id_artikel'>
					</div>
					<div class='form-group'>
						<label>Judul <span class='text-danger'>*</span></label>
						<input type='text' class='form-control' name='judul' required>
					</div>
					<div class='form-group'>
						<label>Konten <span class='text-danger'>*</span></label>
						<textarea class='form-control' id='editor1' name='isi'></textarea>
					</div>
					<div class='form-group'>
						<label>Penulis</label>
						<input type='text' class='form-control' readonly value='".$_SESSION['nama_lengkap']."' name='penulis'>
					</div>
					<div class='form-group'>
						<label>Bahasa</label>
						<select class='form-control' name='bahasa'>
							<option value='id'>Indonesia</option>
							<option value='en'>Inggris</option>
						</select>
					</div>
					<div class='form-group'>
						<label>Pilih Gambar</label>
						<div class='col-md-4 input-group'>
							<input type='file' class='form-control' name='file' id='uploadFile' accept='image/*'>
							<label class='text-info' style='font-style:italic;font-size:12px;'>*format file .jpg, .png, .gif</a></label>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-2' style='padding-left: 0;'>Publish</label>
						<div class='col-md-10'>
							<label class='radio-inline'><input type='radio' name='publish' value='Y' checked='checked' >Y</label>
							<label class='radio-inline'><input type='radio' name='publish' value='N'>N</label>
						</div>
					</div>
					<div class='form-group text-center'>
						<button type='submit' class='btn btn-sm btn-primary' name='tambah' value='tambah'><i class='glyphicon glyphicon-check'></i> Simpan</button>
						<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
					</div>
				</form>
				</div>

					<div id='imagePreview' style='width:400px; height:116px;'></div>
				
				</div>";

	echo "
		
		
	";

break;
	
case "edit":
	// var_dump($parameter);
	if(filter_var($parameter, FILTER_VALIDATE_INT)){
		// echo $angka = $libs->stringHtml('123123');
		// $nomor = '1231234ff&nbspdfkdjkjfd"nfjksldj';
	  // $coba = filter_var($angka, FILTER_VALIDATE_INT);
	  // $coba = filter_var($nomor, FILTER_SANITIZE_MAGIC_QUOTES);
	  // var_dump($angka);
	 $data = $artikel->getArtikelById($parameter);
	 $artikel = $artikel->getArtikelById($parameter);

	 
	 echo"
					<div class='panel panel-default'>
					<div class='panel-heading text-center'>
						<strong>Form Edit Artikel</strong>
					</div>
					<div class='panel-body'>
						<form role='form' action='".$aksi.'edit'."' method='POST' enctype='multipart/form-data'>
							<div class='form-group'>
								<input type='hidden' class='form-control' name='id' value='".$data['id']."'>
								
								
							</div>
							<div class='form-group'>
								<label>Judul <span class='text-danger'>*</span></label>
								<input type='text' class='form-control' name='judul' value='".$data['judul']."' required>
							</div>
							<div class='form-group'>
								<label>Konten <span class='text-danger'>*</span></label>
								
								<textarea class='form-control' id='editor1' name='isi'>";
							
									echo "$data[isi]";
							
						  echo "</textarea>
							</div>
							<div class='form-group'>
								<label>Penulis</label>
								<input type='text' class='form-control' readonly name='penulis' value='".$data['penulis']."'>
							</div>
							<div class='form-group'>
								<label>Bahasa</label>
								<select class='form-control' name='bahasa'>";
									if ($data['bahasa']=='en') {
										echo "<option value='en' selected>Inggris</option><option value='id'>Indonesia</option>";
									} else if ($data['bahasa']=='id') {
										echo "<option value='en'>Inggris</option><option value='id' selected>Indonesia</option>";
									}
								echo"
								</select>
							</div>";
							
								echo"
							<div class='form-group'>
								<label>Nama Gambar </label>
								<input type='text' readonly class='form-control' name='gambar' value='".$data['gambar']."'>
							</div>
								
								<div class='form-group'>
								<label>Ganti Gambar</label>
								
								<div class='col-md-6 input-group'>
									<input type='file'  name='file' accept='image/*' id='uploadFile' class='form-control'>
									<label class='text-info' style='font-style:italic;font-size:12px;'>*format file .jpg, .png </label>
								</div>
							</div>";
							
							echo"<div class='form-group'>";
							
								if ($data['publish']=="N"){
									echo"<label class='col-md-2' style='padding-left: 0;'>Publish</label>
										<div class='col-md-10'>
											<label class='radio-inline'><input type='radio' name='publish' value='Y'>Y</label>
											<label class='radio-inline'><input type='radio' name='publish' value='N'  checked='checked'>N</label>
										</div>";
								}
								else{
									echo"<label class='col-md-2' style='padding-left: 0;'>Publish</label>
										<div class='col-md-10'>
											<label class='radio-inline'><input type='radio' name='publish' value='Y' checked='checked'>Y</label>
											<label class='radio-inline'><input type='radio' name='publish' value='N'>N</label>
										</div>";
								}
							echo"</div>
							<div class='col-md-12 form-group text-center'>
								<button type='submit' class='btn btn-sm btn-primary' value='submit' name='submit'><i class='glyphicon glyphicon-check'></i> Update</button>
								<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
							</div>
						</form>
					
						
						
						<img style='width:400px; height:266px; float:left;' src='../../../images/content/news/".$data['gambar']."'>
					
					</div>
					<div id='imagePreview' style='width:400px; height:266px;'></div>
				</div>";
	 
	 

break;

}else{
		header("location:".URL."halaman");
		return false;
	}
}

?>

<?php 
endif;
?>