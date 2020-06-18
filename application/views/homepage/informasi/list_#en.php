<div class="mahasiswa-site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i> Information</a> <i class="fa fa-angle-right"></i>
        <span class="title-page">All Information</span>
    </div>
</div>
<!-- Blog page section  -->
	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 post-list">
                    <div class="row">
                        <?php
                        if(count($informasi) == 0){ ?>
                            <div class="col-lg-12 text-center">
                                <h2>No Information</h3>
                            </div>
                        <?php } else{

                        foreach ($informasi as $informasi) {
                            $isi_informasi = substr(strip_tags($informasi->isi_en), 0, 80).'...';
                        ?>
                        <div class="col-lg-6 post-list">
                            <div class="post-item">
                                <div class="post-all set-bg" data-setbg="<?=upload_url('informasi/thumbs').(empty($informasi->gambar) ? 'no_image.png' : $informasi->gambar)?>"></div>
                                <div class="post-content post-content-all">
                                    <h3><a href="<?=site_url('information/'.$informasi->slug_en)?>"><?=$informasi->judul_en?></a></h3>
                                    <div class="post-meta post-meta-all">
                                        <span><i class="fa fa-calendar-o"></i> <?=tgl_indo($informasi->iat)?></span>
                                        <span><i class="fa fa-user"></i> <?=$informasi->fullname?></span>
                                    </div>
                                    <p><?=$isi_informasi?></p>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>

                    <ul class="site-pageination">
                        <?=(isset($pagination) ? $pagination : '')?>
                    </ul>
				</div>
				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					<!-- widget -->
					<div class="widget">
						<h5 class="widget-title">Latest Information</h5>
						<div class="recent-post-widget">
                         <?php
                        if(count($latest) == 0){ ?>
                            <div class="col-lg-12 text-center">
                                <p>No Latest Information</p>
                            </div>
                        <?php } else{
                         foreach ($latest as $latest) { ?>
								<!-- recent post -->
								<div class="rp-item">
									<div class="rp-thumb set-bg" data-setbg="<?=upload_url('informasi/thumbs').(!empty($latest->gambar) ? $latest->gambar : 'no_image.png')?>"></div>
									<div class="rp-content">
										<h6><a href="<?=site_url('informasi/'.$latest->slug_en)?>"><?=$latest->judul_en?></a></h6>
										<p><i class="fa fa-clock-o"></i> <?=tgl_indo($latest->iat)?></p>
									</div>
								</div>
							<?php }} ?>

						</div>
					</div>
					<!-- widget -->
				</div>
			</div>
		</div>
	</section>
    <!-- Blog page section end -->
