	<!-- Breadcrumb section -->
	<div class="mahasiswa-site-breadcrumb" >
		<div class="container">
			<a href=""><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
			<span class="title-page"><?=$title?></span>
		</div>
	</div>
	<!-- Breadcrumb section end -->

	<!--download detail-->
	<section class="full-courses-section spad pt-0">
			<div class="container">
				<?php
					if($halaman == null) { ?>
				<td align="center" colspan="5"><p>Data is Empty !</p></td>
				<div class="row">
				<?php } 
					foreach ($halaman as $data) {		
				?>
					<!-- course item -->
					<div class="col-lg-4 col-md-6 course-item">
						<div class="course-thumb">
							<img src="<?=home_assets()?>img/e-book.jpg" alt="">
						</div>
						<div class="course-info">
							<div class="date"><i class="fa fa-clock-o"></i><?=tgl_indo($data->uat)?></div>
							<h4><?=$data->nama_file_en?></h4>
							<a href="<?=base_url('Download/unduh/').$data->id_download?>"><div class="site-btn" >Download</div></a>
						</div>
					</div>
				<div class="text-center">
				<?php } ?>
					<ul class="site-pageination">
						<?=(isset($pagination) ? $pagination : '')?>
					</ul>
				</div>
			</div>
		</section>
	<!--download end-->