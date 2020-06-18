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
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Update</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('pengaturan/kemahasiswaan'), array('id' => 'form1'))?>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Judul Gambar  <i class="req">*</i></label>
                                            <input type="text" name="judul_mahasiswaan" class="form-control" placeholder="Nama Program" value="<?=set_value('judul_mahasiswa', $pengaturan->judul_mahasiswa)?>" />
                                            <?=form_error('judul_mahasiswa')?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Upload Gambar</label>
                                            <input type="file" class="form-control" id="image-upload" name="gambar_mahasiswa" accept="image/*" />
                                            <input type="hidden" id="image-cropped" name="cfoto" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Gambar</label>
                                            <img class="img-thumbnail img-responsive" id="image-preview" src="<?=upload_url('pengaturan').(empty($pengaturan->gambar_mahasiswa) ? 'no_image.png' : $pengaturan->gambar_mahasiswa)?>" width="100%" alt="Upload Gambar" />
                                        </div>
                                    </div>
                                <?=form_close()?>

                                <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('pengaturan/kemahasiswaan'), array('id' => 'form1'))?>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Judul Gambar  <i class="req">*</i></label>
                                            <input type="text" name="judul_alumni" class="form-control" placeholder="Nama Program" value="<?=set_value('judul_alumni', $pengaturan->judul_alumni)?>" />
                                            <?=form_error('judul_alumni')?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Upload Gambar</label>
                                            <input type="file" class="form-control" id="image-upload" name="gambar_alumni" accept="image/*" />
                                            <input type="hidden" id="image-cropped" name="cfoto" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Gambar</label>
                                            <img class="img-thumbnail img-responsive" id="image-preview" src="<?=upload_url('pengaturan').(empty($pengaturan->gambar_alumni) ? 'no_image.png' : $pengaturan->gambar_alumni)?>" width="100%" alt="Upload Gambar" />
                                        </div>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('adminpage/_layout/image_cropper'); ?>
