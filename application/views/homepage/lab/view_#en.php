	<!-- Breadcrumb section -->
	<div class="mahasiswa-site-breadcrumb" >
		<div class="container">
			<a href=""><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
			<span>Laboratory</span><i class="fa fa-angle-right"></i><span><?=$title?></span>
		</div>
	</div>
	<!-- Breadcrumb section end -->

	<!--laboratorium detail-->
	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
						<div class="section-title ">
								<h3 class="text-center"><?=$lab->lab_en?></h3>
								<p><?=$lab->isi_en?></p>
						</div>
						<section class="team-section">
							<div class="container">
								<div class="section-title text-center" style="margin-bottom: 30px">
									<h3>Head of Laboratory</h3>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="member">
											<div class="member-pic set-bg" data-setbg="<?=upload_url('dosen').(empty($ketua->foto_dosen) ? 'no_image.jpg' : $ketua->foto_dosen)?>">
											</div>
											<?php if ($ketua == null): ?>
											<h5> No Data Yet </h5>
											<?php else: ?>
											<h5><?=($ketua->gelar_depan != '' ? $ketua->gelar_depan . '. ' : '') . $ketua->nama_dosen . ($ketua->gelar_belakang != '' ? ', ' . $ketua->gelar_belakang : '')?></h5>
											<?php endif?>
										</div>
									</div>
								</div>
							</div>
						</section>
						<br>
						<section class="team-section spad">
								<div class="container">
									<div class="section-title text-center" style="margin-bottom: 30px">
										<h3>Lecturers</h3>
									</div>
									<div class="row">
									<?php foreach($anggota as $anggota) {
										$dosen = $this->crud_fakultas->gd('dosen',array('nip' => $anggota->dosen));?>
										<div class="col-md-4">
											<div class="member">
												<div class="member-pic set-bg" data-setbg="<?=upload_url('dosen').(empty($dosen->foto_dosen) ? 'no_image.jpg' : $dosen->foto_dosen)?>">
													<!--<div class="member-social">
														<a href=""><i class="fa fa-facebook"></i></a>
														<a href=""><i class="fa fa-twitter"></i></a>
														<a href=""><i class="fa fa-envelope"></i></a>
													</div>-->
												</div>
												<h6><?=($dosen->gelar_depan != '' ? $dosen->gelar_depan.'. ' : '').$dosen->nama_dosen.($dosen->gelar_belakang != '' ? ', '.$dosen->gelar_belakang : '')?></h6>
											</div>
										</div>
									<?php } ?>
									</div>
								</div>
							</section>
							<br>
							<section class="team-section ">
									<div class="container">
										<div class="section-title text-center" style="margin-bottom: 30px">
											<h3>Laboratory Photo</h3>
										</div>
										<div class="row">
											<div class="col-md-12">
													<div id="demo" class="carousel slide" data-ride="carousel">
															<!--<ul class="carousel-indicators">
															  <li data-target="#demo" data-slide-to="0" class="active"></li>
															  <li data-target="#demo" data-slide-to="1"></li>
															  <li data-target="#demo" data-slide-to="2"></li>
															</ul>-->
															<div class="carousel-inner">
															  <div class="carousel-item active">
																<img src="<?=upload_url('lab').(empty($lab->foto_lab) ? 'kampus.jpg' : $lab->foto_lab)?>" alt="Los Angeles" width="1100" height="500">
																<!--<div class="carousel-caption">
																  <h3>Los Angeles</h3>
																  <p>We had such a great time in LA!</p>
																</div> -->
															  </div>
															  <!--<div class="carousel-item">
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
															  </div>-->
															</div>
															<!--<a class="carousel-control-prev" href="#demo" data-slide="prev">
															  <span class="carousel-control-prev-icon"></span>
															</a>
															<a class="carousel-control-next" href="#demo" data-slide="next">
															  <span class="carousel-control-next-icon"></span>
															</a>-->
													</div>
												</div>
										</div>
									</div>
								</section>
				</div>
				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					<!-- widget -->
					<!--<div class="widget">
						<form class="search-widget">
							<input type="text" placeholder="Search...">
							<button><i class="ti-search"></i></button>
						</form>
					</div>-->
					<!-- widget -->
					<div class="widget">
						<h5 class="widget-title">Latest News</h5>
						<div class="recent-post-widget">
							<?php foreach ($latest as $latest) { ?>
							<!-- recent post -->
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
				</div>
			</div>
		</div>
	</section>
	<!--laboratorium detail end-->
