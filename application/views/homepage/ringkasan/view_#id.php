<!-- Breadcrumb section -->
<div class="mahasiswa-site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i> Beranda</a> <i class="fa fa-angle-right"></i>
        <span class="title-page"><?=$title?></span>
    </div>
</div>
<!-- Breadcrumb section end -->
<section class="blog-page-section spad pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 dean-image">
                <img src="<?=upload_url('pengaturan').$pengaturan->dekan_foto?>" alt="" style="border-radius: 10px;">
            </div>
            <div class="col-lg-9 col-offset-1 p-lg-0 p-4">
                <div class="section-title sambutan">
                        <h3 style="color:black">Sambutan Ketua Departemen</h3>
						<p style="color:black"><?=$pengaturan->dekan_sambutan_id?></p>
						<p class="dekan-name"><strong style="color:black"><?=$pengaturan->dekan_nama?></strong></p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="post-item post-details">
                    <div class="post-content">
                        <?=$data->deskripsi_id?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
