<!-- Breadcrumb section -->
<div class="mahasiswa-site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
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
			<li class="active"><a href="#mahasiswa" data-toggle="tab">Students</a></li>
			<li><a href="#tujuan" data-toggle="tab">Educational Objective Program</a></li>
			<li><a href="#hasilpelajar" data-toggle="tab">Student Results</a></li>
			<li><a href="#kurikulum" data-toggle="tab">Curriculum</a></li>
			<li><a href="#fakultas" data-toggle="tab">Personnel</a></li>
			<li><a href="#pilihan" data-toggle="tab">Selection</a></li>
			<li><a href="#lokasi" data-toggle="tab">Program Location</a></li>
			</ul>
		</div>

		<div class="col-lg-8">
			<!-- Tab panes -->
                <?=$data->deskripsi_en?>
        

		<div class="clearfix"></div>
		</div>
	</div>
</div>