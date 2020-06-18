<div class="mahasiswa-site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i> Informasi</a> <i class="fa fa-angle-right"></i>
        <span class="title-page"><?=$title?></span>
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
                                <p>Data Tidak Ditemukan</p>
                            </div>
                        <?php } else{
                            
                        foreach ($informasi as $informasi) {
                            $isi_informasi = substr(strip_tags($informasi->isi), 0, 80).'...';
                        ?>
                        <div class="col-lg-6 post-list">
                            <div class="post-item">
                                <div class="post-all set-bg" data-setbg="<?=upload_url('informasi/thumbs').(empty($informasi->gambar) ? 'no_image.png' : $informasi->gambar)?>"></div>
                                <div class="post-content post-content-all">
                                    <h3><a href="<?=site_url('informasi/'.$informasi->slug)?>"><?=$informasi->judul?></a></h3>
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
                        <!-- <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li> -->
                        <?=(isset($pagination) ? $pagination.'<br/>' : '')?>
                        <!-- <?=var_dump($pagination)?> -->
                    </ul>
				</div>
				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					<!-- widget -->
					<div class="widget">
                        <form id="search-additional-form" method="GET" class="search-widget">
                            <input type="text" name="q" value="<?=($this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : '')?>" placeholder="Cari informasi..." class="form-control"/>
                            <button class="aside-submit"><i class="icon fa fa-search"></i></button>
                        </form>
					</div>
					<!-- widget -->
					<div class="widget">
						<h5 class="widget-title">Informasi Terbaru</h5>
						<div class="recent-post-widget">
							<?php foreach ($latest as $latest) { ?>
								<!-- recent post -->
								<div class="rp-item">
									<div class="rp-thumb set-bg" data-setbg="<?=upload_url('informasi/thumbs').(!empty($latest->gambar) ? $latest->gambar : 'no_image.png')?>"></div>
									<div class="rp-content">
										<h6><a href="<?=site_url('informasi/'.$latest->slug)?>"><?=$latest->judul?></a></h6>
										<p><i class="fa fa-clock-o"></i> <?=tgl_indo($latest->iat)?></p>
									</div>
								</div>
							<?php } ?>
							
						</div>
					</div>
					<!-- widget -->
				</div>
			</div>
		</div>
	</section>
    <!-- Blog page section end -->
