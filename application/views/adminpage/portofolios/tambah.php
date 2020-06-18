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
                                    <a href="<?=admin_url('portofolios')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a id="submit" class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('portofolios/tambah'), array('id' => 'form1'))?>
                                    <div class="col-md-8">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Judul Portofolio <i class="req">*</i></label>
                                            <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Portofolio" value="<?=set_value('judul')?>"/>
                                            <?=form_error('judul')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Portofolio <i class="req">*</i></label>
                                            <textarea id="ckeditor" name="description" class="form-control ckeditor" placeholder="Tuliskan description blog di sini." rows="7"><?=set_value('description')?></textarea>
                                            <?=form_error('description')?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group">
                                            <label class="control-label">Link Portofolio <i class="req">*</i></label>
                                            <input type="text" name="link" id="link" class="form-control" placeholder="Link Portofolio" value="<?=set_value('link')?>"/>
                                            <?=form_error('judul')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Tag  <i class="req">*</i></label>
                                            <label class="checkbox-inline">
                                               <input type="checkbox" name="tag[]" value="Website"> Website<br>
                                            </label>
                                            <label class="checkbox-inline">
                                               <input type="checkbox" name="tag[]" value="Mobile"> Mobile<br>
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="tag[]" value="Event"> Event<br>
                                            </label>
                                            <label class="checkbox-inline">
                                               <input type="checkbox" name="tag[]" value="System Information"> System Information<br>
                                            </label> 
                                            <?=form_error('tag')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Status Publikasi</label>
                                            <select name="publikasi" class="form-control">
                                                <?php $status = array('Publish', 'Draft'); ?>
                                                <option value="<?=$status[0]?>"<?=set_select('publikasi', $status[0])?>>Publikasikan</option>
                                                <option value="<?=$status[1]?>"<?=set_select('publikasi', $status[1])?>>Simpan Sebagai Draft</option>
                                            </select>
                                            <?=form_error('publikasi')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Upload Gambar</label>
                                            <input type="file" name="gambar" class="form-control" placeholder="Gambar Portofolio" value="<?=set_value('gambar')?>" onchange="readURL(this);" accept="image/*" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Gambar</label>
                                            <img class="img-thumbnail img-responsive" id="uploadgambar" src="<?=upload_url('portofolios/thumbs')?>no_image.png" width="100%" alt="Upload Gambar" />
                                        </div>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
