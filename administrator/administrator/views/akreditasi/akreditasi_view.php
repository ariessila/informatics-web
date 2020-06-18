<?php 
if(isset($model)):
date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/akreditasi/akreditasi_control.php?model=akreditasi&method="; // halaman untuk eksekusi


echo "
<div class='row-fluid'>
	<div class='span12'>
		<!-- BEGIN BASIC PORTLET-->
		<div class=''>
		
		<div class='widget-body'>
";


// var_dump($method);
switch($method){

default :
	echo "
			<div style='float:left; '><a href='".URL."akreditasi/tambah' class='btn btn-primary'>Tambah Dokumen</a>
			</div>
		";
	
	echo "
	
	<br/>
	<br/>
	<table id='example2' class='table table-bordered table-striped ' >
	<thead>
		<tr >
			<th>No</th>
			<th>Nama Dokumen</th>
			<th>Keterangan Dokumen</th>
			<th style='width:100px;'>Tanggal</th>
			<th>Tindakan</th>
		</tr>
		
	</thead>
	<tbody>
	" ; // header tabel
	
	
	
		$find = '';
	if(isset($_REQUEST['cari'])){
		$katacari = $_REQUEST['katacari'];
		$find="&cari=h928hsolkcvnbw21&katacari=$katacari";
			
			$semua =  $dokumen_akreditasi->countCariAkreditasi($katacari);
			
		}
		$semua =  $dokumen_akreditasi->countAkreditasi();
		
		$per_page = 17; // jumlah query per event 
	
		$i= 1;
			
		$pages = ceil($semua / $per_page); // melihat total blok yang ada
		
		$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
		
		$start = ($page-1)*$per_page; //startnya 
		
		$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap paging
		
		// $dokumen_akreditasis = (isset($_REQUEST['cari']))?$dokumen_akreditasi->cariAkreditasi($katacari,$start,$per_page):$dokumen_akreditasi->getAkreditasi($start,$per_page); //logika inti : kalo cari terisi maka ke method cari event 
		
		$dokumen_akreditasis = $dokumen_akreditasi->getAkreditasi($start,$per_page);
		if($pages==0){echo "Data tidak ditemukan"; }
	
	foreach($dokumen_akreditasis as $dokumen_akreditasis){	
		
		echo "
		<tr>
			<td>".$no."</td>

			<td>".stripslashes (htmlspecialchars ($dokumen_akreditasis['nama_dokumen']))."</td>

			<td>".substr(strip_tags($dokumen_akreditasis['keterangan_dokumen']),0,110)."</td>
			
			<td>".date('d-m-Y',strtotime($dokumen_akreditasis['waktu']))."</td>

		
		<td>
		
		<div class='btn-group'>
			<button data-toggle='dropdown' class='btn btn-small btn-primary dropdown-toggle'>Tindakan <span class='caret'></span></button>
				 <ul class='dropdown-menu'>
					 <li><a target='_blank' href='".ROOT."administrator/dokumen_akreditasi/".$dokumen_akreditasis['nama_file']."'><i class=' icon-edit'></i>Download </a></li>
					 <li><a href='".URL."akreditasi/edit/".$dokumen_akreditasis['id']."'><i class=' icon-edit'></i>Edit </a></li>
					 <li><a href=\"javascript: hapusAlert('".$dokumen_akreditasis['id']."');\"><i class=' icon-trash'></i>Hapus</a></li>
					
				 </ul>
			 </div>
		
		</td>
	
		</tr>
		
		";
		$no++;
	}
	
	echo "
	</tbody>	
	</table>

	";
	echo "<center >
		<div class='pagination'>
	<ul class='pagination pagination-small center m-t-none m-b-none'>";

			// $req = empty($_REQUEST['view'])?'':$_REQUEST['view']; // mencari kata carinya
			
			$root = URL.'event';//$_SERVER['PHP_SELF']; //."?view=".$req."&"; 
			
			$blok = 10;
			$ini  = ceil($page/$blok);
			
			$mulai   =  ($blok * $ini) - ($blok-1);
			$selesai =  ($blok<=$pages)?($ini * $blok):$pages ;
			
			$kurang1 = $page -1;
			$tambah1 = $page +1 ;
			
			if($pages >=1 && $page<=$pages){

				echo ($page!=1 or empty($page))?"<li style='cursor:pointer;'  ><a href='$root&hal=$kurang1$find'> Back </a> </li> ":'';
				for($x=$mulai; $x<=$selesai; $x++)
					if($x==$page){
						
						echo "<li style='cursor:pointer;' class='active' > <a>$x</a></li> ";
					}
					else{ 
						echo "<li style='cursor:pointer;'  ><a href='$root?hal=$x$find'>$x</a></li> ";
					};
				
				echo ($page!=$pages)?"<li style='cursor:pointer;'  ><a href='$root?hal=$tambah1$find'> Next </a> </li> ":'';
									
				
			};
	echo "</ul> </div></center>";

	break;

case "tambah":
// ($judul_id,$link,$konten_id,$gambar,$tanggal_mulai,$tanggal_selesai,$tempat,$konten_en,$judul_en,$penulis); //
	echo "
<div class='panel panel-default'>
	<div class='panel-heading text-center'>
		<strong>akreditasi</strong>
	</div>
	<div class='panel-body'>
		<form role='form' enctype='multipart/form-data' action='".$aksi."tambah' method='POST' name='form' class='form-horizontal'>
					
				<div class='control-group'>
						<label class='control-label'>Nama Dokumen Akreditasi</label>
					<div class='controls'>
						<input type='judul' class='form-control' name='nama_dokumen' id='Nama Akreditasi' placeholder='Nama Dokumen' required>
					</div>
				</div>
				
				<div class='control-group'>
						<label class='control-label'> Keterangan Dokumen</label>
					<div class='controls'>
						<input type='judul' class='form-control' name='keterangan_dokumen' id='Keterangan Dokumen' placeholder='Keterangan Dokumen' required>
					</div>
				</div>


				<!-- <div class='control-group'>											
					<label class='control-label' >Gambar</label>
					<div class='controls'>
						*Format Gambar hanya png dan jpg<br/>
						<input type='file' name='file' />  <br/>	
						<input type='hidden' class='form-control' value='' name='id' />
					</div> 			
				</div>  -->
				
			<br/>
			<div class='control-group'>
					<label class='control-label'> Submit </label>
				<div class='controls'>
					<button type='submit' name='submit' value='tambah dokumen' class='btn btn-primary'> Buat </button>
				</div>
			</div>
				<div id='imagePreview' style='width:400px; height:366px;'></div>
		</form>
	</div> 
</div> 

	";

break;
	
case "edit":
	// var_dump($parameter);
	if(filter_var($parameter, FILTER_VALIDATE_INT)){

	$dokumen_akreditasi = $dokumen_akreditasi->getEventById($parameter);

	echo "
<div class='panel panel-default'>
	<div class='panel-heading text-center'>
		<strong>Akreditasi</strong>
	</div>
	<div class='panel-body'>
		<form role='form' enctype='multipart/form-data' action='".$aksi."edit' method='POST' name='form' class='form-horizontal'>
							
			<div class='control-group'>
					<label class='control-label'>Nama Akreditasi</label>
				<div class='controls'>
					<input type='text' class='form-control' value='".$dokumen_akreditasi['judul_id']."' name='judul_id' id='judul' placeholder='judul' required>
					<input type='hidden' class='form-control' value='".$dokumen_akreditasi['id']."' name='id'  required>
					<input type='hidden' class='form-control' value='".$dokumen_akreditasi['gambar']."' name='gambar'   required>
				</div>
			</div>
							
			<div class='control-group'>
					<label class='control-label'>Nama Agenda</label>
				<div class='controls'>
					<input type='text' class='form-control' value='".$dokumen_akreditasi['judul_en']."' name='judul_en' id='judul' placeholder='judul' required>
				</div>
			</div>
							
			<div class='control-group'>
				<label class='control-label'>Konten</label>
				<div class='controls'>
					<textarea name='konten_id'class='form-control'>
					
						".$dokumen_akreditasi['konten_id']."
					
					</textarea>
				</div>
			</div>
						
			<div class='control-group'>
				<label class='control-label'>Konten</label>
				<div class='controls'>
					<textarea name='konten_en'class='form-control'>
					
						".$dokumen_akreditasi['konten_en']."
					
					</textarea>
				</div>
			</div>
			
			<div class='control-group'>
					<label class='control-label'>Tanggal Mulai</label>
				<div class='controls'>
					<input type='text' id='dp1'  value='".date('d-m-Y',strtotime($dokumen_akreditasi['tanggal_mulai']))."' name='tanggal_mulai' value='".date("d/m/Y")."'>
				</div>
			</div>
						
			<div class='control-group'>
					<label class='control-label'>Tanggal Selesai</label>
				<div class='controls'>
					<input type='text' id='dp2' value='".date('d-m-Y',strtotime($dokumen_akreditasi['tanggal_selesai']))."' name='tanggal_selesai' value='".date("d/m/Y")."'>
				</div>
			</div>
				
			<div class='control-group'>
					<label class='control-label'>Tempat</label>
				<div class='controls'>
					<input type='text'  name='tempat' value='".$dokumen_akreditasi['tempat']."' >
				</div>
			</div>	
			<div class='control-group'>
					<label class='control-label'> </label>
				<div class='controls'>
					<button type='submit' name='tambah' value='tambah' class='btn btn-primary'>Submit</button>
				</div>
			</div>
				
		</form>
	</div>
</div>
	";

break;

}else{
		header("location:".URL."akreditasi");
		return false;
	}
}

?>
<script type='text/javascript'> 
 function hapusAlert(iddokumen){
		var conBox = confirm("Anda yakin ingin menghapus data ini?");
		if(conBox){ 
			location.href="<?php echo $aksi."hapus" ;?>&id="+ iddokumen;
		}else{
			return false;
		}
	};

</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
    $(function() {
    $( "#dp1" ).datepicker({
							  dateFormat: "dd-mm-yy"
							});
    $( "#dp2" ).datepicker({
							  dateFormat: "dd-mm-yy"
							});
  });
  </script>
<?php 

echo "
		</div>
	</div>
</div>
";
endif;
?>