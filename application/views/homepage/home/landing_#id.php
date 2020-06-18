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
								<h2 class="hs-title"><?=$headline->judul?></h2>
								<p class="hs-des"><?=$headline->deskripsi?></p>
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
						<h2>Selamat Datang di Departemen Teknik Informatika Universitas Hasanuddin</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Ucapan Selamat end -->

	<!-- Akademik section -->
	<?php $akademik = $this->crud->gd('p_akademik', array('id' => 1));
	?>
	<section class="enroll-section spad set-bg" data-setbg="<?=home_assets()?>img/informatika/komputer.png">
		<div class="container">
			<div class="col-lg-12">
				<div class="counter-content">
					<div class="" style="margin-bottom: 20px">
						<h2 style="color:white; font-size: 30px; margin-bottom: 0px">Akademik</h2>
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
								<img src="<?=upload_url('pengaturan').$akademik->gambar_sar?>" alt="" style="border-radius: 10px;">
							</div>
							<div class="col-lg-6">
								<div class="enroll-list text-white" style="padding: 68px 0px;">
									<div class="enroll-list-item">
										<span>S.1</span>
										<h5>Program Sarjana</h5>
										<p>Program Studi S1 Teknik Informatika mengembangkan sebuah program pendidikan yang berkualitas dan mampu menempa peserta didik untuk dapat bersaing di dunia kerja Industri Teknologi Indonesia.</p>
										<a class="site-btn" href="<?=base_url('akademik/program-sarjana')?>">Selengkapnya</a>
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
								<div class="enroll-list text-white" style="padding: 68px 0px;">
									<div class="enroll-list-item">
										<span>S.2</span>
										<h5>Program Magister</h5>
										<p>S2 Teknik Informatika yang memiliki pengetahuan cukup dan mampu mengembangkan keahliannya dalam mengikuti kemajuan ilmu dan kebutuhan masyarakat.</p>
										<a class="site-btn" href="<?=base_url('akademik/program-magister')?>">Selengkapnya</a>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<img src="<?=home_assets()?>/img/informatika/drone.png" alt="" style="border-radius: 10px;">
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
							<h2><?=$lab->lab_id?></h2>
							<a class="info" href="<?=site_url('lab/').$lab->slug_id?>">selengkapnya</a>
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
						<h2 style="color:white; font-size: 30px; margin-bottom: 0px">Kemahasiswaan dan Alumni</h2>
					</div>
				</div>
			</div>
			<ul class="nav nav-tabs">
				<li class="nav-item landing-page active" style="text-align:center;"><a class="btn-s1 tab-akademik" href="#s11" data-toggle="tab">Kemahasiswaan</a></li>
				<li class="nav-item landing-page"><a class="btn-s2 tab-akademik" href="#s22" style="text-align:center;" data-toggle="tab">Alumni</a></li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade-animation show active" id="s11" role="tabpanel" aria-labelledby="s1-tab">
					<div class="col-lg-12" style="padding: 50px 25px 25px 25px;">
						<div class="row">
							<div class="col-lg-6">
								<img src="<?=home_assets()?>/img/informatika/mahasiswa.png" alt="" style="border-radius: 10px;">
							</div>
							<div class="col-lg-6">
								<div class="enroll-list text-white" style="padding: 68px 0px;">
									<div class="enroll-list-item">
										<h5>Mahasiswa</h5>
										<p>Mahasiswa Teknik Informatika mampu memilih penyelesaian persoalan bidang teknik yang dapat dipertanggunjawabkan dari segi keselamatan, ekonomi dan teknis.</p>
										<a class="site-btn" href="<?=base_url('students')?>">Selengkapnya</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade-animation" id="s22" role="tabpanel" aria-labelledby="s2-tab">
					<div class="col-lg-12" style="padding: 50px 25px 25px 25px;">
						<div class="row">
							<div class="col-lg-6">
								<div class="enroll-list text-white" style="padding: 68px 0px;">
									<div class="enroll-list-item">
										<h5>Alumni</h5>
										<p>Alumni Teknik Informatika mampu melakukan inovasi di bidang Informatika dengan efektif dan efisien.</p>
										<a class="site-btn" href="<?=base_url('alumnus')?>">Selengkapnya</a>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<img src="<?=home_assets()?>/img/informatika/drone.png" alt="" style="border-radius: 10px;">
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
							<h5 style="color:black; font-weight: 400; font-size: 22px; margin-bottom: 10px;">PENELITIAN</h5>
							<p style="color:black;">Berikut merupakan hasil penelitian terakhir yang telah dilakukan oleh dosen Teknik Informatika</p>
							<a class="site-btn arrow" href="<?=base_url('penelitian')?>">Selengkapnya</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-view" style="margin:5px">
						<div id="beranda-publikasi" class="counter-content">
							<div class="risetdankerjasama-icon" style="margin-bottom: 5px;">
								<i class="ti-write" style="color:black"></i>
							</div>
							<h5 style="color:black; font-weight: 400; font-size: 22px; margin-bottom: 10px;">PUBLIKASI</h5>
							<p style="color:black;">Berikut merupakan hasil publikasi terakhir yang telah dilakukan oleh dosen Teknik Informatika</p>
							<a class="site-btn" href="<?=base_url('publikasi')?>">Selengkapnya</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-view" style="margin:5px">
						<div id="beranda-kerjasama" class="counter-content">
							<div class="risetdankerjasama-icon" style="margin-bottom: 5px;">
								<i class="fa fa-handshake-o" style="color:black"></i>
							</div>
							<h5 style="color:black;font-weight: 400; font-size: 22px; margin-bottom: 10px;">KERJASAMA</h5>
							<p style="color:black;">Departemen Teknik Informatika memiliki tradisi yang kuat dalam menjalin kerjasama dengan pihak eksternal</p>
							<a class="site-btn" href="<?=base_url('kerjasama')?>">Selengkapnya</a>
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
						<h2 style="color:white; font-size: 20px; margin-bottom: 25px">Jumlah Peminat</h2>
					</div>
					<div style="background-color: #ffffffc9; border-radius: 10px">
						<div id="peminat_chart" style="height: 250px;"></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="counter-content">
						<h2 style="color:white; font-size: 20px; margin-bottom: 25px">Jumlah Penelitian</h2>
					</div>
					<div style="background-color: #ffffffc9; border-radius: 10px">
						<div id="penelitian_chart" style="height: 250px;"></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="counter-content">
						<h2 style="color:white; font-size: 20px; margin-bottom: 25px">Jumlah Publikasi</h2>
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
						<h3 style="color:black; font-size: 30px">BERITA</h3>
					</div>
					<?php foreach ($new as $new) {
						$new_blog = substr(strip_tags($new->isi_id), 0, 180).'...';?>
						<a href="<?=site_url('berita/').$new->slug_id?>">
							<div style="padding-right:20px">
							<div class="col-lg-12 fill" style="padding-left:0px;padding-right:0px; height: 450px; background-image:url(<?=upload_url('blogs').(empty($new->gambar) ? 'no_image.png' : $new->gambar)?>); border-radius: 10px; position:relative; background-size: cover; background-repeat: no-repeat; background-position: center center;">
								<!-- <div style="background-image:url(img/beranda/home.JPG); border-radius: 10px;"></div> -->
								<!-- <img src="img/beranda/home.JPG" alt="" style="border-radius: 10px;"> -->
								<div style="background-color:#5a461899; width:100%; height:40%; position: absolute; bottom:0px;">
									<h3 style="font-size: 25px; color:#fff; margin: 20px 30px;">
										<?=$new->judul_id?>
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
						<h3 style="color:black; font-size: 30px">INFORMASI</h3>
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
								<a href="<?=site_url('information/'.$informasi->slug)?>" class="blog-title"><h4><?=$informasi->judul?></h4></a>
								<div class="blog-meta">
									<span><i class="fa fa-calendar-o"></i> <?=tgl_indo($informasi->iat)?></span>
								</div>
							</div>
						</div>
					<?php }}?>
					<div style="text-align:right;">
						<a href="<?=base_url('informasi')?>" style="font-size: 14px;"><i>Selengkapnya >></i></a>
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
						$isi_blogs_nasional = substr(strip_tags($blogs_nasional->isi_id), 0, 100).'...';
				?>
				<div class="col-xl-4">
					<div class="blog-item">
						<a href="<?=site_url('berita/').$blogs_nasional->slug_id?>"><div class="blog-thumb set-bg" data-setbg="<?=upload_url('blogs/thumbs').(empty($blogs_nasional->gambar) ? 'no_image.png' : $blogs_nasional->gambar)?>"></div></a>
						<div class="blog-content">
							<a href="<?=site_url('berita/').$blogs_nasional->slug_id?>" class="blog-title"><h4><?=$blogs_nasional->judul_id?></h4></a>
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
					<a href="<?=base_url('berita')?>" style="font-size: 14px;"><i>Selengkapnya >></i></a>
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
