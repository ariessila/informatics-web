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
                                    <a href="<?=admin_url('logo')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Update</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('logo/edit/'.$data->id_logo), array('id' => 'form1'))?>
                                <div class="col-md-8">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Judul Logo</label>
                                            <input type="text" name="judul" class="form-control" value="<?=set_value('judul', $data->title)?>" />
                                            <?=form_error('judul')?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Alamat Web</label>
                                            <input type="text" name="url" class="form-control" value="<?=set_value('url', $data->url)?>" />
                                            <?=form_error('url')?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Upload Logo</label>
                                            <input type="file" name="gambar" class="form-control" value="<?=set_value('gambar')?>" onchange="readURL(this);" accept="image/*" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Logo</label>
                                            <img class="img-thumbnail img-responsive" id="uploadgambar" src="<?=upload_url('logo').(empty($data->photo) ? 'no_image.png' : $data->photo)?>" width="100%" alt="Upload Gambar" />
                                        </div>
                                    </div>
                                </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
