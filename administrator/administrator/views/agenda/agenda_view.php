<?php 
if(isset($model)):
date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/agenda/agenda_control.php?model=agenda&method="; // halaman untuk eksekusi


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
			<div style='float:left; '><a href='".URL."agenda/tambah' class='btn btn-primary'>Tambah Agenda</a>
			</div>
		";
	
	echo "
	
	<br/>
	<br/>
	<table id='example2' class='table table-bordered table-striped ' >
	<thead>
		<tr >
			<th>No</th>
			<th>Judul</th>
			<th>Deskripsi Kegiatan</th>
			<th style='width:100px;'>Tanggal </th>
			<th>Tindakan</th>
		</tr>
		
	</thead>
	<tbody>
	" ; // header tabel
	
	
	
		$find = '';
	if(isset($_REQUEST['cari'])){
		$katacari = $_REQUEST['katacari'];
		$find="&cari=h928hsolkcvnbw21&katacari=$katacari";
			
			$semua =  $event->countCariEvent($katacari);
			
		}
	
		$semua =  $event->countEvent();
		
		$per_page = 17; // jumlah query per event 
	
		$i= 1;
			
		$pages = ceil($semua / $per_page); // melihat total blok yang ada
		
		$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
		
		$start = ($page-1)*$per_page; //startnya 
		
		$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap paging
		
		$event = (isset($_REQUEST['cari']))?$event->cariEvent($katacari,$start,$per_page):$event->getEvent($start,$per_page); //logika inti : kalo cari terisi maka ke method cari event 
		
		// var_dump($event->getEvent($start,$per_page));
		
		if($pages==0){echo "Data tidak ditemukan"; }
	
	foreach($event as $event){	
		
		echo "
		<tr>
			<td>".$no."</td>

			<td>".stripslashes (htmlspecialchars ($event['judul_id']))."</td>

			<td>".substr(strip_tags($event['konten_id']),0,110)."</td>
			
			<td>".date('d-m-Y',strtotime($event['tanggal_mulai']))."</td>

		
		<td>
		
		<div class='btn-group'>
			<button data-toggle='dropdown' class='btn btn-small btn-primary dropdown-toggle'>Tindakan <span class='caret'></span></button>
				 <ul class='dropdown-menu'>
					 <li><a href='".URL."agenda/edit/".$event['id']."'><i class=' icon-edit'></i>Edit </a></li>
					 <li><a href=\"javascript: hapusAlert('".$event['id']."');\"><i class=' icon-trash'></i>Hapus</a></li>
					
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
		<strong>Agenda</strong>
	</div>
	<div class='panel-body'>
		<form role='form' enctype='multipart/form-data' action='".$aksi."tambah' method='POST' name='form' class='form-horizontal'>
					
				<div class='control-group'>
						<label class='control-label'>Judul Agenda Indonesia</label>
					<div class='controls'>
						<input type='judul' class='form-control' name='judul_id' id='Nama Agenda' placeholder='Nama Agenda' required>
					</div>
				</div>

				<div class='control-group'>
						<label class='control-label'>Judul Agenda Inggris</label>
					<div class='controls'>
						<input type='judul' class='form-control' name='judul_en' placeholder='Title' required>
					</div>
				</div>
				
				<div class='control-group'>
						<label class='control-label'> Konten Id</label>
					<div class='controls'>
						<textarea name='konten_id' class='form-control'> </textarea>
					</div>
				</div>
				
				<div class='control-group'>
						<label class='control-label'> Konten Inggris</label>
					<div class='controls'>
						<textarea name='konten_en' class='form-control'> </textarea>
					</div>
				</div>
				
				<!--<div class='control-group'>
						<label class='control-label'>Gambar :</label>
					<div class='controls'>
						<label class=''>*.png | *.jpg dibawah 1 MB (jika ada)</label>
						<input type='file' name='file' id='uploadFile' accept='image/*' >
					</div>
					 
				</div>-->
			
				<div class='control-group'>
						<label class='control-label' >Tanggal Mulai</label>
					<div class='controls'>
						<input type='text'  id='dp1' name='tanggal_mulai' class='span4' />
					</div>
				</div>
				<div class='control-group'>
						<label class='control-label' >Tanggal Selesai</label>
					<div class='controls'>
						<input type='text'  id='dp2' name='tanggal_selesai' class='span4' />
					</div>
				</div>
				<div class='control-group'>
						<label class='control-label'>Tempat</label>
					<div class='controls'>
						<input type='text'  name='tempat' class='span4' >
					</div>
				</div>
				
			<br/>
			<div class='control-group'>
					<label class='control-label'> </label>
				<div class='controls'>
					<button type='submit' name='tambah' value='tambah agenda' class='btn btn-primary'> Buat </button>
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

	$event = $event->getEventById($parameter);

	echo "
<div class='panel panel-default'>
	<div class='panel-heading text-center'>
		<strong>Agenda</strong>
	</div>
	<div class='panel-body'>
		<form role='form' enctype='multipart/form-data' action='".$aksi."edit' method='POST' name='form' class='form-horizontal'>
							
			<div class='control-group'>
					<label class='control-label'>Nama Agenda</label>
				<div class='controls'>
					<input type='text' class='form-control' value='".$event['judul_id']."' name='judul_id' id='judul' placeholder='judul' required>
					<input type='hidden' class='form-control' value='".$event['id']."' name='id'  required>
					<input type='hidden' class='form-control' value='".$event['gambar']."' name='gambar'   required>
				</div>
			</div>
							
			<div class='control-group'>
					<label class='control-label'>Nama Agenda</label>
				<div class='controls'>
					<input type='text' class='form-control' value='".$event['judul_en']."' name='judul_en' id='judul' placeholder='judul' required>
				</div>
			</div>
							
			<div class='control-group'>
				<label class='control-label'>Konten</label>
				<div class='controls'>
					<textarea name='konten_id'class='form-control'>
					
						".$event['konten_id']."
					
					</textarea>
				</div>
			</div>
						
			<div class='control-group'>
				<label class='control-label'>Konten</label>
				<div class='controls'>
					<textarea name='konten_en'class='form-control'>
					
						".$event['konten_en']."
					
					</textarea>
				</div>
			</div>
			
			<div class='control-group'>
					<label class='control-label'>Tanggal Mulai</label>
				<div class='controls'>
					<input type='text' id='dp1'  value='".date('d-m-Y',strtotime($event['tanggal_mulai']))."' name='tanggal_mulai' value='".date("d/m/Y")."'>
				</div>
			</div>
						
			<div class='control-group'>
					<label class='control-label'>Tanggal Selesai</label>
				<div class='controls'>
					<input type='text' id='dp2' value='".date('d-m-Y',strtotime($event['tanggal_selesai']))."' name='tanggal_selesai' value='".date("d/m/Y")."'>
				</div>
			</div>
				
			<div class='control-group'>
					<label class='control-label'>Tempat</label>
				<div class='controls'>
					<input type='text'  name='tempat' value='".$event['tempat']."' >
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
		header("location:".URL."agenda");
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