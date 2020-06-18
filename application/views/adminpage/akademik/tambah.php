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
                                    <a href="<?=admin_url('akademik')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('akademik/tambah'), array('id' => 'form1'))?>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Nama Program (Indonesia) <i class="req">*</i></label>
                                            <input type="text" name="nama_id" class="form-control" placeholder="Nama Program (Indonesia)" value="<?=set_value('nama_id')?>" required />
                                            <?=form_error('nama_id')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Menu 1 <i class="req">*</i></label>
                                            <input type="text" name="menu1" class="form-control" placeholder="Menu 1 (Indonesia)" required />
                                            <?=form_error('menu1')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Menu 1</label>
                                            <textarea name="deskripsi_id1" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Indonesia)." rows="7"><?=set_value('deskripsi_id')?></textarea>
                                            <?=form_error('deskripsi_id1')?>
                                        </div>
                                        
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Menu 2 <i class="req">*</i></label>
                                            <input type="text" name="menu2" class="form-control" placeholder="Menu 2 (Indonesia)">
                                            <?=form_error('Menu2')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Menu 2</label>
                                            <textarea name="deskripsi_id2" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Inggris)." rows="7"><?=set_value('deskripsi_en')?></textarea>
                                            <?=form_error('deskripsi_id2')?>
                                        </div>
                                        
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Menu 3 <i class="req">*</i></label>
                                            <input type="text" name="menu3" class="form-control" placeholder="Menu 3 (Indonesia)">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Menu 3</label>
                                            <textarea name="deskripsi_id3" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Inggris)." rows="7"><?=set_value('deskripsi_en')?></textarea>
                                            
                                        </div>
                                        
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Menu 4 <i class="req">*</i></label>
                                            <input type="text" name="menu4" class="form-control" placeholder="Menu 4 (Indonesia)">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Menu 4</label>
                                            <textarea name="deskripsi_id4" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Inggris)." rows="7"><?=set_value('deskripsi_en')?></textarea>
                                            
                                        </div>
                                        
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Menu 5 <i class="req">*</i></label>
                                            <input type="text" name="menu5" class="form-control" placeholder="Menu 5 (Indonesia)">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Menu 5</label>
                                            <textarea name="deskripsi_id5" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Inggris)." rows="7"><?=set_value('deskripsi_en')?></textarea>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Nama Program (English) <i class="req">*</i></label>
                                            <input type="text" name="nama_en" class="form-control" placeholder="Nama Program (English)" value="<?=set_value('nama_id')?>" required />
                                            <?=form_error('nama_en')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Menu 1 <i class="req">*</i></label>
                                            <input type="text" name="menu_en1" class="form-control" placeholder="Menu 1 (English)" required />
                                            <?=form_error('menu_en1')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Menu 1</label>
                                            <textarea name="deskripsi_en1" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Indonesia)." rows="7"><?=set_value('deskripsi_id')?></textarea>
                                            <?=form_error('deskripsi_en1')?>
                                        </div>
                                        
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Menu 2 <i class="req">*</i></label>
                                            <input type="text" name="menu_en2" class="form-control" placeholder="Menu 2 (English)" required />
                                            <?=form_error('Menu_en2')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Menu 2</label>
                                            <textarea name="deskripsi_en2" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Inggris)." rows="7"><?=set_value('deskripsi_en')?></textarea>
                                            <?=form_error('deskripsi_en2')?>
                                        </div>
                                        
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Menu 3 <i class="req">*</i></label>
                                            <input type="text" name="menu_en3" class="form-control" placeholder="Menu 3 (English)"/>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Menu 3</label>
                                            <textarea name="deskripsi_en3" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Inggris)." rows="7"><?=set_value('deskripsi_en')?></textarea>
                                           
                                        </div>
                                        
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Menu 4 <i class="req">*</i></label>
                                            <input type="text" name="menu_en4" class="form-control" placeholder="Menu 4 (English)"/>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Menu 4</label>
                                            <textarea name="deskripsi_en4" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Inggris)." rows="7"><?=set_value('deskripsi_en')?></textarea>
                                           
                                        </div>
                                        
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Menu 5 <i class="req">*</i></label>
                                            <input type="text" name="menu_en5" class="form-control" placeholder="Menu 5 (English)"/>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi Menu 5</label>
                                            <textarea name="deskripsi_en5" class="form-control ckeditor" placeholder="Tuliskan isi halaman di sini (dalam Bahasa Inggris)." rows="7"><?=set_value('deskripsi_en')?></textarea>
                                            
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
        <?=$load_manager?>
        <!-- <script>CKEDITOR.replace("textarea");</script> -->
