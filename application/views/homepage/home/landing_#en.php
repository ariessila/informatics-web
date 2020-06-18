<?php
    // load overlay color from database somehow
	$overlay_color = $this->crud->gd('website_setting', array('id_website_setting' => 2));
?>
	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
<?php
    $headline = $this->crud->gwlo('headline', array('status' => 'Publish'), 4, 0, 'urutan ASC');
    foreach ($headline as $headline) {
?>
            <div class="hs-item set-bg" data-setbg="<?=upload_url('headline').$headline->gambar?>">
                <div class="hs-text">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<h2 class="hs-title"><?=$headline->judul_en?></h2>
								<p class="hs-des"><?=$headline->deskripsi_en?></p>
<?php if($headline->external!= NULL) { ?>
								<div class="site-btn"><a class="nbutton" href="<?=$headline->external?>">Baca Selengkapnya</a></div>
<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php } ?>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Ucapan Selamat section  -->
	<section class="counter-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="counter-content">
						<h2>Welcome to Department of Informatics Hasanuddin University</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Ucapan Selamat end -->

	<!-- Akademik section -->
	<section class="enroll-section spad set-bg" data-setbg="<?=home_assets()?>img/informatika/komputer.png">
		<div class="container">
			<div class="col-lg-12">
				<div class="counter-content">
					<div class="" style="margin-bottom: 20px">
						<h2 style="color:white; font-size: 30px; margin-bottom: 0px">Academic</h2>
					</div>
				</div>
			</div>
			<ul class="nav nav-tabs">
				<li class="nav-item landing-page active" style="text-align:center;"><a class="btn-s1 tab-akademik" href="#s1" data-toggle="tab">Program Sarjana</a></li>
				<li class="nav-item landing-page"><a class="btn-s2 tab-akademik" href="#s2" style="text-align:center;" data-toggle="tab">Program Magister</a></li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade-animation show active" id="s1" role="tabpanel" aria-labelledby="s1-tab">
					<div class="col-lg-12" style="padding: 50px 25px 25px 25px;">
						<div class="row">
							<div class="col-lg-6">
								<img src="<?=home_assets()?>/img/informatika/studio.png" alt="" style="border-radius: 10px;">
							</div>
							<div class="col-lg-6">
								<div class="enroll-list text-white" style="padding: 68px 0px;">
									<div class="enroll-list-item">
										<span>S.1</span>
										<h5>Bachelor Program</h5>
										<p>Bachelor program develops a quality education program.</p>
										<a class="site-btn" href="<?=base_url('academic/bachelor-program')?>">Read More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade-animation" id="s2" role="tabpanel" aria-labelledby="s2-tab">
					<div class="col-lg-12" style="padding: 50px 25px 25px 25px;">
						<div class="row">
							<div class="col-lg-6">
								<img src="<?=home_assets()?>/img/informatika/drone.png" alt="" style="border-radius: 10px;">
							</div>
							<div class="col-lg-6">
								<div class="enroll-list text-white" style="padding: 68px 0px;">
									<div class="enroll-list-item">
										<span>S.2</span>
										<h5>Masters Program</h5>
										<p>A master of informatics has sufficient knowledge and is able to develop his expertise in following the progress of science and the needs of society.</p>
										<a class="site-btn" href="<?=base_url('academic/master-program')?>">Read More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Akademik section end -->

	<!-- Laboratorium -->
	<section class="beranda-laboratorium spad">
		<div class="container">
			<div class="col-lg-12">
				<div class="counter-content">
					<div class="bottom-lined-center">
						<h2 style="color:black; font-size: 30px; margin-bottom: 0px;">Laboratorium</h2>
					</div>
				</div>
			</div>
		</div>
		<div >
			<div class="owl-carousel owl-theme">
<?php
	if(count($lab) == 0){ ?>
				<div class="col-lg-12 text-center">
					<p>File not Found</p>
				</div>
<?php } else{
foreach ($lab as $lab) {
?>
				<div class="spad">
					<div class="hovereffect">
						<img class="img-responsive" src="<?=upload_url('lab/').(empty($lab->foto_lab) ? 'kampus.jpg' : $lab->foto_lab)?>" alt="">
						<div class="overlay">
							<h2><?=$lab->lab_en?></h2>
							<a class="info" href="<?=site_url('lab/').$lab->slug_en?>">selengkapnya</a>
						</div>
					</div>
				</div>
<?php }} ?>
			</div>
		</div>
	</section>
	<!-- Laboratorium -->

	<!--kemahasiswaan alumni, dan informasi -->
	<section class="enroll-section spad set-bg" data-setbg="<?=home_assets()?>img/informatika/gedung.png">
		<div class="container">
			<div class="col-lg-12">
				<div class="counter-content">
					<div class="" style="margin-bottom: 20px">
						<h2 style="color:white; font-size: 30px; margin-bottom: 0px">Students and Alumni</h2>
					</div>
				</div>
			</div>
			<ul class="nav nav-tabs">
				<li class="nav-item landing-page active" style="text-align:center;"><a class="btn-s1 tab-akademik" href="#mahasiswa" data-toggle="tab">Kemahasiswaan</a></li>
				<li class="nav-item landing-page"><a class="btn-s2 tab-akademik" href="#alumni" style="text-align:center;" data-toggle="tab">Alumni</a></li>
			</ul>
			<div class="col-lg-12" style="padding: 50px 25px 25px 25px;">
				<div class="row">
					<div class="col-lg-6">
						<img src="<?=home_assets()?>img/informatika/mahasiswa.png" alt="" style="border-radius: 10px;" alt="" style="border-radius: 10px;">
					</div>
					<div class="col-lg-6">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade-animation show active" id="mahasiswa" role="tabpanel" aria-labelledby="mahasiswa-tab">
								<div class="enroll-list text-white" style="padding: 68px 0px;">
									<div class="enroll-list-item">
										<h5>Students</h5>
										<p>Informatics students are able to choose solutions to problems in the field of engineering that can be accounted for in terms of safety, economics and technicality.</p>
										<a class="site-btn" href="<?=base_url('students')?>">Read More</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade-animation" id="alumni" role="tabpanel" aria-labelledby="alumni-tab">
								<div class="enroll-list text-white" style="padding: 68px 0px;">
									<div class="enroll-list-item">
										<h5>Alumni</h5>
										<p>Alumni are able to innovate in the electro field effectively and efficiently.</p>
										<a class="site-btn" href="<?=base_url('alumnus')?>">Read More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--kemahasiswaan alumni, dan informasi -->

	<!--riset dan kerjasama section-->
	<section class="blog-section spad ">
		<div class="container">
			<div class="counter-content" style="margin-bottom:20px;">
				<h2 class="bottom-lined-center" style="color:black; font-size: 30px">Riset dan Kerjasama</h2>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="card-view" style="margin:5px">
						<div id="beranda-penelitian" class="counter-content">
							<div class="risetdankerjasama-icon" style="margin-bottom: 5px;">
								<i class="ti-agenda" style="color:black"></i>
							</div>
							<h5 style="color:black; font-weight: 400; font-size: 22px; margin-bottom: 10px;">RESEARCH</h5>
							<p style="color:black">The following are the results of the latest research conducted by Informatics lecturers.</p>
							<a class="site-btn arrow" href="<?=base_url('research')?>">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-view" style="margin:5px">
						<div id="beranda-publikasi" class="counter-content">
							<div class="risetdankerjasama-icon" style="margin-bottom: 5px;">
								<i class="ti-write" style="color:black"></i>
							</div>
							<h5 style="color:black; font-weight: 400; font-size: 22px; margin-bottom: 10px;">PUBLICATION</h5>
							<p style="color:black">The following are the results of the latest publications conducted by Informatics lecturers.</p>
							<a class="site-btn" href="<?=base_url('publication')?>">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-view" style="margin:5px">
						<div id="beranda-kerjasama" class="counter-content">
							<div class="risetdankerjasama-icon" style="margin-bottom: 5px;">
								<i class="fa fa-handshake-o" style="color:black"></i>
							</div>
							<h5 style="color:black;font-weight: 400; font-size: 22px; margin-bottom: 10px;">COOPERATION</h5>
							<p style="color:black">The Department of Informatics has a strong tradition of collaborating with external parties.</p>
							<a class="site-btn" href="<?=base_url('cooperation')?>">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--riset dan kerjasama section end-->

	<!-- Graph section -->
	<section class="enroll-section spad set-bg" data-setbg="<?=home_assets()?>img/informatika/aimp.png">
		<div class="container">
			<div class="row">
				<div class="col-lg-12" style="margin-bottom: 30px;">
					<div class="counter-content">
						<h2 style="color:white; font-size: 20px; margin-bottom: 25px">Total Followers</h2>
					</div>
					<div style="background-color: #ffffffc9; border-radius: 10px">
						<div id="peminat_chart" style="height: 250px;"></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="counter-content">
						<h2 style="color:white; font-size: 20px; margin-bottom: 25px">Total Researches</h2>
					</div>
					<div style="background-color: #ffffffc9; border-radius: 10px">
						<div id="penelitian_chart" style="height: 250px;"></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="counter-content">
						<h2 style="color:white; font-size: 20px; margin-bottom: 25px">Total Publications</h2>
					</div>
					<div style="background-color: #ffffffc9; border-radius: 10px">
						<div id="publikasi_chart" style="height: 250px;"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Grafik section end -->

	<!-- Blog section -->
	<section class="spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-9" style="margin-bottom:30px;">
					<div class="home-blog" style="margin-bottom:20px;">
						<h3 style="color:black; font-size: 30px">NEWS</h3>
					</div>
					<?php foreach ($new as $new) {
						$new_blog = substr(strip_tags($new->isi_en), 0, 180).'...';?>
						<a href="<?=site_url('berita/').$new->slug_en?>">
							<div style="padding-right:20px">
								<div class="col-lg-12 fill" style="padding-left:0px;padding-right:0px; height: 450px; background-image:url(<?=upload_url('blogs').(empty($new->gambar) ? 'no_image.png' : $new->gambar)?>); border-radius: 10px; position:relative; background-size: cover; background-repeat: no-repeat; background-position: center center;">
									<div style="background-color:#5a461899; width:100%; height:40%; position: absolute; bottom:0px;">
										<h3 style="font-size: 25px; color:#fff; margin: 20px 30px;">
											<?=$new->judul_en?>
										</h3>
										<div style="color:#fff; margin: 10px 40px;">
											<p style="color:#fff;"><?=$new_blog?></p>
										</div>
									</div>
								</div>
							</div>
						</a>
				<?php } ?>
				</div>
				<div class="col-lg-3">
					<div class="home-blog" style="margin-bottom: 20px">
						<h3 style="color:black; font-size: 30px">INFORMATION</h3>
					</div>
					<?php
                        if(count($informasi) == 0){ ?>
                            <div class="col-lg-12 text-center">
                                <p>File not Found</p>
                            </div>
                        <?php } else{
						if($informasi != null){
							foreach ($informasi as $informasi) {
					?>
						<div class="blog-item" style="margin-bottom:0">
							<div class="blog-content" style="padding-left:0;">
								<a href="<?=site_url('information/'.$informasi->slug_en)?>" class="blog-title"><h4><?=$informasi->judul_en?></h4></a>
								<div class="blog-meta">
									<span><i class="fa fa-calendar-o"></i> <?=tgl_indo($informasi->iat)?></span>
								</div>
							</div>
						</div>
					<?php }}?>
					<div style="text-align:right;">
						<a href="<?=base_url('information')?>" style="font-size: 14px;"><i>Read More >></i></a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<section class="blog-section spad">
		<div class="container">
			<div class="row">
				<?php
                if(count($blogs_nasional) == 0){ ?>
                    <div class="col-lg-12 text-center">
                        <p>File not Found</p>
                    </div>
                <?php } else{
					foreach ($blogs_nasional as $blogs_nasional) {
						$isi_blogs_nasional = substr(strip_tags($blogs_nasional->isi_en), 0, 100).'...';
				?>
				<div class="col-xl-4">
					<div class="blog-item">
						<a href="<?=site_url('news/').$blogs_nasional->slug_en?>"><div class="blog-thumb set-bg" data-setbg="<?=upload_url('blogs/thumbs').(empty($blogs_nasional->gambar) ? 'no_image.png' : $blogs_nasional->gambar)?>"></div></a>
						<div class="blog-content">
							<a href="<?=site_url('news/').$blogs_nasional->slug_en?>" class="blog-title"><h4><?=$blogs_nasional->judul_en?></h4></a>
							<p style="color: #495057;"><?=$isi_blogs_nasional?></p>
							<div class="blog-meta">
								<span><i class="fa fa-calendar-o"></i><?=tgl_indo($blogs_nasional->iat)?></span></br>
								<span><i class="fa fa-user"></i> <?=$blogs_nasional->fullname?></span>
							</div>
						</div>
					</div>
				</div>
				<?php }} ?>
				<div class="col-lg-12" style="text-align:right;">
					<a href="<?=base_url('berita')?>" style="font-size: 14px;"><i>Read More >></i></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section -->

	<!-- Video -->
	<section class="enroll-section spad set-bg" style="padding: 20px 0px" data-setbg="<?=home_assets()?>img/smartc.jpg">
		<div class="container">
			<div class="counter-content">
				<div class="" style="margin: 20px 0px">
					<h2 style="color:white; font-size: 26px; margin-bottom: 0px">Profil Departemen</h2>
				</div>
			</div>
			<div style="padding:20px 100px">
				<video class="col-12" src="<?=home_assets()?>img/video_informatika.mp4" controls></video>
			</div>
		</div>
	</section>
