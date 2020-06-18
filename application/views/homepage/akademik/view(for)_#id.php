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
<?php 
$titel = explode("#",$akademik->titel_id);
for ($i = 0; $i < sizeof($titel); $i++) {
	if ($titel[$i]) { ?>
				<li <?=(!$i ? 'class="active"' : '')?>><a href="#<?=$titel[$i]?>" data-toggle="tab"><?=$titel[$i]?></a></li>
<?php }} ?>
			</ul>
		</div>

		<div class="col-lg-8">
			<!-- Tab panes -->
			<div class="tab-content">
			
<?php $isi = explode("#-+-#",$akademik->isi_id);
	for ($i = 0; $i < sizeof($isi); $i++) {
		if ($titel[$i]) { ?>
				<div class="tab-pane <?=(!$i ? 'active' : '')?>" id=<?=$titel[$i]?>>			
					<p><?=$isi[$i]?></p>
				</div>
<?php }} ?>
			
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>