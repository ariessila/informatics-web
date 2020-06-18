<div class="mahasiswa-site-breadcrumb">
        <div class="container">
            <a href=""><i class="fa fa-home"></i> Berita</a> <i class="fa fa-angle-right"></i>
            <span class="title-page"><?=$title?></span>
        </div>
</div>
    <!-- Blog page section  -->
	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="post-item post-details">
						<img src="<?=upload_url('blogs').(empty($blogs->gambar) ? 'no_image.png' : $blogs->gambar)?>" class="post-thumb-full" alt="">
						<div class="post-content">
							<h3><?=$blogs->judul_id?></h3>
							<div class="post-meta">
								<span><i class="fa fa-calendar-o"></i> </i> <?=tgl_indo($blogs->iat)?></span>
								<span><i class="fa fa-user"></i> <?=$blogs->fullname?></span>
								<span><i class="fa fa-tag"></i> <?=$blogs->kategori?></span>
							</div>
							<?=$blogs->isi_id?>
						</div>
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					<!-- widget -->
					<div class="widget">
						<h5 class="widget-title">Berita Terbaru</h5>
						<div class="recent-post-widget">
							<?php foreach ($latest as $latest) { 
								if($latest->id_blog == $blogs->id_blog)
									continue;
								?>
								<!-- recent post -->
								<div class="rp-item">
									<div class="rp-thumb set-bg" data-setbg="<?=upload_url('blogs/thumbs').(!empty($latest->gambar) ? $latest->gambar : 'no_image.png')?>"></div>
									<div class="rp-content">
										<h6><a href="<?=site_url('berita/'.$latest->slug_id)?>"><?=$latest->judul_id?></a></h6>
										<p><i class="fa fa-clock-o"></i></i> <?=tgl_indo($blogs->iat)?></p>
									</div>
								</div>
							<?php } ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog page section end -->
