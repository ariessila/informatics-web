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
                                    <a href="<?=admin_url('blogs')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                                    <a id="submit" class="btn btn-primary insert" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Submit</a>
                                </div>
                            </div>
                            <div class="clear-fix">&nbsp;</div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <?=form_open_multipart(admin_url('blogs/tambah'), array('id' => 'form1'))?>
                                    <div class="col-md-8">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Judul Berita (Bahasa Indonesia)<i class="req">*</i></label>
                                            <input type="text" name="judul_id" id="judul_id" class="form-control" placeholder="Judul Berita (Bahasa Indonesia)" value="<?=set_value('judul_id')?>" onkeyup="cek_judul_id()"/>
                                            <div id="preview_id">
                                            <i>preview permalink in: https://eng.unhas.com/blogs/</i><i id="permalink_id"></i>  <i id="ket_id"></i>
                                            </div>
                                            <?=form_error('judul')?>
                                        </div>
                                         <div class="form-group form-group-lg">
                                            <label class="control-label">Judul Berita (English)</label>
                                            <input type="text" name="judul_en" id="judul_en" class="form-control" placeholder="Judul Berita (English)" value="<?=set_value('judul_en')?>" onkeyup="cek_judul_en()"/>
                                            <div id="preview_en">
                                            <i>preview permalink en: https://eng.unhas.com/blogs/</i><i id="permalink_en"></i>  <i id="ket_en"></i>
                                            </div>
                                            <script>
                                                function cek_judul_id(){
                                                    var judul = $('#judul_id').val();
                                                    judul = judul.toLowerCase();
                                                    judul = judul.replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"");   //this one
                                                    judul = judul.replace(/\s+/g, "-");
                                                    $('#permalink_id').html(judul);
                                                    var x = <?php echo json_encode($listJudul_id)?>;
                                                    if (judul == ''){
                                                        $('#ket_id').html('  (permalink tidak dapat dipakai!)');
                                                           $('#preview_id').css('color', 'red');
                                                           $("#submit").attr("disabled", true);

                                                    }else if (x.includes(judul)) {
                                                         $('#ket_id').html('  (permalink tidak dapat dipakai!)');
                                                           $('#preview_id').css('color', 'red');
                                                           $("#submit").attr("disabled", true);
                                                    }else if (x.includes(judul) != true){
                                                        $('#ket_id').html('  (permalink dapat dipakai!)');
                                                           $('#preview_id').css('color', 'green');
                                                           $("#submit").attr("disabled", false);
                                                    }

                                                }
                                                function cek_judul_en(){
                                                    var judul = $('#judul_en').val();
                                                    judul = judul.toLowerCase();
                                                    judul = judul.replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"");   //this one
                                                    judul = judul.replace(/\s+/g, "-");
                                                    $('#permalink_en').html(judul);
                                                    var x = <?php echo json_encode($listJudul_en)?>;
                                                    if (judul == ''){
                                                        $('#ket_en').html('  (permalink tidak dapat dipakai!)');
                                                           $('#preview_en').css('color', 'red');
                                                           $("#submit").attr("disabled", true);

                                                    }else if (x.includes(judul)) {
                                                         $('#ket_en').html('  (permalink tidak dapat dipakai!)');
                                                           $('#preview_en').css('color', 'red');
                                                           $("#submit").attr("disabled", true);
                                                    }else if (x.includes(judul) != true){
                                                        $('#ket_en').html('  (permalink dapat dipakai!)');
                                                           $('#preview_en').css('color', 'green');
                                                           $("#submit").attr("disabled", false);
                                                    }

                                                }

                                            </script>
                                            <?=form_error('judul')?>
                                        </div>
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Kategori <i class="req">*</i></label>
                                            <?=form_multiselect('kategori[]', $kategori, set_value('kategori'), 'id="kategori" class="form-control" multiple required')?>
                                            <?=form_error('kategori[]')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Isi Berita (Bahasa Indonesia)<i class="req">*</i></label>
                                            <textarea id="editor1" name="isi_id" class="form-control ckeditor" placeholder="Tuliskan isi blog di sini." rows="100"><?=set_value('isi_id')?></textarea>
                                            <?=form_error('isi_id')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Isi Berita (English)</label>
                                            <textarea id="editor2" name="isi_en" class="form-control ckeditor" placeholder="Tuliskan isi blog di sini." rows="100"><?=set_value('isi_en')?></textarea>
                                            <?=form_error('isi_en')?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Status Publikasi</label>
                                            <select name="publikasi" class="form-control">
                                                <?php $status = array('Publish', 'Draft'); ?>
                                                <option value="<?=$status[0]?>"<?=set_select('publikasi', $status[0])?>>Publikasikan</option>
                                                <option value="<?=$status[1]?>"<?=set_select('publikasi', $status[1])?>>Simpan Sebagai Draft</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Upload Gambar</label>
                                            <input type="file" class="form-control" id="image-upload" name="foto" accept="image/*" />
                                            <input type="hidden" id="image-cropped" name="cfoto" />
                                            <?=(isset($error_upload) ? $error_upload : '')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tampilan Gambar</label>
                                            <img class="img-thumbnail img-responsive" id="image-preview" src="<?=upload_url('blogs/thumbs')?>no_image.png" width="100%" alt="Upload Gambar" />
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
