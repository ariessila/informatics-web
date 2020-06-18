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
                                <?=form_open_multipart(admin_url('pengaturan/dekan'), array('id' => 'form1'))?>
                                    <div class="col-md-12">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Sambutan Dekan (Bahasa Indonesia)  <i class="req">*</i></label>
                                            <textarea id="ckeditor" name="dekan_sambutan_id" class="form-control ckeditor" placeholder="Sambutan Dekan (Bahasa Indonesia)" rows="7"><?=set_value('dekan_sambutan_id', $pengaturan->dekan_sambutan_id)?> </textarea>
                                            <?=form_error('dekan_sambutan_id')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Sambutan Dekan (English) </label>
                                            <textarea id="ckeditor" name="dekan_sambutan_en" class="form-control ckeditor" placeholder="Sambutan Dekan (English)" rows="7"><?=set_value('dekan_sambutan_en', $pengaturan->dekan_sambutan_en)?> </textarea>
                                            <?=form_error('dekan_sambutan_en')?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Nama Dekan  <i class="req">*</i></label>
                                            <input type="text" name="dekan_nama" class="form-control" placeholder="Twitter Page  Link" value="<?=set_value('dekan_nama', $pengaturan->dekan_nama)?>" />
                                            <?=form_error('dekan_nama')?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label class="control-label">Upload Foto Dekan</label>
                                            <input type="file" class="form-control" id="image-upload" name="foto" accept="image/*" />
                                            <input type="hidden" id="image-cropped" name="cfoto" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Foto Dekan</label>
                                            <img class="img-thumbnail img-responsive" id="image-preview" src="<?=upload_url('pengaturan/thumbs').(empty($pengaturan->dekan_foto) ? 'no_image.png' : $pengaturan->dekan_foto)?>" width="100%" alt="Upload Dekan Foto" />
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
