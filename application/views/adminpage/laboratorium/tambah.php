        <h1 class="page-header"><?=$title?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse" data-sortable-id="index-1">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title"><?=$title?></h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="row-fluid">
                                <div class="col-sm-12 text-right">
                                    <a href="<?=admin_url('laboratorium')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('laboratorium/tambah'), array('id' => 'form1'))?>
                                    <div class="form-group form-group-lg">
                                        <input type="hidden" name="tipe" class="form-control" value="lab" required />
                                        <?=form_error('nama_id')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Nama Laboratorium (Indonesia) <i class="req">*</i></label>
                                        <input type="text" name="nama_id" class="form-control" placeholder="Laboratorium (Indonesia)" value="<?=set_value('nama_id')?>" required />
                                        <?=form_error('nama_id')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Nama Laboratorium (English) <i class="req">*</i></label>
                                        <input type="text" name="nama_en" class="form-control" placeholder="Laboratorium (English)" value="<?=set_value('nama_en')?>" required />
                                        <?=form_error('nama_en')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Ketua Laboratorium <i class="req">*</i></label>
                                        <select name="ketua" class="form-control">
														<option value="">
															Pilih Ketua
														</option>
<?php foreach ($kategori as $ketua) { ?>
														<option value="<?php echo $ketua->nip ; ?>" <?php echo set_select('ketua', $ketua->nama_dosen, False); ?> ><?php echo $ketua->nama_dosen ; ?> </option> 
<?php } ?>
                                        </select>
                                        <?=form_error('ketua')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                            <label class="control-label">Staf Pengajar <i class="req">*</i></label>
                                            <div class="col-sm-12">
                                                <select id="nama_dosen" class="form-control" name="dosen[]" multiple="multiple">
<?php foreach ($kategori as $a) { ?>
													<option value="<?=$a->nip?>" <?php echo set_select('dosen', ($a->gelar_depan != '' ? $a->gelar_depan.'. ' : '').$a->nama_dosen.($a->gelar_belakang != '' ? ', '.$a->gelar_belakang : ''), FALSE); ?> ><?php echo ($a->gelar_depan != '' ? $a->gelar_depan.'. ' : '').$a->nama_dosen.($a->gelar_belakang != '' ? ', '.$a->gelar_belakang : '') ; ?> </option>
<?php }; ?>	
                                                </select>
                                            </div>
                                            <?=form_error('dosen[]')?>
                                        </div>
                                    <div class="form-group">
                                        <label class="control-label">Deskripsi (Indonesia)</label>
                                        <textarea name="deskripsi_id" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Indonesia)." rows="7"><?=set_value('deskripsi_id')?></textarea>
                                        <?=form_error('deskripsi_id')?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Deskripsi (English)</label>
                                        <textarea name="deskripsi_en" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Inggris)." rows="7"><?=set_value('deskripsi_en')?></textarea>
                                        <?=form_error('deskripsi_en')?>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Upload Gambar Laboratorium</label>
                                            <input type="file" class="form-control" id="image-upload" name="foto" accept="image/*" />
                                            <input type="hidden" id="image-cropped" name="cfoto" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Tampilan Gambar</label>
                                            <img class="img-thumbnail img-responsive" id="image-preview" src="<?=upload_url('blogs/thumbs')?>no_image.png" width="100%" alt="Upload Gambar" />
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('adminpage/_layout/image_cropper'); ?>
        <?=$load_manager?>
        <!-- <script>CKEDITOR.replace("textarea");</script> -->
