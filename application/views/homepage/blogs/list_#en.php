<div class="mahasiswa-site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i> News</a> <i class="fa fa-angle-right"></i>
        <span class="title-page"><?=$title_en?></span>
    </div>
</div>
<!-- Blog page section  -->
	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 post-list">
                    <div class="row">
                        <?php
                        if(count($blogs) == 0){ ?>
                            <div class="col-lg-12 text-center">
                                <p>File not Found</p>
                            </div>
                        <?php } else{
                            
                        foreach ($blogs as $blogs) {
                                $isi_blogs = substr(strip_tags((($blogs->isi_en) ? $blogs->isi_en : $blogs->isi_id)), 0, 80).'...';
                            ?>
                            <div class="col-lg-6 post-list">
                                <div class="post-item">
                                    <div class="post-all set-bg" data-setbg="<?=upload_url('blogs/thumbs').(empty($blogs->gambar) ? 'no_image.jpg' : $blogs->gambar)?>"></div>
                                    <div class="post-content post-content-all">
                                        <h3><a href="<?=site_url('news/'.(($blogs->slug_en) ? ($blogs->slug_en) : ($blogs->slug_id)))?>"><?=(($blogs->judul_en) ? $blogs->judul_en : $blogs->judul_id)?></a></h3>
                                        <div class="post-meta post-meta-all">
                                            <span><i class="fa fa-calendar-o"></i> <?=tgl_indo($blogs->iat)?></span>
                                            <span><i class="fa fa-user"></i> <?=$blogs->fullname?></span>
                                        </div>
                                        <p><?=$isi_blogs?></p>
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
					<div class="widget" id="search-wid">
                        <form id="search-additional-form" method="GET" class="search-widget">
                            <input type="text" name="q" value="<?=($this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : '')?>" placeholder="Search..." class="form-control"/>
                            <button class="aside-submit"><i class="icon fa fa-search"></i></button>
                        </form>
					</div>
					<!-- widget -->
					<div class="widget">
						<h5 class="widget-title">Latest News</h5>
						<div class="recent-post-widget">
							<?php foreach ($latest as $latest) { 
                                if(!empty($latest->slug_en)){?>
								<!-- recent post -->
								<div class="rp-item">
									<div class="rp-thumb set-bg" data-setbg="<?=upload_url('blogs/thumbs').(!empty($latest->gambar) ? $latest->gambar : 'no_image.jpg')?>"></div>
									<div class="rp-content">
										<h6><a href="<?=site_url('news/'.(($latest->slug_en) ? $latest->slug_en : $latest->slug_id))?>"><?=(($latest->judul_en) ? $latest->judul_en : $latest->judul_id)?></a></h6>
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