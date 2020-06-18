				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
							<div class="d-flex align-items-center">
								<div class="mr-auto">
									<h3 class="m-subheader__title m-subheader__title--separator">
										Penelitian
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
													Edit Penelitian
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
								<!--begin::Edit Form Penelitian-->
								<div class="m-portlet">
									<!--begin::Form-->
									<?=form_open_multipart(dosen_url('penelitian/edit/'.$data->id_penelitian), array('id' => 'form1'))?>
										<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">	
											<div class="m-portlet__body">
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Judul Penelitian (Bhs.Indonesia):
														</label>
														<input type="text" name="judul_id" class="form-control m-input" placeholder="Masukkan judul penelitian dalam bahasa indonesia" value="<?=set_value('judul_id', $data->judul_penelitian)?>" required>
														<?=form_error('judul_id')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Judul Penelitian (Bhs.Inggris):
														</label>
														<input type="text" name="judul_en" class="form-control m-input" placeholder="Masukkan judul penelitian dalam bahasa inggris" value="<?=set_value('judul_en', $data->judul_en)?>" required>
														<?=form_error('judul_en')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Nama Laboratorium :
														</label>
														<select name="nama_lab" class="form-control m-bootstrap-select m_selectpicker">
															<option value="">
																Pilih laboratorium
															</option>
	<?php foreach ($lab as $daftar) { ?>
															<option value="<?php echo $daftar->lab_id ; ?>" <?php echo set_select('nama_lab', $daftar->lab_id, False); ?> ><?php echo $daftar->lab_id ; ?> </option> 
	<?php } ?>
														</select>
														<?=form_error('nama_lab')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Tahun Penelitian :
														</label>
														<input type="text" name="tahun" class="form-control m-input" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?=set_value('tahun', $data->tahun_penelitian)?>" placeholder="Masukkan tahun penelitian">
														<?=form_error('tahun')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Nama Peneliti Pertama :
														</label>
														<input name="ketua" type="text" class="form-control m-input" value="<?=set_value('ketua', $data->ketua_penelitian)?>">
														<?=form_error('ketua')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Nama Peneliti Kedua :
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
															Nama Peneliti Ketiga :
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
															Nama Peneliti Keempat :
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
															Nama Peneliti Kelima :
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
													<div class="col-lg-6">
														<label class="col-form-label">
															Abstrak (Bhs.Indonesia)
														</label>
														<textarea class="summernote" name="abstrak_id" id=""><?=set_value('abstrak_id', $data->abstrak)?></textarea>
														<?=form_error('abstrak_id')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Abstrak (Bhs. Inggris)
														</label>
														<textarea class="summernote" name="abstrak_en" id=""><?=set_value('abstrak_en', $data->abstrak_en)?></textarea>
														<?=form_error('abstrak_en')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Tujuan Penelitian (Bhs.Indonesia)
														</label>
														<textarea class="summernote" name="tujuan_id" id=""><?=set_value('tujuan_id', $data->tujuan_penilitian)?></textarea>
														<?=form_error('tujuan_id')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Tujuan Penelitian (Bhs. Inggris)
														</label>
														<textarea class="summernote" name="tujuan_en" id=""><?=set_value('tujuan_en', $data->tujuan_penelitian_en)?></textarea>
														<?=form_error('tujuan_en')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Manfaat Penelitian (Bhs.Indonesia)
														</label>
														<textarea class="summernote" name="manfaat_id" id=""><?=set_value('manfaat_id', $data->manfaat_penilitian)?></textarea>
														<?=form_error('manfaat_id')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Manfaat Penelitian (Bhs. Inggris)
														</label>
														<textarea class="summernote" name="manfaat_en" id=""><?=set_value('manfaat_en', $data->manfaat_penelitian_en)?></textarea>
														<?=form_error('manfaat_en')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Hasil Penelitian (Bhs.Indonesia)
														</label>
														<textarea class="summernote" name="hasil_id" id=""><?=set_value('hasil_id', $data->hasil_penilitian)?></textarea>
														<?=form_error('hasil_id')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Hasil Penelitian (Bhs. Inggris)
														</label>
														<textarea class="summernote" name="hasil_en" id=""><?=set_value('hasil_en', $data->hasil_penelitian_en)?></textarea>
														<?=form_error('hasil_en')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Nama Grant :
														</label>
														<input type="text" name="grant" class="form-control m-input" placeholder="Masukkan nama grant" value="<?=set_value('grant', $data->grant_abstrak)?>">
														<?=form_error('grant')?>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Sumber Dana :
														</label>
														<input type="text" name="sumber_dana" class="form-control m-input" placeholder="Masukkan sumber dana" value="<?=set_value('sumber_dana', $data->sumber_dana)?>" required>
														<?=form_error('sumber_dana')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-6">
														<label class="col-form-label">
															Kata Kunci :
														</label>
														<input type="text" name="kata_kunci" class="form-control m-input" placeholder="Masukkan kata kunci" value="<?=set_value('kata_kunci', $data->kata_kunci)?>">
														<?=form_error('kata_kunci')?>
														<span class="m-form__help">
															Contoh penulisan : "internasional, teknik elektro, teknik kendali"<br>
															tiap kata kunci dipisahkan dengan koma( , )
														</span>
													</div>
													<div class="col-lg-6">
														<label class="col-form-label">
															Durasi Penelitian :
														</label>
														<input type="text" name="durasi" class="form-control m-input" placeholder="Masukkan durasi penelitian" value="<?=set_value('durasi', $data->durasi_penelitian)?>">
														<?=form_error('durasi')?>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-4">
															<label class="col-form-label">
																Pilih Gambar Pendukung Abstrak (jika ada) :
															</label>
															<input type="file" name="nama_file" class="form-control m-input" value="<?=set_value('nama_file', $data->abstrak_img)?>">
															<?=(isset($error_upload) ? $error_upload : '')?>
															<span class="m-form__help">
																*format file .jpg, .png
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
								<!--end::Edit Form Penelitian-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->
