        <h1 class="page-header"><?=$title?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
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
                                <div class="col-sm-12">
                                    <a class="btn btn-primary insert" href="<?=admin_url('testimoni/tambah')?>"><i class="fa fa-plus"></i> Tambah</a>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Urutan <span></span></th>
                                            <th class="text-center">Klien <span></span></th>
                                            <th class="text-center">Judul <span></span></th>
                                            <th class="text-center">Status <span></span></th>
                                            <th class="text-center">Tindakan <span></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($testimoni as $data): ?>
                                        <tr>
                                            <td class="text-center"><?=$i?></td>
                                            <td class="text-center">
                                                <form action="<?=admin_url('testimoni/tukar-posisi')?>" method="POST">
                                                    <input type="hidden" name="id" value="<?=$data->id_testimoni?>" />
                                                    <input type="hidden" name="urutan" value="<?=$data->urutan?>" />
                                                    <div class="btn-group-vertical">
                                                        <button type="submit" name="naik" class="btn btn-success" title="Naik Urutan"><i class="fa fa-caret-square-o-up "></i></button>
                                                        <button type="submit" name="turun" class="btn btn-danger" title="Turun Urutan"><i class="fa fa-caret-square-o-down"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="text-center"><?=$data->nama_klien?></td>
                                            <td class="text-center"><?=$data->judul?></td>
                                            <td class="text-center"><?=$data->publikasi?></td>
                                            <td class="text-center">
                                                <a href="<?=admin_url('testimoni/edit/'.$data->id_testimoni)?>" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="javascript:;" onclick="hapus_data('testimoni', '<?=$data->id_testimoni?>')" class="btn btn-danger" title="Hapus"><i class="fa fa-trash-o"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
