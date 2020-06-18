	<!-- Breadcrumb section -->
	<div class="mahasiswa-site-breadcrumb" >
		<div class="container">
			<a href=""><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
			<span>Lecturer</span><i class="fa fa-angle-right"></i><span><?=$title?></span>
		</div>
	</div>
	<!-- Breadcrumb section end -->

	<!--laboratorium detail-->
	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
						<section class="team-section">
							<div class="container">
								<!-- <div class="section-title text-center" style="margin-bottom: 30px">
									<h3><?=$title?></h3>
								</div> -->
								<div class="row">
									<div class="col-lg-4">
										<div class="member">
											<div class="member-pic set-bg" data-setbg="<?=upload_url('dosen').(empty($dosen->foto_dosen) ? 'no_image.jpg' : $dosen->foto_dosen)?>">
												<!--<div class="member-social">
													<a href=""><i class="fa fa-facebook"></i></a>
													<a href=""><i class="fa fa-twitter"></i></a>
													<a href=""><i class="fa fa-envelope"></i></a>
												</div>-->
											</div>
											<!-- <h5><?=eng_lang_version($dosen->jabatan_dosen, "posisi_dosen")?></h5> -->
										</div>
									</div>	
									<div class="col-lg-8">
										<div style="padding-bottom: 28px;">
											<table id="detailprofil">
												<tr>
													<th width="40%">Full Name</th>
													<td width="60%"><?=$title?></td>
												</tr>
												<tr>
													<th width="40%">NIDN / NIP</th>
													<td width="60%"><?=(!empty($dosen->nidn)? $dosen->nidn : '-')?><br><?=$dosen->nip?></td>
												</tr>
												<tr>
													<th width="40%">Academic Position</th>
													<td width="60%"><?=eng_lang_version($dosen->jabatan_dosen, "posisi_dosen")?></td>
												</tr>
												<tr>
													<th width="40%">Email</th>
													<td width="60%"><?=$dosen->email_dosen?></td>
												</tr>
												<tr>
													<th width="40%">Expertises</th>
													<td width="60%"><?=eng_lang_version($dosen->bidang_penelitian, "keahlian_dosen")?></td>
												</tr>
												<!-- <tr>
													<th width="30%">NIDN / NIP</th>
													<th width="10%">Academic Degree(front/back)</th>
													<th width="20%">Education for S1, S2, S3 and University Origin</th>
													<th width="40%">Expertises</th>
												</tr>
												<tr>
													<td><?=(!empty($dosen->nidn)? $dosen->nidn : '-')?><br><?=$dosen->nip?></td>
													<td><?=$dosen->gelar_depan?>/<br>
														<?=$dosen->gelar_belakang?>
														</td>
													<td>S1 (Unhas)<br>
														S2 (ITB)<br>
														S3 (ITB)
														</td>
													<td><?=eng_lang_version($dosen->bidang_penelitian, "keahlian_dosen")?>
														</td>
												</tr> -->
											</table>
										</div>
									</div>
								</div>
							</div>
						</section>
						<br>
						<section class="team-section spad">
							<div class="container">
								<div class="section-title text-center" style="margin-bottom: 30px">
									<h3>Course Subject</h3>
								</div>
								<div class="row">
										<div id="matakuliahampu" class="scrollable">
												<table>
														<tr>
															<th width="20%">Course Code</th>
															<th width="50%">Course</th>
															<th width="10%">Credits</th>
															<th width="20%">Semester</th>
														</tr>
<?php if(count($kuliah) == 0){ ?>
													<tr>
														<td colspan="4" width="100%" class="text-center">No Course Data</td>
													</tr>
<?php } else{
	foreach ($kuliah as $kuliah) {
?>	
														<tr>
															<td><?=$kuliah->kode?></td>
															<td><?=$kuliah->mata_kuliah?></td>
															<td><?=$kuliah->sks?></td>
															<td><?=$kuliah->semester?></td>
														</tr>
<?php }} ?>
												</table>
										</div>
								</div>
							</div>
						</section>
						<br>
						<section class="team-section spad">
								<div class="container">
									<div class="section-title text-center" style="margin-bottom: 30px">
										<h3>Publication</h3>
									</div>
									<div class="row">
										
										<div id="publikasi" class="scrollable">
											<table>
												<tbody>
<?php if(count($publikasi) == 0){ ?>
													<tr>
														<td width="100%" class="text-center">No Publication</td>
													</tr>
<?php } else{
	foreach ($publikasi as $publikasi) {
?>															
													<tr>
														<td width="100%"><?=$publikasi->judul?></td>
													</tr>
<?php }} ?>
												</tbody>												
											</table>
										</div>

										<!--
										<div class="col-md-12">
											<ul class="nav nav-tabs nav-justified" style="justify-content: center">
												<li class="active"><a data-toggle="tab" href="#publikasi">Publikasi</a></li>
												<li><a data-toggle="tab" href="#penelitian">Penelitian</a></li>
												<li ><a data-toggle="tab" href="#pengabdian">Pengabdian</a></li>
											</ul>
											
											<div class="tab-content">
												
												<div id="penelitian" class="scrollable tab-pane fade active show in">
													<table>
															<tr>
																<th width="35%">Judul Penelitian</th>
																<th width="10%">Tahun</th>
																<th width="25%">Suber Dana</th>
																<th width="30%">Nama Dosen</th>
															</tr>
															<tr>
																<td>537.5: FOUR ELEMENTS ARRAY OF LUNGS SHAPE ANTENNA FOR NANOSATELLITE TELEMETRY</td>
																<td>2013</td>
																<td>Rp.50.000.000</td>
																<td>E Palantei<br>S Syarif<br>B Topalaguna<br>Z Ubaid</td>
															</tr>
													</table>
												</div>
												<div id="pengabdian" class=" scrollable tab-pane fade">
														<table>
																<tr>
																	<th width="35%">Judul Pengabdian</th>
																	<th width="10%">Tahun</th>
																	<th width="25%">Suber Dana</th>
																	<th width="30%">Nama Dosen</th>
																</tr>
																<tr>
																	<td>FOUR ELEMENTS ARRAY OF LUNGS SHAPE ANTENNA FOR NANOSATELLITE TELEMETRY</td>
																	<td>2013</td>
																	<td>Rp.50.000.000</td>
																	<td>E Palantei<br>S Syarif<br>B Topalaguna<br>Z Ubaid</td>
																</tr>
														</table>
													</div>
											</div>
										</div> -->
									</div>
								</div>
							</section>
							<br>
							<section class="team-section spad">
								<div class="container">
									<div class="section-title text-center" style="margin-bottom: 30px">
										<h3>Research</h3>
									</div>
									<div class="row">
											<div id="penelitian" class="scrollable">
												<table>
														<tr>
															<th width="80%">Research Title</th>
															<th width="20%">Year</th>
														</tr>
