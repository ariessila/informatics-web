<div class='container--content--page'>

        		<div class='content'>

        			<div class='content--main'>

        				<div class='main--section'>
						
						<div class='main--section__title--page'>

        						<h3>
                                    <a href='javascript:;'>INFORMASI</a>
                                </h3>

        				</div>
						
						
						<div class='main--section__content'>

        						<div class='news-list--vertical'>

                                    <ul>
						<?php
						echo '';
						

					 		$semua =  $pengumuman->countPengumuman();
							
							$per_page = 5; // jumlah query per 

							$i= 1;
								
							$pages = ceil($semua / $per_page); // melihat total blok yang ada
							
							$page = (isset($_GET['hal']))?(int)$_GET['hal'] :1; // default page
							
							$start = ($page-1)*$per_page; //startnya 
							
							$no = ($page-1)*$per_page +1; // menentukan asending nomor tiap paging
							
							$pengumuman = $pengumuman->getPengumuman($start,$per_page);
							
							
							if($pages==0){ echo "Data tidak ditemukan"; }
						
	foreach($pengumuman as $pengumuman){

	echo "

                                        <li>

                                            <div class='news-list__thumbnail'>

                                                <img src='".ROOT."images/content/news/thumbnails/".$pengumuman['gambar']."'/>

                                            </div>

                                            <div class='news-list__meta'>

                                                <p class='news-list__meta__date'>
                                                  ".$libs->tgl_indo($pengumuman['tanggal'])."
                                                </p>

                                            </div>

                                            <div class='news-list__title'>

                                                <h3><a href='".ROOT.$model."/pengumuman/".$pengumuman['id']."-".$pengumuman['link']."'>".$pengumuman['judul']."</a></h3>

                                            </div>

                                            <div class='news-list__excerpt'>

                                                <p>".substr(strip_tags($pengumuman['konten']),0,315)." . . .</p>

                                            </div>

                                            <div class='news-list__button'>

                                                <a href='".ROOT.$model."/pengumuman/".$pengumuman['id']."-".$pengumuman['link']."' ><button  class='button-size--medium button-color--primary'>Read More</button></a>

                                            </div>


                                        </li>
						";
$no++;
	}
	
	echo "<center><div class='pagination clearfix'>";

			// $req = empty($_REQUEST['view'])?'':$_REQUEST['view']; // mencari kata carinya
			
			$root = '';//$_SERVER['PHP_SELF']; //."?view=".$req."&"; 
			
			$blok = 7;
			$ini  = ceil($page/$blok);
			
			$mulai   =  ($blok * $ini) - ($blok-1);
			$selesai =  ($blok<=$pages)?($ini * $blok):$pages ;
			
			$kurang1 = $page -1;
			$tambah1 = $page +1 ;
			
			if($pages >=1 && $page<=$pages){

				echo ($page!=1 or empty($page))?"<a href='$root?hal=$kurang1'> Back </a>  ":'';
				for($x=$mulai; $x<=$selesai; $x++)
					if($x==$page){
						
						echo "<strong>$x</strong> ";
					}
					else{ 
						echo "<a href='$root?hal=$x'>$x</a> ";
					};
				
				echo ($page!=$pages)?"<a href='$root?hal=$tambah1'> Next </a> ":'';
									
				
			};
	echo "</div> </center>";
						
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