<?php 
if(isset($model)):

date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/halaman/halaman_control.php?model=halaman&method="; // halaman untuk eksekusi


// var_dump($method);
switch($method){

default :
$acak = date('dm').mt_rand(1,17).mt_rand(99,300);
	echo "
	<a href='".URL."halaman/tambah/".$acak."' class='btn btn-primary'>Tambah Halaman</a>
	<br/>
	<br/>
	<table id='example2' class='table table-bordered table-striped ' >
	<thead>
		<tr >
			<th>No</th>
			<th>Judul ID</th>
			<th>Judul EN</th>
			<th>Konten ID</th>
			<th>Konten EN</th>
			<th>Tindakan</th>
		</tr>
		
	</thead>
	<tbody>
	" ; // header tabel

	$semua =  $halaman->countHalaman();
	
		$per_page = 30; // jumlah query per halaman 
	
	$i= 1;

	// $halaman = $r->rowCount(); // mending disini pake fungsi buat ngitung ke sql
			
				$pages = ceil($semua / $per_page); // melihat total blok yang ada
				
				$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
				
				$start = ($page-1)*$per_page; //startnya 
				
				$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap halaman paging
				
				$halaman = $halaman->getHalaman($start,$per_page); //menghitung 
				
				if($pages==0){echo "Data tidak ditemukan"; }
	
	
	
	
	foreach($halaman as $halaman){	
		
		echo "
		<tr>
			<td>".$no."</td>

			<td>".stripslashes (htmlspecialchars ($halaman['judul_halaman_id']))."</td>
			<td>".stripslashes (htmlspecialchars ($halaman['judul_halaman_en']))."</td>

			<td>".substr(strip_tags($halaman['konten_id']),0,110)."</td>
			<td>".substr(strip_tags($halaman['konten_en']),0,110)."</td>

			<td> 
		
		
			<div class='btn-group btn-group-xs'><a href='".URL."halaman/edit/".$halaman['id_halaman']."' class='btn btn-xs btn-info' data-toggle='tooltip' title='Edit'><i class='glyphicon glyphicon-pencil'></i></a></div>

		 &nbsp  ";
		if($halaman['atribut']=='added'){
			echo"
			<div class='btn-group btn-group-xs'><a href='".$aksi."hapus&id=".$halaman['id_halaman']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Hapus' onclick='return confirm(\"Apakah Anda benar-benar ingin menghapus item ini?\");'><i class='glyphicon glyphicon-remove'></i></a></div>";
		}
		echo "
		</tr>
		
		";
		$no++;
	}
	echo "
	</tbody>	
	</table>
	";
	
	echo "<center><ul class='pagination pagination-small center m-t-none m-b-none'>";

			// $req = empty($_REQUEST['view'])?'':$_REQUEST['view']; // mencari kata carinya
			
			$root = URL.'halaman';//$_SERVER['PHP_SELF']; //."?view=".$req."&"; 
			
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

 $id= $parameter;

	echo "
	<div class='panel panel-default'>
		<div class='panel-heading text-center'>
			<strong>Form Tambah Halaman</strong>
		</div>
		<div class='panel-body'>
		<form role='form' enctype='multipart/form-data' action='".$aksi."tambah' method='POST' name='form' class='form-horizontal'>
			<div class='form-group'>											
				<label class='control-label' >Judul Halaman (Indonesia) <span class='text-danger'>*</span></label>
				<div class='controls'>
					<input type='text' class='form-control' name='judul_id' id='judul' placeholder='Judul Halaman' required />
					<input type='hidden' class='form-control' value='".$id."' name='id' id='judul' placeholder='judul'  />
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			<div class='form-group'>											
				<label class='control-label' >Judul Halaman (Inggris) <span class='text-danger'>*</span></label>
				<div class='controls'>
					<input type='text' class='form-control' name='judul_en' id='judul' placeholder='Title' required />
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->

			<div class='form-group'>											
				<label class='control-label' >Konten (Indonesia)</label>
				<div class='controls'>
					<textarea name='konten_id' class='form-control'>
					</textarea>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			
			<div class='form-group'>											
				<label class='control-label' >Konten (Inggris)</label>
				<div class='controls'>
					<textarea name='konten_en' class='form-control'>
					</textarea>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			
			<div class='form-group'>											
				<label class='control-label' >Gambar </label>
				<div class='controls'>
					<label > *.png | *.jpg dibawah 1 MB (jika ada) {Gambar disarankan memiliki tinggi <b color='red'>400px</b>}</label>
					<div class='controls'>
					<input type='file' name='file' id='uploadFile' accept='image/*' >
					</div>
					
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			
			<div class='form-group' style='display:none;'>
				<label class='col-md-2' style='padding-left: 0;'>Publish</label>
				<div class='col-md-10'>
					<label class='radio-inline'><input type='radio' name='publish' value='Y' checked='checked' >Y</label>
					<label class='radio-inline'><input type='radio' name='publish' value='N'>N</label>
				</div>
			</div>
			
			<div class='form-group'>											
				<label class='control-label' > </label>
				<div class='controls text-center'>
					<button type='submit' class='btn btn-sm btn-primary' name='tambah' value='tambah'><i class='glyphicon glyphicon-check'></i> Simpan</button>
						<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->	
					
		</form>
		
			<br/>
			<div class='panel panel-default'>
				<div class='panel-heading text-center'>
					<strong>Tambahan Berkas</strong>
				</div>
				<br/>
				<form role='form' class='form-horizontal' enctype='multipart/form-data' action='".$aksi."file_tambah' method='POST' name='form' class='form-horizontal'>	
									<label>Keterangan Berkas </label> <input class='form-control' type='text' id='upl' name='judul' /> <br/>
									<label> File (*pdf)</label>
									<input type='file' name='file' accept='application/pdf' />  <br/>
									<input type='hidden' class='form-control' value='".$parameter."' name='id' />
									<input type='submit' name='submit' value='Tambahkan'  class='btn btn-success'>
								</form><br/> 
									
									<table class='table'>";
							
							$file = $halaman->getFile($parameter);
						
								foreach($file as $file){
								echo "<tr> 
										<td>";
									echo "".$file['judul'] ." ";
								
								echo "	</td>
										<td>
											<a href='".$aksi."file_hapus&id=".$file['id'] ."' class='btn btn-danger btn-small'>x </i></a>
										</td>
									 </tr>";
								}
						
						
						
						echo "  
									</table>
			</div>
			
			<div class='form-group'>											
				<div id='imagePreview' style='width:900px; height:300px;'></div>		
			</div> <!-- /form-group -->
					
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
		</div> <!-- /panel -->
	</div> <!-- /Wrapper -->
		
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
	 $detail = $halaman->getHalamanById($parameter);
	 
	 $id = $parameter;
	
	echo "
	<div class='panel panel-default'>
		<div class='panel-heading text-center'>
			<strong>Form Edit Halaman</strong>
		</div>
		<div class='panel-body'>
		<form role='form' enctype='multipart/form-data' action='".$aksi."edit' method='POST' name='form' class='form-horizontal'>
			<div class='form-group'>											
				<label class='control-label' >Judul Halaman (Indonesia) <span class='text-danger'>*</span></label>
				<div class='controls'>
					<input type='text' class='form-control' name='judul_halaman_id' value='".$detail['judul_halaman_id']."' id='judul' placeholder='Judul Halaman' required />
					<input type='hidden' class='form-control' value='".$id."' name='id' id='judul' placeholder='judul'  />
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			<div class='form-group'>											
				<label class='control-label' >Judul Halaman (Inggris) <span class='text-danger'>*</span></label>
				<div class='controls'>
					<input type='text'  value='".$detail['judul_halaman_en']."' class='form-control' name='judul_halaman_en' id='judul' placeholder='Title' required />
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->

			<div class='form-group'>											
				<label class='control-label' >Konten (Indonesia)</label>
				<div class='controls'>
					<textarea name='konten_id' class='form-control'>
						".$detail['konten_id']."
					</textarea>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			
			<div class='form-group'>											
				<label class='control-label' >Konten (Inggris)</label>
				<div class='controls'>
					<textarea name='konten_en' class='form-control'>
					".$detail['konten_en']."
					</textarea>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->

			
			<div class='form-group'>											
				<label class='control-label' >Gambar </label>
				<div class='row'>
					<div class='col-md-6'>
						<input type='text' readonly class='form-control'  name='gambar' value='".$detail['gambar']."'>
					</div>
					<div class='col-md-6 form-group'>
						<a  href='".$aksi."hapus_gambar&id=".$detail['id_halaman']."' class='btn btn-sm btn-default'> <i class='glyphicon glyphicon-remove'></i> Hapus Gambar</a>
					</div>
				</div>		
			</div> <!-- /controls -->	


			
			<div class='form-group'>											
				<label class='control-label' >Gambar </label>
				<div class='controls'>
					<label > *.png | *.jpg dibawah 1 MB (jika ada) {Gambar disarankan memiliki tinggi <b color='red'>400px</b>}</label>
					<div class='controls'>
					<input type='file' name='file' id='uploadFile' accept='image/*' >
					</div>
					
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			
			<div class='form-group' style='display:none;'>
				<label class='col-md-2' style='padding-left: 0;'>Publish</label>
				<div class='col-md-10'>";
				
				if($detail['publish'] == 'Y'){
					echo "
					<label class='radio-inline'><input type='radio' name='publish' value='Y' checked='checked' >Y</label>
					<label class='radio-inline'><input type='radio' name='publish' value='N'>N</label>";
				}else{
					echo "
					<label class='radio-inline'><input type='radio' name='publish' value='Y'>Y</label>
					<label class='radio-inline'><input type='radio' name='publish' value='N' checked='checked'>N</label>";	
				}
					
				echo "
					</div>
			</div>
			
			<div class='form-group'>											
				<label class='control-label' > </label>
				<div class='controls text-center'>
					<button type='submit' class='btn btn-sm btn-primary' name='tambah' value='tambah'><i class='glyphicon glyphicon-check'></i> Simpan</button>
						<button type='reset' class='btn btn-sm btn-danger' onclick='self.history.back()'><i class='glyphicon glyphicon-remove'></i> Batal</button>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->	
					
		</form>
		
						  <br/>
			<div class='panel panel-default'>
				<div class='panel-heading text-center'>
					<strong>Tambahan Berkas</strong>
				</div>
				<br/>
				<form role='form' class='form-horizontal' enctype='multipart/form-data' action='".$aksi."file_tambah' method='POST' name='form' class='form-horizontal'>	
									<label>Keterangan Berkas </label> <input class='form-control' type='text' id='upl' name='judul' /> <br/>
									<label> File (*pdf)</label>
									<input type='file' name='file' accept='application/pdf' />  <br/>
									<input type='hidden' class='form-control' value='".$parameter."' name='id' />
									<input type='submit' name='submit' value='Tambahkan'  class='btn btn-success'>
								</form><br/> 
									
									<table class='table'>";
							
							$file = $halaman->getFile($parameter);
						
								foreach($file as $file){
								echo "<tr> 
										<td>";
									echo "".$file['judul'] ." ";
								
								echo "	</td>
										<td>
											<a href='".$aksi."file_hapus&id=".$file['id'] ."' class='btn btn-danger btn-small'>x </i></a>
										</td>
									 </tr>";
								}
						
						
						
						echo "  
									</table>
			</div>
			
						  <div id='imagePreview' >
							
						  </div>
								<img src='../../../upload/".$detail['gambar']."' style='width:200px; height:150px;'></img>
						</div>
	
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
		</div> <!-- /panel -->
	</div> <!-- /wrapper-->
		
	";

break;

}else{
		header("location:".URL."halaman");
		return false;
	}
}

?>
<script type='text/javascript'> 
 
document.getElementById("uraian").value = "";
document.getElementById("upl").value = "";

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