<?php
// load overlay color from database somehow
$overlay_color = $this->crud->gd('website_setting', array('id_website_setting' => 2));
?>
<!-- Footer section -->
	<footer class="footer-section" style="background-color:#<?php echo $overlay_color->warna ?>">
		<div class="container footer-top">
			<div class="row">
				<!-- widget -->
				<div class="section-title col-sm-6 col-lg-3 footer-widget">
					<h3>Accreditation</h3>
                    <p>Our Quality Asssured By</p>
						<div class="about-widget">
							<a href="https://unhas.ac.id/"><img src="<?=home_assets()?>img/ban-pt.png" alt=""></a>
						</div>
				</div>
				<div class="col-sm-6 col-lg-5 footer-widget akreditasi">
					<h5>Bachelor Program : A accreditation (BAN-PT)</h5>
                    <h5>Master Program : A accreditation (BAN-PT)</h5>
				</div>
				<div class="col-sm-6 col-lg-4 footer-widget">
					<h6 class="fw-title">CONTACT</h6>
					<ul class="contact">
					<li><p><i class="fa fa-map-marker"></i> Jln. Poros Malino Km.6, Kabupaten Gowa, Sulawesi Selatan 92119.<br><i class="fa fa-envelope"></i>  informatika@unhas.ac.id</p></li>
					</ul>
				</div>
				<!-- <div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">Informasi</h6>
					<ul class="recent-post">
					<?php

$information = $this->crud->gwlo('informasi', array('publikasi' => 'Publish'), 2, 0, 'uat DESC');

foreach ($information as $item) {?>
						<li>
							<a href="<?=site_url('informaton/') . $item->slug?>">
								<p><?=$item->judul?></p>
							</a>
							<span><i class="fa fa-calendar-o"></i><?=tgl_indo($item->iat)?></span>
						</li>
					<?php }?>

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
	<script src="<?=home_assets()?>js/raphael.min.js"></script>
	<script src="<?=home_assets()?>js/bootstrap.min.js"></script>
	<script src="<?=home_assets()?>js/owl.carousel.min.js"></script>
	<script src="<?=home_assets()?>js/jquery.countdown.js"></script>
	<script src="<?=home_assets()?>js/masonry.pkgd.min.js"></script>
	<script src="<?=home_assets()?>js/magnific-popup.min.js"></script>
	<script src="<?=home_assets()?>js/morris.min.js"></script>
    <script src="<?=home_assets()?>js/main.js"></script>
    <script>
        function switch_lang(lang) {
            $.ajax({
                type: "GET",
                url: "<?=site_url('lang/')?>" + lang,
            }).done(function(response) {
                // if (response != '') location.href("<?=site_url()?>/" + response);
                if (response == 'oke') window.location = '<?=base_url()?>';
            });
        };
    </script>
<?php if ($this->uri->segment(1) != '') {if ($this->uri->segment(2) == '') {?>
    <script>
        $(document).ready(function(){
            $('title').html($('.title-page').html() + ' | Universitas Hasanuddin');
        });
    </script>
<?php }}?>

</body>
</html>
