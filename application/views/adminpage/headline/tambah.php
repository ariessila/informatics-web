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
                                    <a href="<?=admin_url('headline')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('headline/tambah'), array('id' => 'form1'))?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Judul Gambar <i class="req">*</i></label>
                                            <input type="text" name="judul" class="form-control" placeholder="Judul Headline" value="<?=set_value('judul')?>" required />
                                            <?=form_error('judul')?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Judul Gambar (Inggris) <i class="req">*</i></label>
                                            <input type="text" name="judul_en" class="form-control" placeholder="Judul Headline" value="<?=set_value('judul_en')?>" required />
                                            <?=form_error('judul_en')?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Gambar</label>
                                            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Headline" value="<?=set_value('deskripsi')?>" />
                                            <?=form_error('deskripsi')?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Gambar (Inggris)</label>
                                            <input type="text" name="deskripsi_en" class="form-control" placeholder="Deskripsi Headline" value="<?=set_value('deskripsi_en')?>" />
                                            <?=form_error('deskripsi_en')?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Pilih Berita</label>
                                            <?=form_dropdown('id_blog', $blogs, set_value('id_blog'), 'class="form-control"')?>
                                            <?=form_error('id_blog')?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">External Link</label>
                                            <input type="text" name="external" class="form-control" placeholder="External Link" value="<?=set_value('external')?>" />
                                            <?=form_error('external')?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Gambar</label>
                                            <img class="img-thumbnail img-responsive" id="uploadgambar" src="<?=upload_url('headline/thumbs').'no_image.png'?>" width="100%" alt="Upload Gambar" />
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label">Upload Gambar (<i class="req">Rasio file harus 16:9</i>)</label>
                                            <input type="file" name="gambar" class="form-control" placeholder="Gambar headline" value="<?=set_value('gambar')?>" onchange="readURL(this);" accept="image/*" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Status Publikasi</label>
                                            <select name="status" class="form-control">
                                                <?php $status = array('Publish', 'Draft'); ?>
                                                <option value="<?=$status[0]?>"<?=set_select('status', $status[0])?>>Publikasikan</option>
                                                <option value="<?=$status[1]?>"<?=set_select('status', $status[1])?>>Simpan Sebagai Draft</option>
                                            </select>
                                        </div>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
