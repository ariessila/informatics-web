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
                                    <a href="<?=admin_url('kerjasama')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('kerjasama/tambah'), array('id' => 'form1'))?>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Nama Institusi <i class="req">*</i></label>
                                        <input type="text" name="institusi" class="form-control" placeholder="Institusi"  value="<?=set_value('institusi')?>" required />
                                        <?=form_error('institusi')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Jenis Kerjasama</label>
                                        <textarea name="jenis" class="form-control ckeditor" placeholder="Tuliskan Jenis Kerjasama" rows="7"><?=set_value('jenis')?></textarea>
                                        <?=form_error('jenis')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-md-6">
                                            <label class="control-label">Tahun Mulai</label>
                                            <input type="text" name="tahun" class="form-control" placeholder="Tahun Mulai" value="<?=set_value('tahun')?>">
                                            <?=form_error('tahun')?>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Masa Berlaku</label>
                                            <input type="text" name="masa_berlaku" class="form-control" placeholder="Masa Berlaku" value="<?=set_value('masa_berlaku')?>">
                                            <?=form_error('masa_berlaku')?>
                                        </div>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script>CKEDITOR.replace("textarea");</script> -->
