<?php 
if(isset($parameter)):	
@session_start();
$a = explode('-',$parameter);
$news = $a[0];
if(is_numeric($news)){

include("captcha/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();


?>
<div class='container--content--page'>

        		<div class='content'>

        			<div class='content--main'>

        				<div class='main--section'>

							
							<?php 
							
							$detail = $artikel->getArtikelById($news,$model);
							// jika kosong langsung kembali ke halaman
							if(empty($detail)){
								header('location:'.ROOT.'');
							}
							
							if(!empty($detail['gambar'])){
							echo "
							
                            <div class='main--section__featured-image'>
                               <center > <img style='width:70%; height:auto;' src='".ROOT."images/content/news/".$detail['gambar']."'/></center>
                            </div>
							
							";	
							
							}
							
							echo"
							
							<div class='main--section__meta'>
                                By <i class='fa fa-user '></i><strong> ".$detail['penulis']." Posted On ".$libs->tgl_indo($detail['tanggal'])." </strong> 
                            </div>

        					<div class='main--section__title'>

        						<h1>
									".$detail['judul']."
                                </h1>

        					</div>

                            <div class='main--section__share'>
                               <div class='addthis_sharing_toolbox'></div>
                            </div>

        					<div class='main--section__content'>

        						<div class='main--content--text'>
                                  ".
								  
									$detail['isi']
								  
								  ."
                                </div>

        					</div>
							
							
							";
							
							?>
							


        				</div>
						<div class='main--section__title--page'>

        						<h3>
                                    <a href='javascipt:;'>Comment</a>
                                </h3>

        					</div>
							<form method='POST' action='<?=ROOT?>kmtr/'>
							<p class="setting"><span style='width:100px;' >Nama </span> 
							<input type='hidden' value='<?php echo $detail['id'];?>' name='valdata' /> 
							<input style="width:70%;" type='text' id='judul' name='judul' class='form form--aspiration' placeholder=''/> </p>		
							<p class="setting"><span style='width:100px;'>Email </span><input style="width:70%;" type='text' name='email' class='form form--aspiration' placeholder=''/></p>		
							<p class="setting"><span style='width:100px;'>Komentar </span> <textarea  cols="0" rows="5" style="width:70%;"  id='konten' class='form form--aspiration' name='komentar' ></textarea> </p>		
							 
							<p class="setting">
							
								<span style='width:100px;'> &nbsp </span>   
							<?php  

								echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
					
							?>
							
							</p>		
							 
							<p class="setting">
							
								<span style='width:200px;'>Masukkan kode diatas </span>  
								<input type='text' name='captcha'/> &nbsp &nbsp <input type='submit' name='simpan' value='Simpan' /> 
							</p>		
							 
							 <span style="width:82%; display: block;"> &nbsp 	</span>  
							<p class="setting"></p>		
							</form>
									<div class='aspiration-list'>
                                    <div class='aspiration-list__support'>

                                          
                                           <div class='aspiration-list__content'>
										   <?php 
										   $comment = $komentar->getKomentarByIdArtikel($detail['id']);
										   foreach($comment as $comment){
												echo "
												<div class='aspiration-list__content__title'>
                                                    <h4><strong>".$comment['nama_komentar']."</strong></h4>
                                                </div>
                                                <div class='aspiration-list__content__description'>
                                                    <div class='aspiration-list__content__description__block'   >
                                                        <p>".$comment['isi_komentar']."</p>
                                                    </div>
                                                </div>
                                                <div class='aspiration-list__content__meta'>
                                                    <span class='aspiration-list__content__meta__author'>
                                                        Pada <strong>".$libs->tgl_indo($comment['tanggal_komentar'])." </strong> 
                                                    </span>
                                                    <span class='aspiration-list__content__meta__comment'>
                                                       <!-- <a href='#'>4 Komentar</a>-->
                                                    </span>
                                                </div>
											   <hr />
												
												";
										   }
										   ?>
                                                
                                           </div>
                                   
                                </div>
                                </div>

        			</div>

				<?php
				
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