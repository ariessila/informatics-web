				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									Dashboard
								</h3>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<!--Begin::Section-->
						<div class="row">
							<div class="col-xl-6">
								<!--begin:: Widgets/Company Summary-->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Biodata
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="m-widget13">
											<div class="m-widget13__item">
												<span class="m-widget13__desc m--align-right">
													Nama Lengkap :
												</span>
												<span class="m-widget13__text m-widget13__text-bolder">
													<?=$data->nama_dosen?>
												</span>
											</div>
											<div class="m-widget13__item">
												<span class="m-widget13__desc m--align-right">
													NIDN :
												</span>
												<span class="m-widget13__text m-widget13__text-bolder">
													<?=$data->nidn?>
												</span>
											</div>
											<div class="m-widget13__item">
												<span class="m-widget13__desc m--align-right">
													NIP :
												</span>
												<span class="m-widget13__text m-widget13__text-bolder">
													<?=$data->nip?>
												</span>
											</div>
											<div class="m-widget13__item">
												<span class="m-widget13__desc m--align-right">
													Jabatan Akademik :
												</span>
												<span class="m-widget13__text m-widget13__text-bolder">
													<?=$data->jabatan_dosen?>
												</span>
											</div>
											<div class="m-widget13__item">
												<span class="m-widget13__desc m--align-right">
													Email:
												</span>
												<span class="m-widget13__text m-widget13__text-bolder">
													<?=$data->email_dosen?>
												</span>
											</div>
											<div class="m-widget13__item">
												<span class="m-widget13__desc m--align-right">
													Bidang Keahlian :
												</span>
												<span class="m-widget13__text m-widget13__text-bolder">
													<?=$data->bidang_penelitian?>
												</span>
											</div>
											<div class="m-widget13__action m--align-right">
												<a href="<?=dosen_url('biodata')?>" class="btn btn-sm btn-primary" style="color:white; width:80px;">Update</a>
											</div>
										</div>
									</div>
								</div>
								<!--end:: Widgets/Company Summary-->
							</div>
								<div class="m-portlet col-md-12 col-lg-6 col-xl-3" style="height: min-content; padding-bottom: 50px;">
									<!--begin::Total Profit-->
									<div class="m-widget24">
										<div class="m-widget24__item">
											<h4 class="m-widget24__title">
												Total Publikasi
											</h4>
											<br>
											<span class="m-widget24__desc">
												Publikasi yang telah dilakukan.
											</span>
											<span class="m-widget24__stats m--font-brand">
												<?=$publikasi?>
											</span>
										</div>
									</div>
									<div class="m-widget24">
										<div class="m-widget24__item">
											<h4 class="m-widget24__title">
												Total Penelitian
											</h4>
											<br>
											<span class="m-widget24__desc">
												Penelitian yang telah dilakukan.
											</span>
											<span class="m-widget24__stats m--font-brand">
												<?=$penelitian?>
											</span>
										</div>
									</div>
									<div class="m-widget24">
										<div class="m-widget24__item">
											<h4 class="m-widget24__title">
												Total Pengabdian
											</h4>
											<br>
											<span class="m-widget24__desc">
												Pengabdian yang telah dilakukan.
											</span>
											<span class="m-widget24__stats m--font-brand">
												<?=$pengabdian?>
											</span>
										</div>
									</div>
									<!--end::Total Profit-->
								</div>
						</div>
						<!--End::Section-->
					</div>
				</div>
			</div>
			<!-- end:: Body -->
			<!-- begin::Footer -->
			