<?php if(count($penelitian) == 0){ ?>
														<tr>
															<th width="100%" class="text-center">No Research</td>
														</tr>
<?php } else{
	foreach ($penelitian as $penelitian) {
?>	
														<tr>
															<td><?=$penelitian->judul_penelitian?></td>
															<td><?=$penelitian->tahun_penelitian?></td>
														</tr>
<?php }} ?>
												</table>
											</div>
									</div>
								</div>
							</section>
							<br>
							<section class="team-section spad">
								<div class="container">
									<div class="section-title text-center" style="margin-bottom: 30px">
										<h3>Dedication</h3>
									</div>
									<div class="row">
										<div id="pengabdian" class="scrollable">
											<table>
													<tr>
														<th width="80%">Dedication Title</th>
														<th width="20%">Year</th>
													</tr>
<?php if(count($pengabdian) == 0){ ?>
													<tr>
														<th width="100%" class="text-center">No Dedication</td>
													</tr>
<?php } else{
	foreach ($pengabdian as $pengabdian) {
?>	
													<tr>
														<td><?=$pengabdian->judul_pengabdian?></td>
														<td><?=$pengabdian->tahun?></td>
													</tr>
<?php }} ?>
											</table>
										</div>
									</div>
								</div>
							</section>
							<br>
							<!--
							<section class="team-section ">
									<div class="container">
										<div class="section-title text-center" style="margin-bottom: 30px">
											<h3>Galeri</h3>
										</div>
										<div class="row">
											<div class="col-md-12">
													<div id="demo" class="carousel slide" data-ride="carousel">
															<ul class="carousel-indicators">
															  <li data-target="#demo" data-slide-to="0" class="active"></li>
															  <li data-target="#demo" data-slide-to="1"></li>
															  <li data-target="#demo" data-slide-to="2"></li>
															</ul>
															<div class="carousel-inner">
															  <div class="carousel-item active">
																<img src="https://2.bp.blogspot.com/-EHQhGRau2Aw/VzLTtiji06I/AAAAAAAAARg/MvH26rSCuNo0Gnz-miJfW2e-iMhIqOJxgCLcB/s1600/kampus.jpg" alt="Los Angeles" width="1100" height="500">
																<div class="carousel-caption">
																  <h3>Los Angeles</h3>
																  <p>We had such a great time in LA!</p>
																</div>  
															  </div>
															  <div class="carousel-item">
																<img src="https://2.bp.blogspot.com/-EHQhGRau2Aw/VzLTtiji06I/AAAAAAAAARg/MvH26rSCuNo0Gnz-miJfW2e-iMhIqOJxgCLcB/s1600/kampus.jpg" alt="Chicago" width="1100" height="500">
																<div class="carousel-caption">
																  <h3>Chicago</h3>
																  <p>Thank you, Chicago!</p>
																</div>  
															  </div>
															  <div class="carousel-item">
																<img src="https://2.bp.blogspot.com/-EHQhGRau2Aw/VzLTtiji06I/AAAAAAAAARg/MvH26rSCuNo0Gnz-miJfW2e-iMhIqOJxgCLcB/s1600/kampus.jpg" alt="New York" width="1100" height="500">
																<div class="carousel-caption">
																  <h3>New York</h3>
																  <p>We love the Big Apple!</p>
																</div>
															  </div>
															</div>
															<a class="carousel-control-prev" href="#demo" data-slide="prev">
															  <span class="carousel-control-prev-icon"></span>
															</a>
															<a class="carousel-control-next" href="#demo" data-slide="next">
															  <span class="carousel-control-next-icon"></span>
															</a>
													</div>
												</div>
										</div>
									</div>
								</section>-->
				</div>
				<!-- sidebar -->
				<!-- <div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					<div class="widget">
						<h5 class="widget-title">Latest News</h5>
						<div class="recent-post-widget"><?php foreach ($latest as $latest) { ?>
								<div class="rp-item">
									<div class="rp-thumb set-bg" data-setbg="<?=upload_url('blogs/thumbs').(!empty($latest->gambar) ? $latest->gambar : 'no_image.jpg')?>"></div>
									<div class="rp-content">
										<h6><a href="<?=site_url('berita/'.$latest->slug_en)?>"><?=$latest->judul_en?></a></h6>
										<p><i class="fa fa-clock-o"></i> <?=tgl_indo($latest->uat)?></p>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</section>
	<!--laboratorium detail end-->