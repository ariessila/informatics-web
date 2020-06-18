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
                                    <a href="<?=admin_url('staff')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('staff/edit/'.$data->nip), array('id' => 'form1'))?>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">NIP <i class="req">*</i></label>
                                        <input type="text" name="nip" class="form-control" placeholder="NIP" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="18" value="<?=set_value('nip', $data->nip)?>" required />
                                        <?=form_error('nip')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Nama Staff<i class="req">*</i></label>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Staff" value="<?=set_value('nama', $data->nama_pengelola)?>" required />
                                        <?=form_error('nama')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Jabatan Staff<i class="req">*</i></label>
                                        <input type="text" name="jabatan" class="form-control" placeholder="Jabatan Staff" value="<?=set_value('jabatan', $data->jabatan_pengelola)?>" required />
                                        <?=form_error('jabatan')?>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Upload Gambar Staff</label>
                                            <input type="file" class="form-control" name="nama_file" onchange="readURL(this);" value="<?=set_value('nama_file', $data->foto_pengelola)?>" accept="image/*" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Tampilan Gambar</label>
                                            <img class="img-thumbnail img-responsive" id="uploadgambar" src="<?=upload_url('staff').(empty($data->foto_pengelola) ? 'no_image.png' : $data->foto_pengelola)?>" width="100%" alt="Upload Gambar" />
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script>CKEDITOR.replace("textarea");</script> -->
