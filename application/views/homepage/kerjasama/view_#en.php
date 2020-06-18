<!-- Breadcrumb section -->
<div class="mahasiswa-site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
        <span class="title-page"><?=$title?></span>
    </div>
</div>
<!-- Breadcrumb section end -->
<section class="blog-page-section spad pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="post-item post-details">
                    <div class="post-content">
                        <?=$data->deskripsi_id?>
					</div>
					<div class="row">
						<div class="col-lg-9">
							<div class="section-title">
								<h3>Cooperation</h3>
							</div>
						</div>
						<div class="col-lg-3 widget" style="margin-left: 0px;">
							<form id="search-additional-form" method="GET" class="search-widget">
								<input type="text" name="q" value="<?=($this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : '')?>" placeholder="Search..." class="form-control"/>
								<button class="aside-submit"><i class="icon fa fa-search"></i></button>
							</form>
						</div>
					</div>
					<table style="width:100%" id="lecturer" class="table">
						<thead>
							<tr>
								<tr>
                                    <th>No</th>
									<th>Name of Cooperation</th>
									<th>Year</th>
									<th>Institute</th>
								</tr>
								<!-- <th>#</th> -->
							</tr>
						</thead>
						<tbody>
							<?php
								if($halaman == null) { ?>
									<td align="center" colspan="5"><p>Tidak Ada Data</p></td>
								<?php }else{
									
								$i = $offset + 1;
								foreach ($halaman as $data) { ?>
								<tr>
									<td ><?=$i?></td>
									<!-- <td><img src='img/pendidik/1.JPG'></td> -->
									<td ><?=$data->jenis_kerjasama?></td>
									<td ><?=$data->tahun?></td>
									<td ><?=$data->institusi?></td>
									<!-- <td ><a href="<?=base_url('dosen/').$data->nip?>" class="btn btn-default">Profil</a></td> -->
								</tr>
								<?php $i++; } }?>
						</tbody>
					</table>
					<ul class="site-pageination">
						<?=(isset($pagination) ? $pagination : '')?>
					</ul>
                </div>
            </div>
        </div>
    </div>
</section>
