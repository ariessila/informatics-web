				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
							<div class="d-flex align-items-center">
								<div class="mr-auto">
									<h3 class="m-subheader__title m-subheader__title--separator">
										Pengabdian
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
													Edit Pengabdian
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
								<!--begin::Form Tambah Pengabdian-->
								<div class="m-portlet">
									<!--begin::Form-->
									<?=form_open_multipart(dosen_url('pengabdian/edit/'.$data->id), array('id' => 'form1'))?>
										<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
											<div class="m-portlet__body">
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Judul Pengabdian (Bhs. Indonesia):
														</label>
														<input type="text" name="judul_id" class="form-control m-input" placeholder="Masukkan judul pengabdian dalam bahasa indoneisa" value="<?=set_value('judul_id', $data->judul_pengabdian)?>" required>
														<?=form_error('judul_id')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Judul Pengabdian (Bhs. Inggris):
														</label>
														<input type="text" name="judul_en" class="form-control m-input" placeholder="Masukkan judul pengabdian bahasa inggris" value="<?=set_value('judul_en', $data->judul_en)?>" required>
														<?=form_error('judul_en')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Sumber Dana :
														</label>
														<input type="text" name="sumber_dana" class="form-control m-input" placeholder="Masukkan sumber dana" value="<?=set_value('sumber_dana', $data->sumber_dana)?>" required>
														<?=form_error('sumber_dana')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Tahun Pengabdian :
														</label>
														<input type="text" name="tahun" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Masukkan tahun pengabdian" value="<?=set_value('tahun', $data->tahun)?>">
														<?=form_error('tahun')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Nama Ketua :
														</label>
														<input type="text" name="ketua" class="form-control m-input" placeholder="Ketua" value="<?=set_value('ketua', $data->ketua)?>" required>
														<?=form_error('ketua')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Nama Anggota Pengabdian Pertama:
														</label>
														<select name="anggota1" class="form-control m-bootstrap-select m_selectpicker">
															<option value="">
																Pilih dosen
															</option>
	<?php foreach ($dosen as $anggota1) { ?>
															<option value="<?php echo $anggota1->nama_dosen ; ?>" <?php echo set_select('anggota1', $anggota1->nama_dosen, False); ?> ><?php echo $anggota1->nama_dosen ; ?> </option> 
	<?php } ?>
														</select>
														<?=form_error('anggota1')?>
														<span class="m-form__help">
															Kosongkan bila tidak ada
														</span>
													</div>
													<div class="col-lg-6">
														<label name="anggota1" class="col-form-label">
															Isi disini jika mahasiswa
														</label>
														<input type="text" class="form-control m-input" placeholder="Isi disini jika mahasiswa" value="<?=set_value('anggota1')?>">
														<?=form_error('anggota1')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Nama Anggota Pengabdian Kedua :
														</label>
														<select name="anggota2" class="form-control m-bootstrap-select m_selectpicker">
															<option value="">
																Pilih dosen
															</option>
	<?php foreach ($dosen as $anggota2) { ?>
															<option value="<?php echo $anggota2->nip ; ?>" <?php echo set_select('anggota2', $anggota2->nama_dosen, False); ?> ><?php echo $anggota2->nama_dosen ; ?> </option> 
	<?php } ?>
														</select>
														<?=form_error('anggota2')?>
														<span class="m-form__help">
															Kosongkan bila tidak ada
														</span>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Isi disini jika mahasiswa
														</label>
														<input type="text" name="anggota2" class="form-control m-input" placeholder="Isi disini jika mahasiswa" value="<?=set_value('anggota2')?>">
														<?=form_error('anggota2')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Nama Anggota Pengabdian Ketiga :
														</label>
														<select name="anggota3" class="form-control m-bootstrap-select m_selectpicker">
															<option value="">
																Pilih dosen
															</option>
	<?php foreach ($dosen as $anggota3) { ?>
															<option value="<?php echo $anggota3->nip ; ?>" <?php echo set_select('anggota3', $anggota3->nama_dosen, False); ?> ><?php echo $anggota3->nama_dosen ; ?> </option> 
	<?php } ?>
														</select>
														<?=form_error('anggota3')?>
														<span class="m-form__help">
															Kosongkan bila tidak ada
														</span>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Isi disini jika mahasiswa
														</label>
														<input type="text" name="anggota3" class="form-control m-input" placeholder="Isi disini jika mahasiswa" value="<?=set_value('anggota3')?>">
														<?=form_error('anggota3')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Nama Anggota Pengabdian Keempat :
														</label>
														<select name="anggota4" class="form-control m-bootstrap-select m_selectpicker">
															<option value="">
																Pilih dosen
															</option>
	<?php foreach ($dosen as $anggota4) { ?>
															<option value="<?php echo $anggota4->nip ; ?>" <?php echo set_select('anggota4', $anggota4->nama_dosen, False); ?> ><?php echo $anggota4->nama_dosen ; ?> </option> 
	<?php } ?>
														</select>
														<?=form_error('anggota4')?>
														<span class="m-form__help">
															Kosongkan bila tidak ada
														</span>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Isi disini jika mahasiswa
														</label>
														<input type="text" name="anggota4" class="form-control m-input" placeholder="Isi disini jika mahasiswa" value="<?=set_value('anggota3')?>">
														<?=form_error('anggota4')?>
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
															<button type="button" class="btn btn-secondary">
																Batal
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?=form_close()?>
									<!--end::Form-->
								</div>
								<!--end::Form Tambah Pengabdian-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->

