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
								<a class="site-btn" href="<?=base_url('news').$headline->id_blog?>">Read More</a>
							</div>
						</div>
					</div>
				</div>
            </div>
<?php } ?>
		</div>
	</section>
	<!-- Hero section end -->
