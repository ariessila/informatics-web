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
                                <?=form_open_multipart(admin_url('pengaturan'), array('id' => 'form1'))?>
                                    <div class="col-md-12">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Deskripsi Situs (Bahasa Indonesia) </label>
                                            <textarea id="ckeditor" name="deskripsi_situs_id" class="form-control ckeditor" placeholder="Deskripsi Situs (Bahasa Indonesia)" rows="7"><?=set_value('deskripsi_situs_id', $pengaturan->deskripsi_situs_id)?> </textarea>
                                            <?=form_error('deskripsi_situs_id')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Deskripsi Situs (English) </label>
                                            <textarea id="ckeditor" name="deskripsi_situs_en" class="form-control ckeditor" placeholder="Deskripsi Situs (English)" rows="7"><?=set_value('deskripsi_situs_en', $pengaturan->deskripsi_situs_en)?> </textarea>
                                            <?=form_error('deskripsi_situs_en')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Alamat (Bahasa Indonesia) </label>
                                            <input type="text" name="alamat_id" class="form-control" placeholder="Tuliskan Alamat di sini (dalam Bahasa Indonesia)." value="<?=set_value('alamat_id', $pengaturan->alamat_id)?>">
                                            <?=form_error('alamat_id')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Alamat (English) </label>
                                            <input type="text" name="alamat_en" class="form-control" placeholder="Tuliskan Alamat di sini (dalam Bahasa Inggris)." value="<?=set_value('alamat_en', $pengaturan->alamat_en)?>">
                                            <?=form_error('alamat_en')?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Sitemap Link </label>
                                            <input type="text" name="sitemap_link" class="form-control" placeholder="Sitemap Link" value="<?=set_value('sitemap_link', $pengaturan->sitemap_link)?>" />
                                            <?=form_error('sitemap_link')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">No Telepon/Fax </label>
                                            <input type="text" name="no_telp" class="form-control" placeholder="No Telp" value="<?=set_value('no_telp', $pengaturan->no_telp)?>" />
                                            <?=form_error('no_telp')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Facebook Page Link </label>
                                            <input type="text" name="fb" class="form-control" placeholder="Facebook Page  Link" value="<?=set_value('fb', $pengaturan->fb)?>" />
                                            <?=form_error('fb')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Twitter Page Link </label>
                                            <input type="text" name="twitter" class="form-control" placeholder="Twitter Page  Link" value="<?=set_value('twitter', $pengaturan->twitter)?>" />
                                            <?=form_error('twitter')?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Upload Logo</label>
                                            <input type="file" class="form-control" id="image-upload" name="foto" accept="image/*" />
                                            <input type="hidden" id="image-cropped" name="cfoto" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Logo</label>
                                            <img class="img-thumbnail img-responsive" id="image-preview" src="<?=upload_url('pengaturan/thumbs').(empty($pengaturan->logo) ? 'no_image.png' : $pengaturan->logo)?>" width="100%" alt="Upload Logo" />
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
