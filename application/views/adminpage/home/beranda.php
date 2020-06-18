        <h1 class="page-header"><?=$title?> <small><?=$subtitle?></small></h1>
        <style>.huge{font-size: 30px !important;}</style>
        <div class="row">
            <!-- <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="panel panel-inverse">
                    <div class="panel-body" style="padding-top: 22px; padding-bottom: 22px;">
                        <div class="row">
                            <div class="col-xs-2" style="padding: 0px 0px 7px 32px;">
                                <i class="fa fa-comments-o fa-5x"></i>
                            </div>
                            <div class="col-xs-10">
                                <?=form_open(admin_url(), array('id' => 'form1'))?>
                                    <div class="form-group">
                                        <label class="control-label"><b>NEWSFLASH</b></label>
                                        <div class="input-group">
                                            <input type="text" name="isi_id" class="form-control" placeholder="Isi Newsflash" value="<?=set_value('isi_id', $newsflash->isi_id)?>" />
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-success">UPDATE!</button>
                                            </span>
                                        </div>
                                        <?=form_error('isi_id')?>
                                    </div>
                                <?=form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=$jml['event']?></div>
                                <div>Event</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?=admin_url('event/tambah')?>">
                        <div class="panel-footer">
                            <span class="pull-left">Tambah Event</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-picture-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=$jml['foto']?></div>
                                <div>Galeri Foto</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?=admin_url('galeri/tambah-foto')?>">
                        <div class="panel-footer">
                            <span class="pull-left">Tambah Foto</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-video-camera fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=$jml['video']?></div>
                                <div>Galeri Video</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?=admin_url('galeri/tambah-video')?>">
                        <div class="panel-footer">
                            <span class="pull-left">Tambah Video</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-child fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=$jml['culture']?></div>
                                <div>Paket Wisata</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?=admin_url('culture/tambah')?>">
                        <div class="panel-footer">
                            <span class="pull-left">Tambah Paket Wisata</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-info-circle fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=$jml['berita']?></div>
                                <div>Berita</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?=admin_url('berita/tambah')?>">
                        <div class="panel-footer">
                            <span class="pull-left">Tambah Berita</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-pdf-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=$jml['dokumen']?></div>
                                <div>Dokumen</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?=admin_url('dokumen/tambah')?>">
                        <div class="panel-footer">
                            <span class="pull-left">Tambah Dokumen</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-map-marker fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?=$jml['maps']?></div>
                                <div>Maps</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?=admin_url('maps/tambah')?>">
                        <div class="panel-footer">
                            <span class="pull-left">Tambah Maps</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>
        <script>
            handleDashboardGritterNotification();
        </script>
        <style>
            .box { min-height:413px; border: 1px solid #BFBFBF; }
            #popupCalendar{overflow-y: auto;width:96% !important;left: 0;height: 96%;left: 2% !important;}
            #popupCalendar.modal{margin-left: 0 !important;}
        </style>
        <link rel='stylesheet' href='<?=admin_assets()?>css/fullcalendar/cupertino/jquery-ui.min.css' />
