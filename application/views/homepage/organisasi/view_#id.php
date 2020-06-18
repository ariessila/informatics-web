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
            <div class="col-xl-12 text-center">
                <?=$data->deskripsi_id?>
            </div>  
            <div class="col-xl-12">
                <div class="section-title text-center">
                    <h3>Struktur</h3>
                    <center><img style="width: 100%;height: 100%;object-fit: contain"src="<?=upload_url('pengaturan').(empty($pengaturan->organisasi) ? 'no_image.png' : $pengaturan->organisasi)?>"/></center>
                </div>
            </div>
        </div>
    </div>
</section>
