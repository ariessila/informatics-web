<?php 
if(isset($parameter)):	

$a = explode('-',$parameter);
$id = $a[0];
if(is_numeric($id)){


?>
	<div class='container--content--page'>

        		<div class='content'>

        			<div class='content--main'>

        				<div class='main--section'>

							<?php  

							$data = $penelitian->getPenelitianById($id);

							?>
							<div id='w'>
							<div id='content' class='clearfix'>
							  <div id='userphoto'>
							  <?php
							  if(empty($data['foto_dosen'])){
								  echo"
									<img src='".ROOT."images/content/organization/default99.jpg' style='width:154px;height:154px;' alt='default avatar'>
								  ";
							  }else{
								  echo"
									<img src='".ROOT."images/content/organization/".$data['foto_dosen']."' style='width:154px;height:154px;' alt='default avatar'>
								  ";								  
							  }
							  
##navigasi
							  echo "
							  
							   </div>
							  <h1 sytle='margin-top:-20px !important;'>Judul Penelitian :</h1>
							  <h2 align='center'><i>".$data['judul_penelitian']."</i></h2>

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
				<p align='center'><i>".$data['abstrak']."</i></p>
				
				";				
								
			echo "</section>";	
			#akhir profil
			#penelitian dosen
			
			echo "<section id='Info' class='hidden'>
				<p class='setting'><span>Ketua Peniliti </span><a href='#'>".$data['ketua_penelitian']."</a></p>
				<p class='setting'><span>Anggota </span><a  href='#'>";

				$anggota = $penelitian->getAnggotaPenelitianById($data['id_penelitian']);
							foreach($anggota as $anggota){
								echo '<a href="#"">'.$anggota['nama_dosen'].'</a>,';
							}

				echo "</p>
				<p class='setting'><span>Nama Laboratorium </span>".$data['nama_lab']."</p>
				<p class='setting'><span>Waktu/Durasi Penelitian </span>".$data['durasi_penelitian']."</p>
				<p class='setting'><span>Tahun Terbit</span>".$data['tahun_penelitian']."</p>
				<p class='setting'><span>Grant </span>".$data['grant_abstrak']."</p>
				<p class='setting'><span>Tujuan Penilitian </span>".$data['tujuan_penilitian']."</p>
				<p class='setting'><span>Manfaat Penilitian </span>".$data['manfaat_penilitian']."</p>
				<p class='setting'><span>Hasil Penilitian </span>".$data['hasil_penilitian']."</p>
				<p class='setting'><span>Sumber Dana</span>".$data['sumber_dana']."</p>
				<p class='setting'><span>Kata Kunci </span>".$data['kata_kunci']."</p>

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
endif;
?>
