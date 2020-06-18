<?php 
if(isset($method)):
?>
<div class='container--content--page'>

	<div class='content'>

		<div class='content--main'>

		<div class='main--section'>

			<div class='main--section__title'>

				<h2>
				
				<?php
				
				$method = filter_var(strip_tags($method),FILTER_VALIDATE_INT);
				
				$album = $galeri->getGaleriById(1,0,999);
				
				echo $album['nama'];
				
				?>	
				
				
				
				</h2>

			</div>

			<div class='main--section__content'>
					
				
				  <div class='gallery' itemscope>
					<?php
					

					$semua =  $galeri->countDetail(1);

					$per_page = 20; // jumlah query per 

					$i= 1;

					$pages = ceil($semua / $per_page); // melihat total blok yang ada

					$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
					
					$page = filter_var($page,FILTER_VALIDATE_INT);
					
					$start = ($page-1)*$per_page; //startnya 

					$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap  paging

					// $peneliti = $penelitian->getPenelitian($start,$per_page); //menghitung 
					
			
					$galeri = $galeri->getGaleriDetilByIdGaleriAll(1,$start,$per_page);
					foreach($galeri as $galeri){ 
					echo "
						  <figure itemprop='associatedMedia' itemscope>
							<a href='".ROOT."images/content/gallery/".$galeri['nama_file']."' itemprop='contentUrl' data-size='1200x801'>
								<img src='".ROOT."images/content/gallery/thumbnails/".$galeri['nama_file']."' itemprop='thumbnail' alt='Image description' />
							</a>

							<figcaption itemprop='caption description'>".$galeri['keterangan']."</figcaption>
																
						  </figure>
					";
					
					}
						
					?>
					
				  </div>
				  <br/>
				  
					
			</div>
			
			<div class='main--section__title'>

				<?php  
				
					echo " <div class='pagination clearfix'> <ul>";
					
					$root = '';
					
					$blok = 10;
					$ini  = ceil($page/$blok);
					
					$mulai   =  ($blok * $ini) - ($blok-1);
					$selesai =  ($blok<=$pages)?($ini * $blok):$pages ;
					
					$kurang1 = $page -1;
					$tambah1 = $page +1 ;
					
					if($pages >=1 && $page<=$pages){

						echo ($page!=1 or empty($page))?"<a href='?hal=$kurang1'> Back </a> ":'';
						for($x=$mulai; $x<=$selesai; $x++)
							if($x==$page){
								
								echo "<strong>".$x." </strong> ";
								
							}
							else{ 
								echo "<a href='$root?hal=$x'>$x</a> ";
							};
						
						echo ($page!=$pages)?"<a href='$root?hal=$tambah1'> Next </a>  ":'';
											
									
					};
					
					echo "</ul> </div>";
					
				?>

			</div>

		</div>
		
	</div>


		<?php include"component/sidebar.php";?>

	</div>


	<div class='clear'></div>

	</div>
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
	  
<?php 
echo "
	  
<script src='".ROOT."scripts/min/photoswipe-min.js'></script>
<script src='".ROOT."scripts/min/photoswipe-ui-default-min.js'></script>
<script src='".ROOT."scripts/min/custom-min.js' type='text/javascript'/></script>

";

endif;
?>