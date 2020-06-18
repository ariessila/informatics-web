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
                                    <a href="<?=admin_url('testimoni')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Update</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('testimoni/edit/'.$data->id_testimoni), array('id' => 'form1'))?>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label">Nama Klien</label>
                                            <input type="text" name="nama_klien" class="form-control" placeholder="Nama Klien" value="<?=set_value('nama_klien', $data->nama_klien)?>" />
                                            <?=form_error('nama_klien')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Judul Testimoni</label>
                                            <input type="text" name="judul" class="form-control" placeholder="Judul Testimoni" value="<?=set_value('judul', $data->judul)?>" />
                                            <?=form_error('judul')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Testimoni</label>
                                            <textarea id="ckeditor" name="deskripsi" class="form-control ckeditor" placeholder="Tuliskan deskripsi portofolio di sini." rows="7"><?=set_value('deskripsi', $data->deskripsi)?></textarea>
                                            <?=form_error('deskripsi')?>
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
                                            <label class="control-label">Upload Foto</label>
                                            <input type="file" name="foto" class="form-control" placeholder="Foto User" value="<?=set_value('foto', $data->photo)?>" onchange="readURL(this);" accept="image/*" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Foto</label>
                                            <img class="img-thumbnail img-responsive" style="width: 100%;" id="uploadgambar" src="<?=(empty($data->photo) ? upload_url('client_pict').'no_image.jpg' : upload_url('client_pict').$data->photo)?>" alt="Upload Foto" />
                                        </div>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
