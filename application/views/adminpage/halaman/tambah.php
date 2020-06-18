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
                                    <a href="<?=admin_url('halaman')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('halaman/tambah'), array('id' => 'form1'))?>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Judul Halaman (Indonesia) <i class="req">*</i></label>
                                        <input type="text" name="nama_id" class="form-control" placeholder="Judul halaman (Indonesia)" value="<?=set_value('nama_id')?>" required />
                                        <?=form_error('nama_id')?>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label">Judul Halaman (English) <i class="req">*</i></label>
                                        <input type="text" name="nama_en" class="form-control" placeholder="Judul halaman (English)" value="<?=set_value('nama_en')?>" required />
                                        <?=form_error('nama_en')?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Isi Halaman (Indonesia)</label>
                                        <textarea name="deskripsi_id" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Indonesia)." rows="7"><?=set_value('deskripsi_id')?></textarea>
                                        <?=form_error('deskripsi_id')?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Isi Halaman (English)</label>
                                        <textarea name="deskripsi_en" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Inggris)." rows="7"><?=set_value('deskripsi_en')?></textarea>
                                        <?=form_error('deskripsi_en')?>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?=$load_manager?>
        <!-- <script>CKEDITOR.replace("textarea");</script> -->
