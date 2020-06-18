<?php 
if(isset($model)):
?>
<div class='container--slider'>

        		<div class='slider'>

                    <div class='container--slider__slide'>
                        <ul id='slide'>
						<?php 
						$gambar_utama = $galeri->getGambarUtama('GAMBAR UTAMA',4);
						foreach($gambar_utama as $gambar_utama){
						 $link_gambar = empty($gambar_utama['link'])?ROOT.$model."/gallery":$gambar_utama['link'];
						 
						 $target = (empty($gambar_utama['link']))?'':'target="_blank"';
						 
						 echo 
						 "<li>
                            <a href='".$link_gambar."'".$target." ><img style='width:100%; height:100%;' src='".ROOT."images/content/gallery/".$gambar_utama['nama_file']."' alt='".$gambar_utama['keterangan']."'></a>
                          </li>";	
						}
						?>
                        </ul>
						
            		</div>




            		<div class='container--slider__agenda'>

            			<div class='agenda'>

            				<div class='agenda__title'>
            					
            					<h3>
								<?php 
								
									echo ($model == 'id')?"<i class='fa fa-calendar widget__icon'></i><a href=''>AGENDA</i></a>":"<i class='fa fa-calendar-o widget__icon'></i><a href=''>AGENDA</i></a>";
								
								
								?>
            						
            					
								</h3>

            				</div>

            				<div class='agenda__content'>

            					<div class='agenda__content__section'>

            						
            						
            						<div class='agenda__content__section__list'>

            							<ul class='agenda__list'>
											
											<?php 
											$event = $event->getEventBesar(0,4);
											foreach($event as $event){
												$tanggal_event = $libs->tgl_indo2($event['tanggal_mulai']);
	
												if($model == 'id'){
													echo "
													<li><p><a href='".ROOT.$model."/agenda/".$event['id']."-".$event['link']."'>".$event['judul_id']."</a></p><span class='agenda__list__date'>".$tanggal_event."</span></li>
													";				
												}else{
													echo "
													<li><p><a href='".ROOT.$model."/agenda/".$event['id']."-".$event['link']."'>".$event['judul_en']."</a></p><span class='agenda__list__date'>".$tanggal_event." 1</span></li>
													";				
												}
																			
											}
											
											?>
            								
										</ul>

            						</div>

            					</div>
            					<div class='agenda__content__section'>

            						<!--<div class='agenda__content__section__title'>
            							<h4>BULAN MARET-JUNI 2015</h4>
            						</div>-->
            						<div class='agenda__title'>
            							<h4><i class='fa fa-calendar widget__icon'></i><?php echo ($model=='id')?" KALENDER AKADEMIK":" ACADEMIC CALENDAR" ;?>  </h4>
            						</div>
            						<div class='agenda__content__section__list'>

            							<ul class='agenda__list'>
											
											<?php 
											$akademik = $kalender->getKalenderByBulan(0,3,date('Y-m-d'));
											foreach($akademik as $akademik){
												$tanggal = $libs->tgl_indo2($akademik['tanggal_mulai']);
												
												if($model == 'id'){
													echo "
													<li><p><a href='javascript:;'>".$akademik['judul_id']."</a></p><span class='agenda__list__date'>".$tanggal."</span></li>
													";				
												}else{
													echo "
													<li><p><a href='javascript:;'>".$akademik['judul_en']."</a></p><span class='agenda__list__date'>".$tanggal."</span></li>
													";				
												}
																			
											}
											
											?>
            								
										</ul>

            						</div>

            					</div>
								

            				</div>

            			</div>

            		</div>

                </div>

        	</div>

        	<div class='container--content'>

        		<div class='content'>

        			<div class='content--main'>

        				<div class='main--section'>

        					<div class='main--section__title'>
							<div id='s'></div>
        						<h3>
									<?php 
									echo ($model == 'id')?"<a >ARTIKEL<i class='fa fa-arrow-circle-right'></i></a>":"<a >ARTICLE<i class='fa fa-arrow-circle-right'></i></a>";
									
									?>
        						</h3>

        					</div>

        					<div class='main--section__content'>

        						<div class='news-list'>

        							<ul>
										
									<?php

								$semua =  $artikel->countArtikel();
				
								$per_page = 6; // jumlah query per halaman 
								
								$i= 1;

								$pages = ceil($semua / $per_page); // melihat total blok yang ada
								
								
								$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
								
								$page = filter_var($page, FILTER_VALIDATE_INT);
								
								$start = ($page-1)*$per_page; //startnya 
								
								$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap halaman paging
								
								$halaman = $halaman->getHalaman($start,$per_page); //menghitung 
								
								if($pages==0){echo "Data tidak ditemukan"; }
									
									$berita = $artikel->getArtikel($model,$start,$per_page);
									
									
									foreach($berita as $berita){
										
										if($berita['publish']=='Y'){
											echo"
											<li style='margin-bottom:50px;'>

												<div class='news-list__thumbnail'>";
											if(!empty($berita['gambar'])){	
											echo"	<img background-size:contain; style='width:270px;' src='".ROOT."images/content/news/thumbnails/".$berita['gambar']."'/>";
											}else{
												
											echo"	<img style='height:175;' src='".ROOT."images/content/news/default.jpg'/>";
												
											}
											
											echo"      									
												</div>

												<div class='news-list__meta'>

													<p class='news-list__meta__date'>
														".$libs->tgl_indo($berita['tanggal'])."
													</p>

												</div>

												<div class='news-list__title'>

													<h3><a href='".ROOT.$model.'/news/'.$berita['id'].'-'.$berita['link']."'>".$berita['judul']."</a></h3>

												</div>

											</li>									
										
										";
										}
									}
									?>
        							

        							</ul>
									
									<?php 
									
									
				echo "<center><div class='pagination clearfix'>";

						// $req = empty($_REQUEST['view'])?'':$_REQUEST['view']; // mencari kata carinya
						
						$root = ROOT	;//$_SERVER['PHP_SELF']; //."?view=".$req."&"; 
						
						$blok = 10;
						 $ini  = ceil($page/$blok);
						
						$mulai   =  ($blok * $ini) - ($blok-1);
						$selesai =  ($blok<=$pages)?($ini * $blok):$pages ;
						
						$kurang1 = $page -1;
						$tambah1 = $page +1 ;
						
						if($pages >=1 && $page<=$pages){

							echo ($page!=1 or empty($page))?"<a href='".$root."&hal=1#s'> Page 1  </a> <a href='".$root."&hal=".$kurang1." #s'> Back </a>":'';
							for($x=$mulai; $x<=$selesai; $x++)
								if($x==$page){
									
									echo "<strong>".$x."</strong>";
									
								}
								// else{ 
									// echo "<a href='$root?hal=$x'>$x</a>";
								// };
							
							echo ($page!=$pages)?"<a href='".$root."?hal=".$tambah1."#s'> Next </a>  ":'';
												
							
						};
				echo "</div></center>";
									
									
									?>
									</div>

        					</div>

        				</div>

        			</div>





        			<div class='content--sidebar'>

        				<div class='content--sidebar__widget'>

        					<div class='widget widget--announcement'>

        						<div class='widget__title'>
        							<h3>
        								<a>
											<?php echo ($model=='id')?'BERITA FAKULTAS':'FACULTY NEWS';?>
										</a>
        							</h3>
        						</div>


        						<div class='widget__content'>

        							<ul class='widget__content--announcement'>
										
										<?php 
										$berita = $subdomain->getArtikel($model,0,8); 
									
										foreach($berita as $berita){
											if($berita['publish'] == 'Y'){
												$tanggal = $libs->tgl_indo($berita['tanggal']);
												echo "
															
													<li>
														<p class='widget__content--announcement__date'>".$tanggal."</p>
														<p class='widget__content--announcement__title'><a target='_blank' href='http://eng.unhas.ac.id/".$model.'/news/'.$berita['id'].'-'.$berita['link']."'>".$berita['judul']."</a></p>
													</li>											
												";		
											}
											
										}
										
										?>
									

        							</ul>

        						</div>

        					</div>

        				</div>

        			</div>

        		</div>

        	</div>





        	
        	<div class='container--content--cards '>

        		<div class='cards'>
        		<div class='content'>

        			<div class='content--fullwidth'>

        				<div class='main--section'>

        					<div class='main--section__title'>

        						<h3>
									<?php 
									echo ($model == 'id')?
									"<a href='".ROOT."id/semua_pengumuman'>INFORMASI<i class='fa fa-arrow-circle-right'></i></a>"
									:"<a href='".ROOT."en/semua_pengumuman'>INFORMATION<i class='fa fa-arrow-circle-right'></i></a>";
									
									?>

        							
        						</h3>

        					</div>

        					<div class='main--section__content'>

        						<div class='programs-list'>

        							<ul>
<?php 
										$pengumuman = $pengumuman->getPengumuman(0,3);
										foreach($pengumuman as $pengumuman){
										echo "
										<li>

        									<div class='programs-list__thumbnail'>";
											if($pengumuman['gambar']==''){
												echo "
												<img src='".ROOT."images/content/news/default.png'/>
												
												";
												
											}else{
												echo "
												<img src='".ROOT."images/content/news/thumbnails/".$pengumuman['gambar']."'/>


												";
												
											}
        																						
        									echo "</div>

        									<div class='programs-list__title'>

        										<h3>
												
												<a href='".ROOT.$model."/pengumuman/".$pengumuman['id']."-".$pengumuman['link']."'> ".$pengumuman['judul']."</a>
												
												</h3>

        									</div>

        								</li>

										
										";
										}
										
										?>


        							</ul>

        						</div>

        					</div>

        				</div>

        			</div>

        		</div>
        		</div>

        	</div>


            <div class='container--LimitBoard'>
					<div class='Limit'>
        			
        			<div class='Limit__main'>
                        
                    </div>

        		</div>
        	</div>
<?php 
endif;
?>