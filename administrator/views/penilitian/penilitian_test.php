<?php 
$news = '196108131988112001';
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
							  <h1 sytle='margin-top:-20px !important;'>Judul Penelitian :</h1>
							  <h2 align='center'><i>Sistem Multi Tampilan Pemonitoring Kesehatan Pasien pada Self-Routing Mesh Networking 2.4 GHz (Tahun II)</i></h2>

							  <nav id='profiletabs' style='margin-bottom:0px !important;'>
								<ul class='clearfix'>
							  ";
##navigasi bawaan
								echo "
								<li class='sel'> <a class='sel' href='#Detail'>Detail </a></li>
								<li > <a href='#Info'>Info Penilitian</a> </li>
							</ul>
						  </nav>
						  ";

##DEFAULT MENU
			#profil
			$nip = $parameter;
			echo "<section id='Detail' >";
			// $detailing = $dosen->getDosenById($nip);
			// var_dump($detailing);
				echo "
				<p class='setting' align='center' style='font-size: 20px !important;  font-weight: bold;'>Abstrak </p>
				<p align='center'><i>Perkembangan teknologi sistem pengaturan proses di industri dewasa ini menuju penerapan teknologi elektro-pneumatik, yaitu pengaturan komponen pneumatik melalui sinyal listrik. Pressure control trainer 38-714 adalah modul ajar teknologi elektro-pneumatik yang membahas pengaturan tekanan. Perubahan variasi beban dan gangguan pada teknologi elektro-pneumatik dapat menyebabkan respon sistem tidak sesuai dengan kriteria yang diharapkan.
Pengaruh gangguan yang terdapat pada sistem proses dapat direduksi dengan kontroler kaskade. <br>Selain itu, metode kaskade digunakan untuk meningkatkan kecepatan respon sistem. Dengan pendekatan fuzzy, masalah kontroler dapat diselesaikan dengan mudah tanpa perhitungan matematis yang rumit.
Kontroler kaskade fuzzy adalah dua kontroler fuzzy yang disusun secara kaskade. Pada sisi primer berupa kontroler fuzzy untuk pengaturan tekanan, sedangkan pada sisi sekunder berupa kontroler fuzzy untuk pengaturan aliran.
Berdasarkan hasil implementasi, kontroler kaskade fuzzy dalam penelitian ini mampu mengurangi nilai maksimum overshoot, waktu steady state dan error steady state. Jika kontroler kaskade fuzzy dibandingkan dengan kontroler fuzzy tunggal.</i></p>
				
				";				
								
			echo "</section>";	
			#akhir profil
			#penelitian dosen
			
			echo "<section id='Info' class='hidden'>
				<p class='setting'><span>Ketua Peniliti </span><a href='#'>Amil A. Ilham</a></p>
				<p class='setting'><span>Anggota </span><a  href='#'>Muhammad Niswar</a>, <a href='#'>Andani Ahmad</a>, <a href='#'>Tajuddin Waris</a></p>
				<p class='setting'><span>Nama Laboratorium </span>COT Labs</p>
				<p class='setting'><span>Waktu/Durasi Penilitian </span>64 Hari</p>
				<p class='setting'><span>Tahun Terbit</span>2016</p>
				<p class='setting'><span>Grant </span>Skim Kompetensi Internal Proram Studi</p>
				<p class='setting'><span>Tujuan Penilitian </span>Lorep Ipsum</p>
				<p class='setting'><span>Hasil Penilitian </span>Lorep Ipsum</p>
				<p class='setting'><span>Sumber Dana</span>DIKTI</p>
				<p class='setting'><span>Kata Kunci </span><a href='#'>Lorep Ipsum</a>, <a href='#'>Lorep Ipsum</a></p>

			";
			
			
						
			echo "</section>";	
			#akhir penelitian dosen
			
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

			?>
