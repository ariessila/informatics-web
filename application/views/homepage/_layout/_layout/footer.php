<!-- Footer section -->
	<footer class="footer-section">
		<div class="container footer-top">
			<div class="row">
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<div class="about-widget">
						<a href="https://unhas.ac.id/"><img src="<?=home_assets()?>img/unhas.png" alt=""></a>
					</div>
					<div class="about-widget">
						<img src="<?=home_assets()?>img/logo-cot.png" alt="">
					</div>
				</div>
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">Link Penting</h6>
					<div class="dobule-link">
						<ul>
							<li><a href="http://sim.unhas.ac.id/">Portal Akademik</a></li>
							<li><a href="https://mail.unhas.ac.id/mail/">Webmail UNHAS</a></li>
							<li><a href="http://apps.unhas.ac.id/dashboard/index.php/login">Portal Dosen UNHAS</a></li>
							<li><a href="http://pasca.unhas.ac.id/">Sekolah Pasca Sarjana UNHAS</a></li>
							<li><a href="https://ristekdikti.go.id/">Ristekdikti</a></li>
							<li><a href="https://banpt.or.id/">BAN-PT</a></li>
						</ul>
						<ul>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">Terakreditasi Oleh</h6>
					<div class="dobule-link">
						<ul>
							<li style="background-color: white; margin: 7px 2px;"><img class="img-partner" src="<?=home_assets()?>img/partner/ban-pt.png"></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">CONTACT</h6>
					<ul class="contact">
						<li><p><i class="fa fa-map-marker"></i> Jln. Poros Malino Km.6, Gowa</p></li>
					</ul>
				</div>
				<!-- <div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">Informasi</h6>
					<ul class="recent-post">
					<?php

					$information = $this->crud->gwlo('informasi', array('publikasi' => 'Publish'), 2,0, 'uat DESC');

					foreach ($information as $item) { ?>
						<li>
							<a href="<?=site_url('informaton/').$item->slug?>">
								<p><?=$item->judul?></p>
							</a>
							<span><i class="fa fa-calendar-o"></i><?=tgl_indo($item->iat)?></span>
						</li>
					<?php } ?>
						
					</ul>
				</div> -->
			</div>
		</div>
		<!-- copyright -->
		<div class="copyright">
			<div class="container">
				<p>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;
					<script>document.write(new Date().getFullYear());</script> All rights reserved
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>
	<!-- Footer section end-->



	<!--====== Javascripts & Jquery ======-->
	<script src="<?=home_assets()?>js/jquery-3.2.1.min.js"></script>
	<script src="<?=home_assets()?>js/bootstrap.min.js"></script>
	<script src="<?=home_assets()?>js/owl.carousel.min.js"></script>
	<script src="<?=home_assets()?>js/jquery.countdown.js"></script>
	<script src="<?=home_assets()?>js/masonry.pkgd.min.js"></script>
	<script src="<?=home_assets()?>js/magnific-popup.min.js"></script>
    <script src="<?=home_assets()?>js/main.js"></script>
    <script>
        function switch_lang(lang) {
            $.ajax({
                type: "GET",
                url: "<?=site_url('lang/')?>" + lang,
            }).done(function(response) {
                // if (response != '') location.href("<?=site_url()?>/" + response);
                if (response == 'oke') location.reload();
            });
        };
    </script>
<?php if ($this->uri->segment(1) != '') { if ($this->uri->segment(2) == '') { ?>
    <script>
        $(document).ready(function(){
            $('title').html($('.title-page').html() + ' | Universitas Hasanuddin');
        });
    </script>
<?php }} ?>
	
</body>
</html>
