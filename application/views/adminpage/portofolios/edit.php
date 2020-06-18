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
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Update</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('portofolios/edit/'.$data->id_portofolio), array('id' => 'form1'))?>
                                    <div class="col-md-8">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Judul Portofolio <i class="req">*</i></label>
                                            <input type="text" name="judul" class="form-control" placeholder="Judul Portofolio" value="<?=set_value('judul', $data->judul)?>" />
                                            <?=form_error('judul')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Portofolio <i class="req">*</i></label>
                                            <textarea id="ckeditor" name="description" class="form-control ckeditor" placeholder="Tuliskan deskripsi portofolio di sini." rows="7"><?=set_value('description', $data->description)?></textarea>
                                            <?=form_error('description')?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group">
                                            <label class="control-label">Link Portofolio <i class="req">*</i></label>
                                            <input type="text" name="link" class="form-control" placeholder="Link Portofolio" value="<?=set_value('link', $data->link)?>" />
                                            <?=form_error('link')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Tag  <i class="req">*</i></label><br>
                                            <label class="checkbox-inline">
                                               <input type="checkbox" name="tag[]" value="Website"  <?php foreach ($tag as $tag1) {
                                                   if ($tag1 == 'Webiste') {
                                                       echo 'checked';
                                                   }
                                               } ?>> Website<br>
                                            </label>
                                            <label class="checkbox-inline">
                                               <input type="checkbox" name="tag[]" value="Mobile"  <?php foreach ($tag as $tag2) {
                                                   if ($tag2 == 'Mobile') {
                                                       echo 'checked';
                                                    }
                                                   } ?>> Mobile<br>
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="tag[]" value="Event"  <?php foreach ($tag as $tag3) {
                                                   if ($tag3 == 'Event') {
                                                       echo 'checked';
                                                    }
                                                   } ?>> Event<br>
                                            </label>
                                            <label class="checkbox-inline">
                                               <input type="checkbox" name="tag[]" value="System Information"  <?php foreach ($tag as $tag4) {
                                                   if ($tag4 == 'System Information') {
                                                       echo 'checked';
                                                    }
                                                   } ?>> System Information<br>
                                            </label>     

                                        </div>
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
                                            <input type="file" name="gambar" class="form-control" placeholder="Gambar Berita" value="<?=set_value('gambar')?>" onchange="readURL(this);" accept="image/*" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Gambar</label>
                                            <img class="img-thumbnail img-responsive" id="uploadgambar" src="<?=upload_url('portofolios/thumbs').(empty($data->gambar) ? 'no_image.png' : $data->gambar)?>" width="100%" alt="Upload Gambar" />
                                        </div>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
