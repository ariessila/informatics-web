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
                                    <a href="<?=admin_url('informasi')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Update</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('informasi/edit/'.$data->id_informasi), array('id' => 'form1'))?>
                                    <div class="col-md-8">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Judul Informasi <i class="req">*</i></label>
                                            <input type="text" name="judul" class="form-control" placeholder="Judul Informasi" value="<?=set_value('judul', $data->judul)?>" />
                                            <?=form_error('judul')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Judul Informasi (Inggris) <i class="req">*</i></label>
                                            <input type="text" name="judul_en" class="form-control" placeholder="Judul Informasi" value="<?=set_value('judul_en', $data->judul_en)?>" />
                                            <?=form_error('judul_en')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Isi Informasi <i class="req">*</i></label>
                                            <textarea id="editor1" name="isi" class="form-control ckeditor" placeholder="Tuliskan isi informasi di sini." rows="7"><?=set_value('isi', $data->isi)?></textarea>
                                            <?=form_error('isi')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Isi Informasi (Inggris) <i class="req">*</i></label>
                                            <textarea id="editor2" name="isi_en" class="form-control ckeditor" placeholder="Tuliskan isi informasi di sini." rows="7"><?=set_value('isi_en', $data->isi_en)?></textarea>
                                            <?=form_error('isi_en')?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Status Publikasi</label>
                                            <select name="publikasi" class="form-control">
                                                <?php $status = array('Publish', 'Draft'); ?>
                                                <option value="<?=$status[0]?>"<?=set_select('publikasi', $status[0], $status[0] === $data->publikasi)?>>Publikasikan</option>
                                                <option value="<?=$status[1]?>"<?=set_select('publikasi', $status[1], $status[1] === $data->publikasi)?>>Simpan Sebagai Draft</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Upload Gambar</label>
                                            <input type="file" class="form-control" id="image-upload" name="foto" accept="image/*" />
                                            <input type="hidden" id="image-cropped" name="cfoto" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Gambar</label>
                                            <img class="img-thumbnail img-responsive" id="image-preview" src="<?=upload_url('informasi/thumbs').(empty($data->gambar) ? 'no_image.png' : $data->gambar)?>" width="100%" alt="Upload Gambar" />
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
