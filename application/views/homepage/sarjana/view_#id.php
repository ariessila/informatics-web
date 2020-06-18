<!-- Breadcrumb section -->
<div class="mahasiswa-site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i> Beranda</a> <i class="fa fa-angle-right"></i>
        <span class="title-page"><?=$title?></span>
    </div>
</div>
<!-- Breadcrumb section end -->
<!--vertical tab-->
	<div class="container spad">
	<div class="row">
		<div class="col-lg-2"> <!-- required for floating -->
			<!-- Nav tabs -->
			<ul class="nav nav-tabs tabs-left sideways" aria-orientation="vertical">
			<li class="active"><a href="#mahasiswa" data-toggle="tab">Mahasiswa</a></li>
			<li><a href="#tujuan" data-toggle="tab">Tujuan Program Pendidikan</a></li>
			<li><a href="#hasilpelajar" data-toggle="tab">Luaran Hasil Studi</a></li>
			<li><a href="#kurikulum" data-toggle="tab">Kurikulum</a></li>
			<li><a href="#fakultas" data-toggle="tab">Staf Pengajar</a></li>
			<li><a href="#pilihan" data-toggle="tab">Pilihan</a></li>
			<li><a href="#lokasi" data-toggle="tab">Lokasi Program</a></li>
			</ul>
		</div>

		<div class="col-lg-8">
			<!-- Tab panes -->
                <?=$data->deskripsi_id?>
        

			<div class="clearfix"></div>
		</div>
	</div>
</div>