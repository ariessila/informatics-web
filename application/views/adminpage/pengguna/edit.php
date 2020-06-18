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
                                    <a href="<?=admin_url('pengguna')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Update</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('pengguna/edit/'.$data->id_user), array('id' => 'form1'))?>
                                    <div class="col-md-8">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Nama Lengkap <i class="req">*</i></label>
                                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nama Lengkap" value="<?=set_value('fullname', $data->fullname)?>"/>
                                            <?=form_error('fullname')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Username <i class="req">*</i></label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?=set_value('username', $data->username)?>"/>
                                            <?=form_error('username')?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Roles <i class="req">*</i></label>
                                            <?=form_multiselect('roles[]', $roles, set_value('roles', $data->roles), 'id="roles" class="form-control" multiple required')?>
                                            <?=form_error('roles[]')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Email <i class="req">*</i></label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?=set_value('email', $data->email)?>"/>
                                            <?=form_error('email')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Upload Foto Profil</label>
                                            <input type="file" name="gambar" class="form-control" placeholder="Foto Profil" value="<?=set_value('foto')?>" onchange="readURL(this);" accept="image/*" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Foto Profil</label>
                                            <img class="img-thumbnail img-responsive" id="uploadgambar" src="<?=upload_url('userpics/thumbs').(empty($data->foto) ? 'no_image.jpg' : $data->foto)?>" width="100%" alt="Upload Foto Profil" />
                                        </div>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
