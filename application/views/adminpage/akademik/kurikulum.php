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
                        <h6 style="color: red;">
                                    <?php
                                        $Info = $this->session->flashdata('info');
                                        if(!empty($Info)){
                                        echo $info;
                                        }
                                    ?>
                                </h6>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="row-fluid">
                                <div class="col-sm-12">
                                    <a class="btn btn-primary insert" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Tambah</a>
                                    <div class="pull-right">
                                        <form method="GET" class="form-inline">
                                            <div class="input-group">
                                                <!--<input class="form-control" name="q" value="<?=($this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : '')?>" placeholder="Cari Halaman..." />
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>-->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Mata Kuliah (Indonesia) <span></span></th>
                                            <th class="text-center">Deskripsi (Indonesia) <span></span></th>
                                            <th class="text-center">Mata Kuliah (English) <span></span></th>
                                            <th class="text-center">Deskripsi (English) <span></span></th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($kurikulum as $data){ ?>
                                        <tr>
                                            <td class="text-center"><?=$i++?></td>
                                            <td><?= $data->matkul?></td>
                                            <td><?= $data->deskripsi ?></td>
                                            <td><?= $data->en_matkul?></td>
                                            <td><?= $data->en_deskripsi?></td>
                                            <td class="text-center">
                                                <button type="button" data-toggle="modal" data-target="#editModal<?=$data->id?>"  class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></button>
                                                
                                                <button type="button" data-toggle="modal" data-target="#deleteModal<?=$data->id?>" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <?php  }?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?=form_open_multipart(admin_url('kurikulum/addKurikulum'))?>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mata Kuliah ID:</label>
            <input type="text" class="form-control" name="matkul">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Deskripsi ID:</label>
            <textarea class="form-control" name="deskripsi"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mata Kuliah EN:</label>
            <input class="form-control" name="en_matkul"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Deskripsi EN:</label>
            <textarea class="form-control" name="en_deskripsi"></textarea>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      <?=form_close()?>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<?php foreach($kurikulum as $data){
    $id = $data->id ?>
<div class="modal fade" id="editModal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?=form_open_multipart(admin_url('kurikulum/editKurikulum/'.$id))?>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mata Kuliah ID:</label>
            <input type="text" class="form-control" name="matkul" value="<?= $data->matkul ?>">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Deskripsi ID:</label>
            <textarea class="form-control" name="deskripsi"><?= $data->deskripsi?></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mata Kuliah EN:</label>
            <input class="form-control" name="en_matkul" value="<?= $data->en_matkul ?>"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Deskripsi EN:</label>
            <textarea class="form-control" name="en_deskripsi"><?=$data->en_deskripsi?></textarea>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      <?=form_close()?>
      </div>
    </div>
  </div>
</div>
<?php }?>

<!-- Delete Model -->
<?php
    foreach($kurikulum as $data){
        $id = $data->id;
?>
<div class="modal fade" id="deleteModal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Kurikulum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure Want to Delete This?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <?=form_open_multipart(admin_url('kurikulum/deleteKurikulum/'.$id))?>
        <button type="submit" class="btn btn-primary">Delete</button>
    <?=form_close()?>
      </div>
    </div>
  </div>
</div>
    <?php } ?>