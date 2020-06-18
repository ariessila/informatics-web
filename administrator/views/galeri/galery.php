<div class='container--content--page'>

        		<div class='content'>

        			<div class='content--main'>

        				<div class='main--section'>

        					<div class='main--section__title--page'>

        						<h3>
                                    <a href='#'>GALERI</a>
                                </h3>

        					</div>

        					<div class='main--section__content'>

        						<div class='gallery-folder'>

                                    <ul>
										<?php 

										$semua =  $galeri->countGaleri();
										
										$per_page =12; // jumlah query per 

										$i= 1;
											
										$pages = ceil($semua / $per_page); // melihat total blok yang ada
										
										$page = (isset($_GET['hal']))?(int) $_GET['hal'] :1; // default page
										
										$start = ($page-1)*$per_page; //startnya 
										
										$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap paging
										
										$detail = $galeri->getGaleri($start,$per_page);
										
										
										if($pages==0){ echo "Data tidak ditemukan"; }
										
										// detail kebawah
										
										foreach($detail as $gambar){
											
										$detail = $galeri->getGaleriDetilByIdGaleri($gambar['id']);
									
											
											$detail = $detail['nama_file'];
										
										echo "
										
										<li>

                                            <div class='gallery-folder__thumbnail'>";
											
										if(empty($detail)){
											
										echo " <a href='".ROOT."galery/".$gambar['id']."' ><img style='height:230px; width:180px;' src='".ROOT."images/content/logo.png'/>";
											
											
										}
                                                
echo "
                                                  <a href='#'><img style='height:100%;width:270px;' src='".ROOT."images/content/gallery/thumbnails/".$detail."'/></a>

                                                

                                                <div class='gallery-folder__thumbnail__title'>

                                                    <h4><a href='".ROOT."galeri/".$gambar['id']."'><i class='fa fa-folder folder-icon'></i>".$gambar['nama']."</a></h4>";

												echo "
												
													
													

                                                </div>

                                            </div>
											
											
                                        </li>
										
										
										";
										
										}
											
					echo "    </ul>
							  
							  
									";
															
								echo "<div class='pagination'><center ><ul class='pagination pagination-small center m-t-none m-b-none'>";

											// $req = empty($_REQUEST['view'])?'':$_REQUEST['view']; // mencari kata carinya
											
											$root = ROOT.'galery';//$_SERVER['PHP_SELF']; //."?view=".$req."&"; 
											
											$blok = 7;
											$ini  = ceil($page/$blok);
											
											$mulai   =  ($blok * $ini) - ($blok-1);
											$selesai =  ($blok<=$pages)?($ini * $blok):$pages ;
											
											$kurang1 = $page -1;
											$tambah1 = $page +1 ;
											
											if($pages >=1 && $page<=$pages){

												echo ($page!=1 or empty($page))?"<li style='cursor:pointer;'  ><a href='$root?hal=$kurang1'> Back </a> </li> ":'';
												for($x=$mulai; $x<=$selesai; $x++)
													if($x==$page){
														
														echo "<li style='cursor:pointer;' class='active' > <a>$x</a></li> ";
													}
													else{ 
														echo "<li style='cursor:pointer;'  ><a href='$root?hal=$x'>$x</a></li> ";
													};
												
												echo ($page!=$pages)?"<li style='cursor:pointer;'  ><a href='$root?hal=$tambah1'> Next </a> </li> ":'';
																	
												
											};
											
									echo "</ul> </center></div>";
								
								?>
									</div>
									
        					</div>

        				</div>

        			</div>



					<?php 
					include ('component/sidebar.php');
					?>
        		</div>






                <div class='clear'></div>

        	</div>