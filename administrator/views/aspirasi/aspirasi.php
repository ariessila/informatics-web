<div class='container--content--page'>
        		<div class='content'>

        			<div class='content--main'>

        				<div class='main--section'>

        					<div class='main--section__title--page'>

        						<h3>
                                    <a href='#'>ASPIRASI MASYARAKAT</a>
                                </h3>

        					</div>

        					<div class='main--section__content'>
                                <p>Di halaman ini warga masyarakat kota makassar dapat menyampaikan aspirasinya secara langsung kepada SKPD terkait</p>
        						
                                <div class='aspiration-input'>
                                    <h4>Ungkapkan Aspirasi Anda Dalam Form Dibawah Ini!</h4>
                                    <div class='aspiration-input__form'>
                                        <div class='aspiration-input__form__line aspiration-input__form__title'>
                                            <label>Judul Aspirasi</label>
                                            <input type='text' id='judul' class='form form--aspiration' placeholder='Masukan Judul Aspirasi Anda...'/>
                                        </div>
                                        <div class='aspiration-input__form__line'>
                                            <label>Aspirasi Anda</label>
                                            <textarea id='konten' class='form form--aspiration'></textarea>
                                        </div>
                                        <div class='aspiration-input__form__line'>
                                            <div class='aspiration-input__form__line__half'>
                                                <label>Nama Anda</label>
                                                <input type='text' id='nama' class='form form--aspiration' placeholder='Nama'/>
                                                <input type='text' id='validcode' value='<?php echo uniqid();?>' class='form form--aspiration' />
                                                <input type='hidden' id='url' value='<?php echo ROOT."aspirasi";?>' class='form form--aspiration'/>
                                            </div>
                                            <div class='aspiration-input__form__line__half'>
                                                <label>Alamat Email</label>
                                                <input type='text' id='email' class='form form--aspiration' placeholder='Alamat Email'/>
                                            </div>
                                        </div>
                                        <div class='aspiration-input__form__line'>
                                            <button id='kirim' class='form form--aspiration button-size--fullwidth button-color--primary'>KIRIM ASPIRASI</button>
											
											<div id='flash'>
												
											</div >
											
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class='aspiration-list'>
                                    <ul>
										<?php
										
										$aduan = $aspirasi->getAspirasi();
										foreach($aduan as $aduan){
										echo"
										
                                        <li>
                                           <div class='aspiration-list__support'>
                                                <div class='aspiration-list__support__count'>
                                                   <h1>".$aduan['dukungan']."</h1>
                                                   <p>Dukungan</p>
												   <input type='hidden' id='token' value='".uniqid()."' class='form form--aspiration'/>
												   <input type='hidden' id='random' value='".$aduan['id']."' class='form form--aspiration'/>
												   <input type='hidden' id='val' value='".mt_rand(0,454)."' class='form form--aspiration'/>
                                                </div>
                                                <div class='aspiration-list__support__button'>
                                                    <button href='#' id='dikung' class='button-size--fullwidth button-color--primary'>DUKUNG</button>
                                                </div>
                                           </div>
                                           <div class='aspiration-list__content'>
                                                <div class='aspiration-list__content__title'>
                                                    <h3>".$aduan['judul']."</h3>
                                                </div>
                                                <div class='aspiration-list__content__description'>
                                                    <div class='aspiration-list__content__description__block'>
                                                        <p>".$aduan['aspirasi'].".</p>
                                                    </div>
                                                </div>
                                                <div class='aspiration-list__content__meta'>
                                                    <span class='aspiration-list__content__meta__author'>
                                                        Oleh <strong>".$aduan['nama']."</strong> pada ".$libs->tgl_indo($aduan['tanggal'])."
                                                    </span>
                                                    <span class='aspiration-list__content__meta__comment'>
                                                       <!-- <a href='#'>4 Komentar</a>-->
                                                    </span>
                                                </div>
                                           </div>
                                        </li>";}	
                                       
										?>
                                    </ul>
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

	
			<script>
			
			</script>
<?php 

	echo "
	

	<script src='".ROOT."scripts/common-script.js' type='text/javascript'></script>

	";

?>