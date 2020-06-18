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
                                <?=form_open_multipart(admin_url('pengaturan/color'), array('id' => 'form1'))?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Pilih Warna <i class="req">*</i></label>
                                            <input type="text" name="warna" id="demo-colorpicker1" class="form-control" value="<?=set_value('warna', $pengaturan->warna)?>">
                                            <?=form_error('warna')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Nama Departemen</label>
                                            <input type="text" name="nama_departemen" class="form-control" placeholder="Tuliskan Nama Departemen." value="<?=set_value('nama_departemen', $pengaturan->nama)?>">
                                            <?=form_error('nama_departemen')?>
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
