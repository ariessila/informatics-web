				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
							<div class="d-flex align-items-center">
								<div class="mr-auto">
									<h3 class="m-subheader__title m-subheader__title--separator">
										Publikasi
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
													Edit Publikasi
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
									<!--begin::Form Edit-->
									<div class="m-portlet">
										<!--begin::Form-->
										<?=form_open_multipart(dosen_url('publikasi/edit/'.$data->id), array('id' => 'form1'))?>
											<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">	
												<div class="m-portlet__body">
													<div class="form-group m-form__group row">
														<div class="col-lg-6">
															<label class="col-form-label">
																Judul Artikel Ilmiah (Bhs. Indonesia):
															</label>
															<input type="text" name="judul_id" class="form-control m-input" placeholder="Masukkan judul artikel dalam bahasa indonesia" value="<?=set_value('judul_id', $data->judul)?>" required>
															<?=form_error('judul_id')?>
														</div>
														<div class="col-lg-6">
															<label class="col-form-label">
																Judul Artikel Ilmiah (Bhs. Inggris):
															</label>
															<input type="text" name="judul_en" class="form-control m-input" placeholder="Masukkan judul artikel dalam bahasa inggris" value="<?=set_value('judul_en', $data->judul_en)?>" required>
															<?=form_error('judul_en')?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<div class="col-lg-6">
															<label class="col-form-label">
																Nama Pertemuan Ilmiah / Seminar / Nama Jurnal dan Volume (Bhs. Indonesia):
															</label>
															<input type="text" name="deskripsi_id" class="form-control m-input" placeholder="Masukkan nama pertemuan dalam bahasa indonesia" value="<?=set_value('deskripsi_id', $data->deskripsi)?>" required>
															<?=form_error('deskripsi_id')?>
															<span class="m-form__help">
																(contoh: Prosiding seminar nasional e-Indonesia Initiatives (eII-Forum) 2013, Institut Teknologi Bandung, Bandung)
															</span>
														</div>
														<div class="col-lg-6">
															<label class="col-form-label">
																Nama Pertemuan Ilmiah / Seminar / Nama Jurnal dan Volume (Bhs.Inggris):
															</label>
															<input type="text" name="deskripsi_en" class="form-control m-input" placeholder="Masukkan nama pertemuan dalam bahasa inggris" value="<?=set_value('deskripsi_en', $data->deskripsi_en)?>" required>
															<?=form_error('deskripsi_en')?>
															<span class="m-form__help">
																(contoh: Prosiding seminar nasional e-Indonesia Initiatives (eII-Forum) 2013, Institut Teknologi Bandung, Bandung)
															</span>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<div class="col-lg-6">
															<label class="col-form-label">
																Nama Penulis Pertama :
															</label>
															<input name="ketua" type="text" class="form-control m-input" value="<?=set_value('ketua', $data->oleh)?>">
															<?=form_error('ketua')?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<div class="col-lg-6">
															<label class="col-form-label">
																Nama Penulis Kedua :
															</label>
															<select name="anggota1" class="form-control m-bootstrap-select m_selectpicker">
															<option value="">
																Pilih dosen
															</option>
	<?php foreach ($dosen as $anggota1) { ?>
															<option value="<?php echo $anggota1->nip ; ?>" <?php echo set_select('anggota1', $anggota1->nama_dosen, False); ?> ><?php echo $anggota1->nama_dosen ; ?> </option> 
	<?php } ?>
														</select>
														<?=form_error('anggota1')?>
															<span class="m-form__help">
																Kosongkan bila tidak ada
															</span>
														</div>
														<div class="col-lg-6">
															<label class="col-form-label">
																Isi disini jika mahasiswa
															</label>
															<input type="text" name="anggota1" class="form-control m-input" placeholder="Isi disini jika mahasiswa" value="<?=set_value('anggota1')?>">
															<?=form_error('anggota1')?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<div class="col-lg-6">
															<label class="col-form-label">
																Nama Penulis Ketiga :
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
																Nama Penulis Keempat :
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
																Nama Penulis Kelima :
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
															<input type="text" name="anggota4" class="form-control m-input" placeholder="Isi disini jika mahasiswa" value="<?=set_value('anggota4')?>">
														<?=form_error('anggota4')?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<div class="col-lg-12">
															<label class="col-form-label">
																Tahun
															</label>
															<input type="text" name="tahun" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=set_value('tahun', $data->tahun)?>" placeholder="Masukkan tahun penelitian">
															<?=form_error('tahun')?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<div class="col-lg-6">
																<label class="col-form-label">
																	Masukkan File (jika ada) :
																</label>
																<input type="file" name="nama_file" class="form-control m-input" accept=".pdf" value="<?=set_value('nama_file', $data->link)?>">
																<?=(isset($error_upload) ? $error_upload : '')?>
																<span class="m-form__help">
																	Format yang didukung adalah *.pdf
																	<br>
																	Keterangan : Tautan judul akan terisi sesuai dengan form Link yang anda isi, jika kosong maka tautan akan mengarah ke file yang anda upload
																</span>
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
										<?=form_close()?>
										<!--end::Form-->
									</div>
									<!--end::Form Edit-->
								</div>
							</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->
