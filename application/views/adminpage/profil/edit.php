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
                                    <a class="btn btn-primary btn-lg update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Update</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('profil'), array('id' => 'form1'))?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nama Lengkap <i class="req">*</i></label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?=set_value('nama', $data->nama)?>" />
                                            <?=form_error('nama')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">E-mail <i class="req">*</i></label>
                                            <input type="text" name="email" class="form-control" placeholder="Alamat E-mail" value="<?=set_value('email', $data->email)?>" />
                                            <?=form_error('email')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Username <i class="req">*</i></label>
                                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?=set_value('username', $data->username)?>" readonly />
                                            <?=form_error('username')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password (kosongkan jika tidak ingin mengubah password)" value="<?=set_value('password')?>" />
                                            <?=form_error('password')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Konfirmasi Password</label>
                                            <input type="password" name="passconf" class="form-control" placeholder="Konfirmasi Password" value="<?=set_value('passconf')?>" />
                                            <?=form_error('passconf')?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Upload Foto</label>
                                            <input type="file" name="foto" class="form-control" placeholder="Foto User" value="<?=set_value('foto', $data->foto)?>" onchange="readURL(this);" accept="image/*" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Foto</label>
                                            <img class="img-thumbnail img-responsive" style="width: 100%;" id="uploadgambar" src="<?=(empty($data->foto) ? upload_url('images').'no_image.jpg' : upload_url('userpics').$data->foto)?>" alt="Upload Foto" />
                                        </div>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
