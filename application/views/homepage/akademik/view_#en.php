<!-- Breadcrumb section -->
<div class="mahasiswa-site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i>Home</a> <i class="fa fa-angle-right"></i>
        <span class="title-page"><?=$title?></span>
    </div>
</div>
<!-- Breadcrumb section end -->
<!--vertical tab-->
	<div class="container spad">
	<div class="row">
		<div class="col-lg-3"> <!-- required for floating -->
			<!-- Nav tabs -->
			<ul class="nav nav-tabs tabs-left _eneways" aria-orientation="vertical">
<?php if($data->titel1_en != NULL) { ?>
			<li class="active"><a href="#1" data-toggle="tab"><?=$data->titel1_en?></a></li>
<?php } 
	if($data->titel2_en != NULL) { ?>
			<li><a href="#2" data-toggle="tab"><?=$data->titel2_en?></a></li>
<?php }
	if($data->titel3_en != NULL) { ?>
			<li><a href="#3" data-toggle="tab"><?=$data->titel3_en?></a></li>
<?php } 
	if($data->titel4_en != NULL) { ?>
			<li><a href="#4" data-toggle="tab"><?=$data->titel4_en?></a></li>
<?php }
	if($data->titel5_en != NULL) { ?>
			<li><a href="#5" data-toggle="tab"><?=$data->titel5_en?></a></li>
<?php } ?>
			</ul>
		</div>

		<div class="col-lg-9">
			<!-- Tab panes -->
<?php
	if($data->titel1_en == null) { ?>
				<td align="center" colspan="5"><h4>No information on this page</h4></td>
<?php } ?>
            <div class="tab-content">
			<div class="tab-pane active" id="1">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div>
							<?=$data_en->isi1_en ?>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="2">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div>
							<?=$data_en->isi2_en ?>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="3">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div>
							<?=$data_en->isi3_en ?>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="4">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div>
							<?=$data_en->isi4_en ?>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="5">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div>
							<?=$data_en->isi5_en ?>
						</div>
					</div>
				</section>
			</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>