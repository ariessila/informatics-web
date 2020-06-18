				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
							<div class="d-flex align-items-center">
								<div class="mr-auto">
									<h3 class="m-subheader__title m-subheader__title--separator">
										Mata Kuliah
									</h3>
									<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
										<li class="m-nav__item m-nav__item--home">
											<a href="#" class="m-nav__link m-nav__link--icon">
												<i class="m-nav__link-icon la la-home"></i>
											</a>
										</li>
										<li class="m-nav__separator">
											-
										</li>
										<li class="m-nav__item">
											<a href="" class="m-nav__link">
												<span class="m-nav__link-text">
													Tambah Mata Kuliah
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">
							<div class="col-lg-12">
								<!--begin::Form Tambah Penelitian-->
								<div class="m-portlet">
									<!--begin::Form-->
									<?=form_open_multipart(dosen_url('kuliah/tambah'), array('id' => 'form1'))?>
										<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">	
											<div class="m-portlet__body">
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Mata Kuliah (Bhs.Indonesia):
														</label>
														<input type="text" name="judul_id" class="form-control m-input" placeholder="Masukkan mata kuliah dalam bahasa indonesia" value="<?=set_value('judul_id')?>" required>
														<?=form_error('judul_id')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Mata Kuliah (Bhs.Inggris):
														</label>
														<input type="text" name="judul_en" class="form-control m-input" placeholder="Masukkan mata kuliah dalam bahasa inggris" value="<?=set_value('judul_en')?>" required>
														<?=form_error('judul_en')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Kode :
														</label>
														<input type="text" name="kode" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Masukkan kode mata kuliah" value="<?=set_value('kode')?>">
														<?=form_error('kode')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Program :
														</label>
														<input type="text" name="program" class="form-control m-input" placeholder="Sarjana/Magister/Doktor" value="<?=set_value('program')?>">
														<?=form_error('program')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Semester :
														</label>
														<input type="text" name="semester" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Masukkan semester" value="<?=set_value('semester')?>">
														<?=form_error('semester')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															SKS :
														</label>
														<input type="text" name="sks" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Masukkan jumlah sks" value="<?=set_value('sks')?>">
														<?=form_error('sks')?>
													</div>
												</div>
											</div>
											<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
												<div class="m-form__actions m-form__actions--solid">
													<div class="row">
														<div class="col-lg-6">
															<button type="submit" class="btn btn-primary">
																Simpan
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?=form_error()?>
									<!--end::Form-->
								</div>
								<!--end::Form Tambah Penelitian-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->
