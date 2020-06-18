<?php 
if(isset($parameter)):	

$a = explode('-',$parameter);
$news = $a[0];
$nip =$news;
if(is_numeric($news)){


?>
<div class='container--content--page'>

        		<div class='content'>

        			<div class='content--main'>

        				<div class='main--section'>

							<?php  

							$lec = $dosen->getDosenById($news);

							?>
							<div id='w'>
							<div id='content' class='clearfix'>
							  <div id='userphoto'>
							  <?php
							  if(empty($lec['foto_dosen'])){
								  echo"
									<img src='".ROOT."images/content/organization/default99.jpg' style='width:154px;height:154px;' alt='default avatar'>
								  ";
							  }else{
								  echo"
									<img src='".ROOT."images/content/organization/".$lec['foto_dosen']."' style='width:154px;height:154px;' alt='default avatar'>
								  ";								  
							  }
							  
##navigasi
$gelar_belakang = empty($lec['gelar_belakang'])?'':', '.$lec['gelar_belakang'];
							  echo "
							  
							   </div>
							  <h1>".$lec['gelar_depan']." ".trim($lec['nama_dosen']).$gelar_belakang."</h1>

							  <nav id='profiletabs'>
								<ul class='clearfix'>
							  ";
##navigasi bawaan
								echo "
								<li class='sel'> <a class='sel' href='#Profil'>Profil </a></li>
								<li > <a href='#Publikasi'>Publikasi </a> </li>
								<li > <a href='#Penelitian'>Penelitian </a></li>
								<li > <a href='#Pengabdian'>Pengabdian</a> </li>
								<li > <a href='#Galeri'>Galeri </a> </li>
								";

							  
##akhir navigasi  bawaan	
								$hasil1 = $halaman->getHalamanDosenByNip($nip);
								// var_dump($hasil1);
								foreach($hasil1 as $hasil1){
									if($model == 'id'){
									echo "<li > <a href='#".$hasil1['judul_halaman_id']."'>".$hasil1['judul_halaman_id']." </a> </li>";
										
									}else{
									echo "<li > <a href='#".$hasil1['judul_halaman_en']."'>".$hasil1['judul_halaman_en']." </a> </li>";
										
									}
								
								}
								$hasil = $dosen->getManajemenHalamanByNip($nip);
								// $data = (empty($data))?'[{0}]':$data;

								
##akhirnavigasi
							  
							  ?>
							</ul>
						  </nav>
<?php 
##DEFAULT MENU
			#profil
			$nip = $parameter;
			echo "<section id='Profil' >";
			// $detailing = $dosen->getDosenById($nip);
			// var_dump($detailing);
			
			$emailnya = str_replace('@',' [at] ',$lec['email_dosen']);
				echo "
				<p class='setting'><span>Jabatan </span>".$lec['jabatan_dosen']."</p>
				<p class='setting'><span>Bidang Keahlian  </span>".$lec['bidang_penelitian']."</p>
				<p class='setting'><span>E-mail</span>".$emailnya."</p>
				
				";				
								
			echo "</section>";	
			#akhir profil
			#penelitian dosen
			
			echo "<section id='Penelitian' class='hidden'>";
			
			$thn_penelitian = $penelitian->getTahunPenelitianByNama($lec['nama_dosen']);
			foreach($thn_penelitian as $thn_penelitian){
				echo"<b>".$thn_penelitian['tahun_penelitian']."</b> <ol start='1'>";
				$num = 1;
				$pen = $penelitian->getPenelitianByTahun($lec['nama_dosen'],$thn_penelitian['tahun_penelitian']);
				foreach($pen as $pen){
					$anggota = $penelitian->getAnggotaPenelitianById($pen['id_penelitian']);
					echo "
						<li> 
								".$pen['judul_penelitian']."
						   <br> Oleh: ".$pen['ketua_penelitian'];
						   $member = ', ';
						   foreach($anggota as $anggota){
								$member .= $anggota['nama_dosen'].', ';
						   }
						   echo $member = rtrim($member,', ');

						   echo "     
						   <br> Sumber Dana : ".$pen['sumber_dana']." <br> <br>        
						</li>
					";	
				$num++;
				}
				
				echo "</ol>
						<hr/>
				";
			};
						
			echo "</section>";	
			#akhir penelitian dosen
			
			
			#pengabdian dosen
			echo "<section id='Pengabdian' class='hidden'>";
			
			// $getDosen =  $dosen->getDosenById($nip);
			// $abdi = $pengabdian->getPengabdianByNama($getDosen['nama_dosen']);
			// foreach($abdi as $abdi){
				// echo "<p class='setting'><span>".$abdi['tahun']."</span>".$abdi['judul_pengabdian']."</p>";
			// }
			
			
			
			$thn_pengabdian = $pengabdian->getTahunPengabdianByNama($lec['nama_dosen']);
			foreach($thn_pengabdian as $thn_pengabdian){
				echo"<b>".$thn_pengabdian['tahun']."</b> <ol start='1'>";
				$num = 1;
				$abdi = $pengabdian->getPengabdianByTahun($lec['nama_dosen'],$thn_pengabdian['tahun']);
				foreach($abdi as $abdi){
					$anggota = $pengabdian->getAnggotaPengabdianById($abdi['id']);
					echo "
						<li> 
								".$abdi['judul_pengabdian']."
						   <br> Oleh: ".$abdi['ketua'];
						   $member = ', ';
						   foreach($anggota as $anggota){
								$member .= $anggota['nama_dosen'].', ';
						   }
						   echo $member = rtrim($member,', ');

						   echo "     
						   <br> Sumber Dana : ".$abdi['sumber_dana']." <br> <br>        
						</li>
					";	
				$num++;
				}
				
				echo "</ol>
						<hr/>
				";
			};
			
			
			
			echo "</section>";		
			#akhir pengabdian dosen
			
			
			
			
			#publikasi
					
			echo "<section id='Publikasi' class='hidden'>";
					
			$thn = $publikasi->getTahunPublikasiDosenByNip($lec['nama_dosen']);
			foreach($thn as $thn){
				echo"<b>".$thn['tahun']."</b> <ol start='1'>";
				$num = 1;
				$pub = $publikasi->getPublikasiDosenByTahun($lec['nama_dosen'],$thn['tahun']);
				foreach($pub as $pub){	
				
					$anggota = $publikasi->getAnggotaPublikasiById($pub['id']);
					$href = (!empty($pub['nama_file']))?ROOT."files/".$pub['nama_file']:$pub['link'];
					$member = ', ';
					echo "
						<li> 
						<a target='_blank' href='".$href."'> ".$pub['judul']."  </a> 
						   <br> ".$pub['deskripsi']."
						   <br> Oleh: ".$pub['oleh'];

   						   foreach($anggota as $anggota){
								 $member .= $anggota['nama_dosen'].', ';
						   }
							 echo $member = rtrim($member,', ');

						   echo "     
						   <br> <br>        
						</li>
					";	
				$num++;
				}
				
				echo "</ol>
						<hr/>
				";
			};
					
			echo "</section>";	
			#akhir publikasi
			
			#galeri galeri
			echo "<section id='Galeri' class='hidden'>";?>
			
			<div class='main--section__content'>
					
				  <div class='gallery' itemscope>
					<?php
					

					$semua =  $galeri->countDetail($nip);

					$per_page = 24; // jumlah query per 

					$i= 1;

					$pages = ceil($semua / $per_page); // melihat total blok yang ada

					$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
					
					$page = filter_var($page,FILTER_VALIDATE_INT);
					
					$start = ($page-1)*$per_page; //startnya 

					$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging

					$galeri = $galeri->getGaleriDetilByIdGaleriAll($nip,$start,$per_page);
					foreach($galeri as $galeri){ 
					echo "
						  <figure itemprop='associatedMedia' itemscope>
							<a href='".ROOT."images/content/gallery/".$galeri['nama_file']."' itemprop='contentUrl' data-size='1200x801'>
								<img src='".ROOT."images/content/gallery/".$galeri['nama_file']."' itemprop='thumbnail' alt='Image description' />
							</a>

							<figcaption itemprop='caption description'>".$galeri['keterangan']."</figcaption>
																
						  </figure>
					";
					
					}
						
					?>
					
				  </div>
				  <br/>
				  
					
			</div>
			
			<?php			
			echo "</section>";	
			#galeri dosen		
			
##AKHIR DEFAULT MENU
?>							  
							  
							  
				<?php 
					$section = $halaman->getHalamanDosenByNip($nip);
								// var_dump($hasil1);
								foreach($section as $section){
										
										echo "
						
										  <section id='".$section['judul_halaman_id']."' class='hidden'>";
											echo $section['konten_id'];
														
										  echo "
										  </section>
											";
										
										echo "
						
										  <section id='".$section['judul_halaman_en']."' class='hidden'>";
											echo $section['konten_en'];
														
										  echo "
										  </section>
											";
								
								}
?>			
							  
							</div><!-- @end #content -->
						  </div><!-- @end #w -->
						<script type='text/javascript'>
						$(function(){
						  $('#profiletabs ul li a').on('click', function(e){
							e.preventDefault();
							var newcontent = $(this).attr('href');
							
							$('#profiletabs ul li a').removeClass('sel');
							$(this).addClass('sel');
							
							$('#content section').each(function(){
							  if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
							});
							
							$(newcontent).removeClass('hidden');
						  });
						});
						</script>


						<div class='pswp' tabindex='-1' role='dialog' aria-hidden='true'>

							  <!-- Background of PhotoSwipe. 
								   It's a separate element as animating opacity is faster than rgba(). -->
							  <div class='pswp__bg'></div>

							  <!-- Slides wrapper with overflow:hidden. -->
							  <div class='pswp__scroll-wrap'>

								  <!-- Container that holds slides. 
									  PhotoSwipe keeps only 3 of them in the DOM to save memory.
									  Don't modify these 3 pswp__item elements, data is added later on. -->
								  <div class='pswp__container'>
									  <div class='pswp__item'></div>
									  <div class='pswp__item'></div>
									  <div class='pswp__item'></div>
								  </div>

								  <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
								  <div class='pswp__ui pswp__ui--hidden'>

									  <div class='pswp__top-bar'>

										  <!--  Controls are self-explanatory. Order can be changed. -->

										  <div class='pswp__counter'></div>

										  <button class='pswp__button pswp__button--close' title='Close (Esc)'></button>

										  <button class='pswp__button pswp__button--share' title='Share'></button>

										  <button class='pswp__button pswp__button--fs' title='Toggle fullscreen'></button>

										  <button class='pswp__button pswp__button--zoom' title='Zoom in/out'></button>

										  <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
										  <!-- element will get class pswp__preloader--active when preloader is running -->
										  <div class='pswp__preloader'>
											  <div class='pswp__preloader__icn'>
												<div class='pswp__preloader__cut'>
												  <div class='pswp__preloader__donut'></div>
												</div>
											  </div>
										  </div>
									  </div>

									  <div class='pswp__share-modal pswp__share-modal--hidden pswp__single-tap'>
										  <div class='pswp__share-tooltip'></div> 
									  </div>

									  <button class='pswp__button pswp__button--arrow--left' title='Previous (arrow left)'>
									  </button>

									  <button class='pswp__button pswp__button--arrow--right' title='Next (arrow right)'>
									  </button>

									  <div class='pswp__caption'>
										  <div class='pswp__caption__center'></div>
									  </div>

								  </div>

							  </div>

						  </div>
						
						
        				</div>

        			</div>

				<?php
				
				  echo "
			<script src='".ROOT."scripts/min/photoswipe-min.js'></script>
			<script src='".ROOT."scripts/min/photoswipe-ui-default-min.js'></script>
			<script src='".ROOT."scripts/min/custom-min.js' type='text/javascript'/></script>
				
				";
				include"component/sidebar.php";
				
				?>

				</div>




                <div class='clear'></div>

        	</div>
<?php 
}else{
	header('location:'.ROOT.'');
}
endif;
?>
