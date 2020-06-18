<div class="container--content--page--fullwidth">

        		<div class="content">

        			<div class="content--main">

        				<div class="main--section">

        					<div class="main--section__title">

        						<h1>
                                   Struktur Organisasi
                                </h1>

        					</div>

        					<div class="main--section__content">

        						<div class="main--content--text">

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultricies orci et sapien pharetra, in euismod odio rutrum. Vivamus eget 
                                hendrerit augue. Mauris nec condimentum dolor. Etiam pharetra tellus quam, sit amet semper neque ultrices congue. </p>

                                <div class="organization">
                                    <div class="organization-structure-chart">
                                    </div>
                                    <ul class="organization-structure">
                                        <li>
                                            <div class="organization-structure__title">
                                                <?php
												$kepala = $struktur_organisasi->getStrukturOrganisasiById(1);
												echo $kepala['kelompok'];
												?>
                                            </div>
                                            <div class="organization-structure__content">
                                                <div class="organization-structure__content__picture">
                                                    <img src="images/content/organization/1.png"/>
                                                </div>
                                                <div class="organization-structure__content__description">
                                                    <p class="organization-structure__content__description__name">Nama Kepala Dinas</p>
                                                    <p>NIK 1002003004</p>
                                                </div>
                                            </div>

                                            <ul><?php 
											$badan = $struktur_organisasi->getBadanStrukturOrganisasi();
											var_dump($badan);
											foreach($badan as $badan){
												
											
											?>
                                                <li>
													<div class="organization-structure__title">
                                                        <?php echo "<h4>".$badan['kelompok']."</h4>"; 
														$detail_badan = $struktur_organisasi->getPegawaiById($badan['id']);
														
														?>
                                                    </div>
                                                    <div class="organization-structure__content">
                                                        <div class="organization-structure__content__picture">
                                                            <img src="images/content/organization/<?php echo $detail_badan['foto'];?>"/>
                                                        </div>
                                                        <div class="organization-structure__content__description">
                                                            <p class="organization-structure__content__description__name"><?php echo $detail_badan['nama_lengkap'];?></p>
                                                            <p>NIP<?php echo $detail_badan['nip'];?></p>
                                                        </div>
                                                    </div>

                                                    <ul>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SUBBAGIAN UMUM DAN KEPEGAWAIN</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_1_1.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Subbagian 1</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SUBBAGIAN KEUANGAN</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_1_2.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Subbagian 2</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SUBBAGIAN PERLENGKAPAN</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_1_3.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Subbagian 3</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
											<?php } ?>


                                                <li>
                                                    <div class="organization-structure__title">
                                                        <h4>BIDANG PENATAAN, PEMANFAATAN RUANG, DAN FASUM FASOS</h4>
                                                    </div>
                                                    <div class="organization-structure__content">
                                                        <div class="organization-structure__content__picture">
                                                            <img src="images/content/organization/1_2.png"/>
                                                        </div>
                                                        <div class="organization-structure__content__description">
                                                            <p class="organization-structure__content__description__name">Nama Ketua Bidang</p>
                                                            <p>NIK 1002003004</p>
                                                        </div>
                                                    </div>

                                                    <ul>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI PENATAAN RUANG</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_2_1.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 1</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI PEMANFAATAN RUANG DAN FASUM FASOS</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_2_2.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 2</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI PENELITIAN DAN PENGEMBANGAN</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_2_3.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 3</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>


                                                <li>
                                                    <div class="organization-structure__title">
                                                        <h4>BIDANG TATA BANGUNAN</h4>
                                                    </div>
                                                    <div class="organization-structure__content">
                                                        <div class="organization-structure__content__picture">
                                                            <img src="images/content/organization/1_3.png"/>
                                                        </div>
                                                        <div class="organization-structure__content__description">
                                                            <p class="organization-structure__content__description__name">Nama Ketua Bidang</p>
                                                            <p>NIK 1002003004</p>
                                                        </div>
                                                    </div>

                                                    <ul>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI PENGALIHAN FUNGSI BANGUNAN</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_3_1.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 1</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI PETA SITUASI DAN PENGUKURAN</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_3_2.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 2</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI DETAIL DAN TEKNIK ARSITEKTUR</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_3_3.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 3</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>


                                                <li>
                                                    <div class="organization-structure__title">
                                                        <h4>BIDANG PENGKAJIAN</h4>
                                                    </div>
                                                    <div class="organization-structure__content">
                                                        <div class="organization-structure__content__picture">
                                                            <img src="images/content/organization/1_4.png"/>
                                                        </div>
                                                        <div class="organization-structure__content__description">
                                                            <p class="organization-structure__content__description__name">Nama Ketua Bidang</p>
                                                            <p>NIK 1002003004</p>
                                                        </div>
                                                    </div>

                                                    <ul>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI PENELITIAN ADMINISTRASI</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_4_1.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 1</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI PENELITIAN TEKNIS</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_4_2.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 2</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI PENETAPAN RETRIBUSI</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_4_3.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 3</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>


                                                <li>
                                                    <div class="organization-structure__title">
                                                        <h4>BIDANG PENGAWASAN DAN PENGENDALIAN</h4>
                                                    </div>
                                                    <div class="organization-structure__content">
                                                        <div class="organization-structure__content__picture">
                                                            <img src="images/content/organization/1_5.png"/>
                                                        </div>
                                                        <div class="organization-structure__content__description">
                                                            <p class="organization-structure__content__description__name">Nama Ketua Bidang</p>
                                                            <p>NIK 1002003004</p>
                                                        </div>
                                                    </div>

                                                    <ul>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI PENGAWASAN BANGUNAN DAN PEMANFAATAN RUANG</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_5_1.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 1</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI HUKUM, PENGADUAN DAN PENINDAKAN</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_5_2.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 2</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="organization-structure__title">
                                                                <h4>SEKSI EVALUASI, MONITORING, DAN PELAPORAN</h4>
                                                            </div>
                                                            <div class="organization-structure__content">
                                                                <div class="organization-structure__content__picture">
                                                                    <img src="images/content/organization/1_5_3.png"/>
                                                                </div>
                                                                <div class="organization-structure__content__description">
                                                                    <p class="organization-structure__content__description__name">Nama Seksi 3</p>
                                                                    <p>NIK 1002003004</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>

                                               

                                                <li>
                                                    <div class="organization-structure__title">
                                                        <h4>UPTD</h4>
                                                    </div>
                                                    
                                                </li>

                                            </ul>

                                        </li>

                                    </ul>
                                  
                                </div>

                                </div>

        					</div>

        				</div>

        			</div>

                </div>

                <div class="clear"></div>

        	</div>