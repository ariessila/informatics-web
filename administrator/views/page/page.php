<?php 
if(isset($parameter)):	

$a = explode('-',$parameter);
$page = $a[0];
if(is_numeric($page)){

?>
<div class='container--content--page'>

	<div class='content'>

		<div class='content--main'>

			<div class='main--section'>

				
				<?php 
				$method  = filter_var($method,FILTER_VALIDATE_INT);
				
				
				$detail = $halaman->getHalamanById($page);
				
					if(!empty($detail['gambar'])){
						$sambutan = ($detail['id_halaman']==10)?"style='width:200px; height:160px; margin-top:30px;'":'';
						
					echo"<div class='main--section__featured-image'>"; 	
							
						
						echo "<center><img $sambutan src='".ROOT."upload/".$detail['gambar']."'/></center>"; //dummy
					
					
					echo"</div>";
					
					}{
						echo "<div id='picture' height='400px'></div>";
						
					};
						// echo "<img src='".ROOT."images/content/featured-images/selayang-pandang.jpg'/>";
				
				?>
				
				

				<div class='main--section__title'>

					<h1>
						<?php echo ($model=='id')?$detail['judul_halaman_id']:$detail['judul_halaman_en'] ;?>
					</h1>

				</div>

				<div class='main--section__content'>

					<div class='main--content--text'>
					   <?php echo ($model=='id')?$detail['konten_id']:$detail['konten_en'];
					   
					   ?>

					</div>
					<?php
						$uraian = $halaman->getUraian($page);
						if(!empty($uraian)){
							$no=1;
					echo "<ul class='mission-list'>";
							foreach($uraian as $uraian){
					  
					  echo "<li>
								<span class='mission-list__number'>".$no."</span>
								<p>".$uraian['uraian']."</p>
							</li>";
								
								$no++;
								
							}
							
					echo "</ul>";	
						}

						$file = $halaman->getFile($detail['id_halaman']);

						if(!empty($file)){
							
							echo "<ul class='download-list'>
										<li class='download-list__header'>
											Berkas
										</li>";
									foreach($file as $file){
							echo "		<li>
											<a target='_blank' href='".ROOT."files/".$file['nama_file']."'><i class='fa fa-file-pdf-o widget__icon'></i> ".$file['judul']."</a>
										</li>";
									}
										
							echo "</ul>
									
								 ";
							
							
						}
					if($page == 21){//dokumen akreditasi

			echo "
			<h1>Dokumen Akreditasi</h1>
			<table class='table' border='1'>
				<tr>
					<td style='padding: 10px;'><a href='".ROOT."id/page/22'>STANDAR 1 : VISI, MISI, TUJUAN DAN SASARAN, SERTA STRATEGI PENCAPAIAN</a></td>
				</tr>
				<tr  style='border-bottom:1px solid #c8c8c8;'></tr>
				<tr>
					<td style='padding: 10px;'><a href='".ROOT."id/page/23'>STANDAR 2 : TATA PAMONG, KEPEMIMPINAN, SISTEM PENGELOLAAN, DAN PENJAMINAN MUTU</a></td>
				</tr>
				<tr  style='border-bottom:1px solid #c8c8c8;'></tr>
				<tr>
					<td style='padding: 10px;'><a href='".ROOT."id/page/24'>STANDAR 3 : MAHASISWA DAN LULUSAN </a></td>
				</tr>
				<tr  style='border-bottom:1px solid #c8c8c8;'></tr>
				<tr>
					<td style='padding: 10px;'><a href='".ROOT."id/page/25'>STANDAR 4 : SUMBER DAYA MANUSIA</a></td>
				</tr>
				<tr  style='border-bottom:1px solid #c8c8c8;'></tr>
				<tr>
					<td style='padding: 10px;'><a href='".ROOT."id/page/26'>STANDAR 5 : KURIKULUM, PEMBELAJARAN, DAN SUASANA AKADEMIK </a></td>
				</tr>
				<tr  style='border-bottom:1px solid #c8c8c8;'></tr>
				<tr>
					<td style='padding: 10px;'><a href='".ROOT."id/page/27'>STANDAR 6 : PEMBIAYAAN, SARANA DAN PRASARANA, SERTA SISTEM INFORMASI</a></td>
				</tr>
				<tr  style='border-bottom:1px solid #c8c8c8;'></tr>
				<tr>
					<td style='padding: 10px;'><a href='".ROOT."id/page/28'>STANDAR 7 : PENELITIAN, PELAYANAN/PENGABDIAN KEPADA MASYARAKAT, DAN KERJASAMA</a></td>
				</tr>
			</table>
			";
					}
					// ini bagian untuk memunculkan dokumen
					if($page == 22){
						$dosen = $dosen->dokumenAkreditasiStandar1();
						echo '<a href="'.ROOT.'id/page/21">Kembali</a>';
						// jangan lupa button untuk kembali ke page 21
						foreach ($dosen as $dosens) {
							echo ' 
								<ul>
									<li><a href="#">'.$dosens['nama_dokumen'].'</a></li>
								</ul>
							';
						}

					}
					if($page == 23){
						$dosen = $dosen->dokumenAkreditasiStandar2();
						echo '<a href="'.ROOT.'id/page/21">Kembali</a>';
						// jangan lupa button untuk kembali ke page 21
						foreach ($dosen as $dosens) {
							echo '
								<ul>
									<li><a href="#">'.$dosens['nama_dokumen'].'</a></li>
								</ul>
							';
						}

					}
					if($page == 24){
						$dosen = $dosen->dokumenAkreditasiStandar3();
						echo '<a href="'.ROOT.'id/page/21">Kembali</a>';
						// jangan lupa button untuk kembali ke page 21
						foreach ($dosen as $dosens) {
							echo ' 
								<ul>
									<li><a href="#">'.$dosens['nama_dokumen'].'</a></li>
								</ul>
							';
						}

					}
					if($page == 25){
						$dosen = $dosen->dokumenAkreditasiStandar4();
						echo '<a href="'.ROOT.'id/page/21">Kembali</a>';
						// jangan lupa button untuk kembali ke page 21
						foreach ($dosen as $dosens) {
							echo ' 
								<ul>
									<li><a href="#">'.$dosens['nama_dokumen'].'</a></li>
								</ul>
							';
						}

					}
					if($page == 26){
						$dosen = $dosen->dokumenAkreditasiStandar5();
						// jangan lupa button untuk kembali ke page 21
						echo '<a href="'.ROOT.'id/page/21">Kembali</a>';
						foreach ($dosen as $dosens) {
							echo ' 
								<ul>
									<li><a href="#">'.$dosens['nama_dokumen'].'</a></li>
								</ul>
							';
						}

					}
					if($page == 27){
						$dosen = $dosen->dokumenAkreditasiStandar6();
						echo '<a href="'.ROOT.'id/page/21">Kembali</a>';
						// jangan lupa button untuk kembali ke page 21
						foreach ($dosen as $dosens) {
							echo ' 
								<ul>
									<li><a href="#">'.$dosens['nama_dokumen'].'</a></li>
								</ul>
							';
						}

					}
					if($page == 28){
						$dosen = $dosen->dokumenAkreditasiStandar7();
						// jangan lupa button untuk kembali ke page 21
						echo '<a href="'.ROOT.'id/page/21">Kembali</a>';
						foreach ($dosen as $dosens) {
							echo ' 
								<ul>
									<li><a href="#">'.$dosens['nama_dokumen'].'</a></li>
								</ul>
							';
						}

					}


					if($page == 17){ //pengelola
						
						$staf = $staf->getPengelola();
						echo "
						<table class='table'><tbody>";
						foreach($staf as $staf){
						
						echo "
							<tr>
								<td rowspan='3' valign='top' style='width:200px; padding-bottom:10px; padding-top:10px;'>";
								if($staf['foto_pengelola'] == ''){
									echo "<img src='".ROOT."images/content/organization/default99.jpg' height='150px' width='150px'>";
									
								}else{
								echo"
								<img src='".ROOT."images/content/organization/".$staf['foto_pengelola']."' height='150px' width='150px'>";
								}
								
								echo "
								</td>
									<td><strong>".$staf['jabatan_pengelola']."</strong></td>
								</tr>
								<tr>
									<td>".$staf['nama_pengelola']."</td>
								</tr>
								<tr >
									<td>".$staf['nip']."</td>
								</tr>
							</tr>
							<tr  style='border-bottom:1px solid #c8c8c8;'></tr>
							";
							
						}
						echo "
								</tbody>
								</table>
						";
						
						
					}
					
					if($page == 4){ // peneliti
						
							
					$semua =  $penelitian->countPenelitian();

					$per_page = 20; // jumlah query per 

					$i= 1;

					$pages = ceil($semua / $per_page); // melihat total blok yang ada

					$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
					
					$page = filter_var($page,FILTER_VALIDATE_INT);
					
					$start = ($page-1)*$per_page; //startnya 

					$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging

					$peneliti = $penelitian->getPenelitian($start,$per_page); //menghitung 


					if($pages==0){echo "Data tidak ditemukan"; }

					if ($model == 'en') {
						
				echo "<table class='table' style='width:100%;'>
					<thead><tr style='border-top: 1px solid #c8c8c8; border-bottom: 1px solid #c8c8c8;margin-top:10px;'>
						<th style='height:50px;'>No.</th>
						<th style='width:325px;'>Title</th>
						<th style='width:130px;'>Authors</th>
						<th>Funding</th>
					
					</tr></thead><tbody>";
					} else{

				echo "<table class='table' style='width:100%;'>
					<thead><tr style='border-top: 1px solid #c8c8c8; border-bottom: 1px solid #c8c8c8;margin-top:10px;'>
						<th style='height:50px;'>No.</th>
						<th style='width:325px;'>Judul Penelitian</th>
						<th style='width:130px;'>Peneliti</th>
						<th>Sumber Dana</th>
					
					</tr></thead><tbody>";
					}


					
						$tahun = '';
						
					foreach($peneliti as $peneliti){
						
						if($tahun != $peneliti['tahun_penelitian']){
							$tahun = $peneliti['tahun_penelitian'];
							
						echo "
							<tr style='border-bottom: 1px solid #c8c8c8; margin-top:100px; '>
								<td colspan='4' style='height:40px; text-align:center;'><b>".$tahun."</b></td>
								
							</tr>";
						}
						
						echo "
						<tr style='border-bottom: 1px solid #c8c8c8; margin-top:100px; '>
							<td style='height:70px;'>".$no."</td>

							 <td style='width:60%; '><a href='".ROOT.$model.'/penilitian/'.$peneliti['id_penelitian'].'-'.$peneliti['link']."'>".$peneliti['judul_penelitian']."</a></td>
						

							<td style='text-align:center;'>".$peneliti['ketua_penelitian']."<br/>";
							
							$anggota = $penelitian->getAnggotaPenelitianById($peneliti['id_penelitian']);
							foreach($anggota as $anggota){
								echo $anggota['nama_dosen'].'<br/>';
							}
							echo "</td>
							<td style='text-align:center;'>".$peneliti['sumber_dana']."</td>
							
						</tr>";
						
						
						$no++;
					}
					echo "
					</tbody>
				</table>
				
				";
				
				echo "<center> <div class='pagination clearfix'> <ul>";
				
				$root = '';
				
				$blok = 10;
				$ini  = ceil($page/$blok);
				
				$mulai   =  ($blok * $ini) - ($blok-1);
				$selesai =  ($blok<=$pages)?($ini * $blok):$pages ;
				
				$kurang1 = $page -1;
				$tambah1 = $page +1 ;
				
				if($pages >=1 && $page<=$pages){

				echo ($page!=1 or empty($page))?"<a href='$root&hal=$kurang1'> Back </a> ":'';
				for($x=$mulai; $x<=$selesai; $x++)
					if($x==$page){
						
						echo "<strong>".$x." </strong> ";
						
					}
					else{ 
						echo "<a href='$root?hal=$x'>$x</a> ";
					};
				
				echo ($page!=$pages)?"<a href='$root?hal=$tambah1'> Next </a>  ":'';
									
							
				};
				echo "</ul> </div></center>";
						
				}
					
				if($page == 19){ // pengabdian masyarakat
					
						
					$semua =  $pengabdian->countPengabdian();

					$per_page = 20; // jumlah query per 

					$i= 1;

					$pages = ceil($semua / $per_page); // melihat total blok yang ada

					$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
					
					$page = filter_var($page,FILTER_VALIDATE_INT);
					
					$start = ($page-1)*$per_page; //startnya 

					$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging

					$abdi = $pengabdian->getPengabdian($start,$per_page); //menghitung 

					if($pages==0){echo "Data tidak ditemukan"; }



				if ($model == 'en') {
					echo "<table class='table' style=' width:100%;'>
					<thead><tr style='border-bottom: 1px solid #c8c8c8;'>
						<th style='height:50px;'>No.</th>
						<th style='width:325px;'>Titles</th>
						<th>Authors</th>
						<th>Funded By</th>
			
					</tr></thead><tbody>";
				}else{
					echo "<table class='table' style=' width:100%;'>
					<thead><tr style='border-bottom: 1px solid #c8c8c8;'>
						<th style='height:50px;'>No.</th>
						<th style='width:325px;'>Judul Pengabdian</th>
						<th>Nama Dosen</th>
						<th>Sumber Dana</th>
			
					</tr></thead><tbody>";
				}
					
					$tahun_abdi = '';
					foreach($abdi as $abdi){
					
					if($tahun_abdi != $abdi['tahun']){
					
						$tahun_abdi = $abdi['tahun'];
							
						echo "
							<tr style='border-bottom: 1px solid #c8c8c8; margin-top:100px; '>
								<td colspan='4' style='height:40px; text-align:center;'><b>".$tahun_abdi."</b></td>
								
							</tr>";
					}
					
					echo "
					<tr style='border-bottom: 1px solid #c8c8c8;'>
						<td style='height:70px;'>".$no."</td>
						<td style='width:60%;'>".$abdi['judul_pengabdian']."</td>
						<td>".$abdi['ketua']."<br/>";
						
						$anggota = $pengabdian->getAnggotaPengabdianById($abdi['id']);
						foreach($anggota as $anggota){
							echo $anggota['nama_dosen'].'<br/>';
						}
						
						echo "</td>
						<td style='text-align:center;'>".$abdi['sumber_dana']."<br/>
						
					</tr>";
					$no++;
					}
					echo "
					</tbody>
				</table>
				
				";
				
				echo "<center> <div class='pagination clearfix'> <ul>";
				
				$root = '';
				
				$blok = 10;
				$ini  = ceil($page/$blok);
				
				$mulai   =  ($blok * $ini) - ($blok-1);
				$selesai =  ($blok<=$pages)?($ini * $blok):$pages ;
				
				$kurang1 = $page -1;
				$tambah1 = $page +1 ;
				
				if($pages >=1 && $page<=$pages){

				echo ($page!=1 or empty($page))?"<a href='$root&hal=$kurang1'> Back </a> ":'';
				for($x=$mulai; $x<=$selesai; $x++)
					if($x==$page){
						
						echo "<strong>".$x." </strong> ";
						
					}
					else{ 
						echo "<a href='$root?hal=$x'>$x</a> ";
					};
				
				echo ($page!=$pages)?"<a href='$root?hal=$tambah1'> Next </a>  ":'';
									
							
				};
				echo "</ul> </div></center>";
						
					}
					
					if($page == 13){ // Publikasi 
					
						
					$semua =  $publikasi->countPublikasi();

					$per_page = 20; // jumlah query per 

					$i= 1;

					$pages = ceil($semua / $per_page); // melihat total blok yang ada

					$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
					
					$page = filter_var($page,FILTER_VALIDATE_INT);
					
					$start = ($page-1)*$per_page; //startnya 

					$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging

					$publik = $publikasi->getPublikasi($start,$per_page); //menghitung 

					if($pages==0){echo "Data tidak ditemukan"; }


					if ($model == 'en') {
						echo "<table class='table' style=' width:100%;'>
					<thead><tr style='border-bottom: 1px solid #c8c8c8; height:50px;'>
						<th>No.</th>
						<th style='width:300px;'>Title</th>
						<th >Description</th>
						<th style='width:220px;'>Authors</th>
						
					</tr></thead><tbody>";
						
					}else{
						echo "<table class='table' style=' width:100%;'>
					<thead><tr style='border-bottom: 1px solid #c8c8c8; height:50px;'>
						<th>No.</th>
						<th style='width:330px;'>Judul Publikasi</th>
						<th >Deskripsi</th>
						<th style='width:220px;'>Nama Dosen</th>
						
					</tr></thead><tbody>";
					}
		
					
					$tahun_publikasi = '';
					
					foreach($publik as $publik){
				
					if($tahun_publikasi != $publik['tahun']){
						$tahun_publikasi = $publik['tahun'];
						
					echo "
						<tr style='border-bottom: 1px solid #c8c8c8; margin-top:100px; '>
							<td colspan='4' style='height:40px; text-align:center;'><b>".$tahun_publikasi."</b></td>
							
						</tr>";
					}
					
						
					echo "
					<tr style='border-bottom: 1px solid #c8c8c8;'>
						<td style='height:70px;'>".$no."</td>
						<td >".$publik['judul']."</td>
						<td style='width:250px;'>".$publik['deskripsi']."<br/>
						<td style='text-align:center;'>".$publik['oleh']."<br/>";
						$anggota = $publikasi->getAnggotaPublikasiById($publik['id']);
						
						foreach($anggota as $anggota){
							echo $anggota['nama_dosen'].'<br/>';
						}
						
						echo "</td>
						
						
					</tr>";
					$no++;
					}
					echo "
					</tbody>
				</table>
				
				";
				
				echo "<center> <div class='pagination clearfix'> <ul>";
				
				$root = '';
				
				$blok = 10;
				$ini  = ceil($page/$blok);
				
				$mulai   =  ($blok * $ini) - ($blok-1);
				$selesai =  ($blok<=$pages)?($ini * $blok):$pages ;
				
				$kurang1 = $page -1;
				$tambah1 = $page +1 ;
				
				if($pages >=1 && $page<=$pages){

				echo ($page!=1 or empty($page))?"<a href='$root&hal=$kurang1'> Back </a> ":'';
				for($x=$mulai; $x<=$selesai; $x++)
					if($x==$page){
						
						echo "<strong>".$x." </strong> ";
						
					}
					else{ 
						echo "<a href='$root?hal=$x'>$x</a> ";
					};
				
				echo ($page!=$pages)?"<a href='$root?hal=$tambah1'> Next </a>  ":'';
									
							
				};
				echo "</ul> </div></center>";
						
					}
					
					
					if($page==5){ // kerja sama

						$semua =  $kerjasama->countKerjasama();

						$per_page = 20; // jumlah query per 

						$i= 1;

						$pages = ceil($semua / $per_page); // melihat total blok yang ada

						$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
						$page = filter_var($page, FILTER_VALIDATE_INT);
						$start = ($page-1)*$per_page; //startnya 

						$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging

						$kerja = $kerjasama->getKerjasama($start,$per_page); //menghitung 
						
						if ($model == 'en') {
							echo "
						<table class='table table-striped' style='width:100%'>
						<thead><tr style='border-bottom: 1px solid #c8c8c8;border-top: 1px solid #c8c8c8;'>
							<th style='height:50px;'>Institution</th>
							<th >Type of Partnership </th>
							<th >Years</th>
							<th >Expires until</th>
						</tr>
						</thead>
							<tbody>";
						}else{
							echo "
						<table class='table table-striped' style='width:100%'>
						<thead><tr style='border-bottom: 1px solid #c8c8c8;border-top: 1px solid #c8c8c8;'>
							<th style='height:50px;'>Institusi</th>
							<th >Jenis Kerjasama</th>
							<th >Tahun</th>
							<th >Masa Berlaku</th>
						</tr>
						</thead>
							<tbody>";
						}
							foreach($kerja as $kerja){
							echo "
							<tr  style='border-bottom: 1px solid #c8c8c8; margin-top:5px; margin-bottom:5px;'>
								<td style='width:20%;text-align:center;'>".$kerja['institusi']."</td>
								
								<td style='height:70px;'>
									".$kerja['jenis_kerjasama']."
								</td>
								<td style='text-align:center;'>".$kerja['tahun']."</td>
								<td style='text-align:center;'>".$kerja['masa_berlaku']."</td>
							</tr>";
							}
							echo "	
							</tbody>
						</table>
						";
								
							// <center>
									// <div class='pagination clearfix'>
										// <a href='#'>First</a>
										
										// <a href='#'>1</a>
										// <strong>2</strong>
										// <a href='#'>3</a>
										
										// <a href='#'>Last</a>
									// </div>								
							// </center>
							
						echo "<center><ul class='pagination pagination-small center m-t-none m-b-none'>";

								
								$root = '';
								
								$blok = 10;
								$ini  = ceil($page/$blok);
								
								$mulai   =  ($blok * $ini) - ($blok-1);
								$selesai =  ($blok<=$pages)?($ini * $blok):$pages ;
								
								$kurang1 = $page -1;
								$tambah1 = $page +1 ;
								
								if($pages >=1 && $page<=$pages){

									echo ($page!=1 or empty($page))?"<a href='$root&hal=$kurang1'> Back </a> ":'';
									for($x=$mulai; $x<=$selesai; $x++)
										if($x==$page){
											
											echo "<strong>$x</strong> ";
											
										}
										else{ 
											echo "<a href='$root?hal=$x'>$x</a>";
										};
									
									echo ($page!=$pages)?"<a href='$root?hal=$tambah1'> Next </a>  ":'';
														
									
								};
						echo "</ul> </center>";
					
					}
					
					
					if($page == 18){ //dosen
						
						$dosen = $dosen->getDosen();
						echo "
						<table class='table'><tbody>";
						foreach($dosen as $dosen){
						$gelar_depan = (!empty($dosen['gelar_depan']))?$dosen['gelar_depan']." ":'';
						
						$gelar_belakang = (!empty($dosen['gelar_belakang']))?', '.$dosen['gelar_belakang']:'';
						
						$emailnya = str_replace('@',' [at] ',$dosen['email_dosen']);

						
						echo "
							<tr>
								<td rowspan='4' valign='top' style='width:200px; padding-bottom:10px; padding-top:10px;'>";
								if(empty($dosen['foto_dosen'])){
									echo "<img src='".ROOT."images/content/organization/default99.jpg' height='150px' width='150px'>";
									
								}else{
								echo"
								<img src='".ROOT."images/content/organization/".$dosen['foto_dosen']."' height='150px' width='150px'>";
								}
								
								echo "
								</td>
									<td> <a href='".ROOT.$model.'/'."dosen/".$dosen['nip']."/'><strong>".$gelar_depan.$dosen['nama_dosen'].$gelar_belakang."</strong>
								</td>
								</tr>
								
								";
								if ($model == 'en') {
									echo "
									<tr>
									<td> <b>Position :</b> ".$dosen['jabatan_dosen']."</td>
								</tr>
								
								<tr>
									<td> <b>Expertise Area</b>: ".$dosen['bidang_penelitian']."</td>
								</tr>
								
								<tr >
									<td> <b>Email : </b>".$emailnya."</td>
								</tr> ";
								}else{
									echo "
									<tr>
									<td> <b>Jabatan :</b> ".$dosen['jabatan_dosen']."</td>
								</tr>
								
								<tr>
									<td> <b>Bidang Keahlian </b>: ".$dosen['bidang_penelitian']."</td>
								</tr>
								
								<tr >
									<td> <b>Email : </b>".$emailnya."</td>
								</tr>
								";
								}
								
							echo "								
							</tr>
							<tr  style='border-bottom: 1px solid #c8c8c8;'><td></hr></td><td></hr></td></tr>
							";
							
						}
						echo "
								</tbody>
								</table>
						";
						
						
					}
					
					
					?>
					
					
					
					
					
				</div>
				
				

			</div>

		</div>


		<?php include "component/sidebar.php";?>

	</div>






	<div class='clear'></div>

</div>

<?php 
}else{
	header('loca 	tion:'.ROOT.'');
}
endif;
?>
