<div class='container--content--page'>

        		<div class='content'>

        			<div class='content--main'>

        				<div class='main--section'>
						
						<div class='main--section__title--page'>

        						<h3>
                                    <a href='javascript:;'>Hasil Pencarian</a>
                                </h3>

        				</div>
						
						
						<div class='main--section__content'>

        						<div class='news-list--vertical'>

                                    <ul>
						<?php
							$katacari = empty($_POST['katacari'])?'':$_POST['katacari'];// lawan	
							$katacari = filter_var((htmlentities(strip_tags(trim($katacari)),ENT_QUOTES)), FILTER_SANITIZE_MAGIC_QUOTES);
					 		$semua =  $artikel->countArtikel();
							
							$per_page = 5; // jumlah query per 

							$i= 1;
								
							$pages = ceil($semua / $per_page); // melihat total blok yang ada
							
							$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
							
							$start = ($page-1)*$per_page; //startnya 
							
							$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap paging
							
							$berita = $artikel->getArtikelByCari($katacari,$start,$per_page);
							
							if(empty($berita)){ echo "Data tidak ditemukan"; }
						
							foreach($berita as $berita){

								if($berita['publish'] == 'Y'){
									echo "

                                        <li>

                                            <div class='news-list__thumbnail'>

                                                <img src='".ROOT."images/content/news/thumbnails/".$berita['gambar']."'/>

                                            </div>

                                            <div class='news-list__meta'>

                                                <p class='news-list__meta__date'>
                                                  ".$libs->tgl_indo($berita['tanggal'])."
                                                </p>

                                            </div>

                                            <div class='news-list__title'>

                                                <h3><a href='".ROOT.$model."/news/".$berita['id']."-".$berita['link']."'>".$berita['judul']."</a></h3>

                                            </div>

                                            <div class='news-list__excerpt'>

                                                <p>".substr(strip_tags($berita['isi']),0,315)." . . .</p>

                                            </div>

                                            <div class='news-list__button'>

                                                <a href='".ROOT.$model."/news/".$berita['id']."-".$berita['link']."' ><button  class='button-size--medium button-color--primary'>Read More</button></a>

                                            </div>


                                        </li>";
										$no++;
									}
								}
						
						?>
									</ul>

                                </div>

        					</div>
        				</div>

        			</div>





        			<?php
					
					include('component/sidebar.php');
					
					?>

        		</div>






                <div class='clear'></div>

        	</div>