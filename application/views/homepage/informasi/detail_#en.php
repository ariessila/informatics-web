    <div class="mahasiswa-site-breadcrumb">
        <div class="container">
            <a href=""><i class="fa fa-home"></i> Information</a> <i class="fa fa-angle-right"></i>
            <span class="title-page"><?=$title?></span>
        </div>
    </div>
    <!-- Blog page section  -->
	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="post-item post-details">
						<img src="<?=upload_url('informasi').(empty($informasi->gambar) ? 'no_image.png' : $informasi->gambar)?>" class="post-thumb-full" alt="">
						<div class="post-content">
							<h3><?=$informasi->judul_en?></h3>
							<div class="post-meta">
								<span><i class="fa fa-calendar-o"></i> <?=tgl_indo($informasi->iat)?></span>
								<span><i class="fa fa-user"></i> <?=$informasi->fullname?></span>
							</div>
							<?=$informasi->isi_en?>
						</div>
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					<!-- widget -->
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
				</div>
			</div>
		</div>
	</section>
	<!-- Blog page section end -->
