        <h1 class="page-header"><?=$title?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Pindahkan ke bagian kanan untuk memunculkan halaman di menu utama.</h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="row-fluid">
                                <div class="col-sm-12 text-right">
                                    <a href="javascript:;" class="btn btn-warning" onclick="reset_menu()"><i class="fa fa-reload"></i> Reset Menu</a>
                                    <a href="javascript:;" class="btn btn-primary update" onclick="$('#form1').submit()"><i class="fa fa-save"></i> Update</a>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Semua Halaman (Menu Tidak Aktif)</th>
                                            <th class="text-center">Halaman Depan (Menu Aktif)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <div class="dd" id="nestable">
                                        <?php
                                            $parent = json_decode($json1, TRUE);
                                            if (!$parent) { ?>
                                                    <div class="dd-empty"></div>
                                            <?php } else { ?>
                                                    <ol class="dd-list">
                                            <?php
                                                foreach ($parent as $key1 => $value1) {
                                                    if (sizeof($value1) == 1) { ?>
                                                        <li class="dd-item" data-id="<?=$value1['id']?>">
                                                            <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['nama_id'])?></div>
                                                        </li>
                                                    <?php } else { ?>
                                                        <li class="dd-item" data-id="<?=$value1['id']?>">
                                                            <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['nama_id'])?></div>
                                                            <ol class="dd-list">
                                                    <?php
                                                        foreach ($value1['children'] as $key2 => $value2) {
                                                            if (sizeof($value2) == 1) { ?>
                                                                <li class="dd-item" data-id="<?=$value2['id']?>">
                                                                    <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['nama_id'])?></div>
                                                                </li>
                                                            <?php } else { ?>
                                                                <li class="dd-item" data-id="<?=$value2['id']?>">
                                                                    <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['nama_id'])?></div>
                                                                    <ol class="dd-list">
                                                            <?php
                                                                foreach ($value2['children'] as $key3 => $value3) {
                                                                    if (sizeof($value3) == 1) { ?>
                                                                        <li class="dd-item" data-id="<?=$value3['id']?>">
                                                                            <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['nama_id'])?></div>
                                                                        </li>
                                                                    <?php } else { ?>
                                                                        <li class="dd-item" data-id="<?=$value3['id']?>">
                                                                            <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['nama_id'])?></div>
                                                                            <ol class="dd-list">
                                                                    <?php
                                                                        foreach ($value3['children'] as $key4 => $value4) {
                                                                            if (sizeof($value4) == 1) { ?>
                                                                                <li class="dd-item" data-id="<?=$value4['id']?>">
                                                                                    <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['nama_id'])?></div>
                                                                                </li>
                                                                            <?php } else { ?>
                                                                                <li class="dd-item" data-id="<?=$value4['id']?>">
                                                                                    <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['nama_id'])?></div>
                                                                                    <ol class="dd-list">
                                                                            <?php
                                                                                foreach ($value4['children'] as $key5 => $value5) { ?>
                                                                                        <li class="dd-item" data-id="<?=$value5['id']?>">
                                                                                            <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['nama_id'])?></div>
                                                                                        </li>
                                                                                <?php } ?>
                                                                                    </ol>
                                                                                </li>
                                                                            <?php }
                                                                        } ?>
                                                                            </ol>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                } ?>
                                                                    </ol>
                                                                </li>
                                                                <?php
                                                            }
                                                        } ?>
                                                            </ol>
                                                        </li>
                                                    <?php }
                                                } ?>
                                                    </ol>
                                            <?php }
                                        ?>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="dd" id="nestable2">
                                        <?php
                                            $parent = json_decode($json2, TRUE);
                                            if (!$parent) { ?>
                                                    <div class="dd-empty"></div>
                                            <?php } else { ?>
                                                    <ol class="dd-list">
                                            <?php
                                                foreach ($parent as $key1 => $value1) {
                                                    if (sizeof($value1) == 1) { ?>
                                                        <li class="dd-item" data-id="<?=$value1['id']?>">
                                                            <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['nama_id'])?></div>
                                                        </li>
                                                    <?php } else { ?>
                                                        <li class="dd-item" data-id="<?=$value1['id']?>">
                                                            <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['nama_id'])?></div>
                                                            <ol class="dd-list">
                                                    <?php
                                                        foreach ($value1['children'] as $key2 => $value2) {
                                                            if (sizeof($value2) == 1) { ?>
                                                                <li class="dd-item" data-id="<?=$value2['id']?>">
                                                                    <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['nama_id'])?></div>
                                                                </li>
                                                            <?php } else { ?>
                                                                <li class="dd-item" data-id="<?=$value2['id']?>">
                                                                    <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['nama_id'])?></div>
                                                                    <ol class="dd-list">
                                                            <?php
                                                                foreach ($value2['children'] as $key3 => $value3) {
                                                                    if (sizeof($value3) == 1) { ?>
                                                                        <li class="dd-item" data-id="<?=$value3['id']?>">
                                                                            <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['nama_id'])?></div>
                                                                        </li>
                                                                    <?php } else { ?>
                                                                        <li class="dd-item" data-id="<?=$value3['id']?>">
                                                                            <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['nama_id'])?></div>
                                                                            <ol class="dd-list">
                                                                    <?php
                                                                        foreach ($value3['children'] as $key4 => $value4) {
                                                                            if (sizeof($value4) == 1) { ?>
                                                                                <li class="dd-item" data-id="<?=$value4['id']?>">
                                                                                    <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['nama_id'])?></div>
                                                                                </li>
                                                                            <?php } else { ?>
                                                                                <li class="dd-item" data-id="<?=$value4['id']?>">
                                                                                    <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['nama_id'])?></div>
                                                                                    <ol class="dd-list">
                                                                            <?php
                                                                                foreach ($value4['children'] as $key5 => $value5) { ?>
                                                                                        <li class="dd-item" data-id="<?=$value5['id']?>">
                                                                                            <div class="dd-handle"><?=($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['nama_id'])?></div>
                                                                                        </li>
                                                                                <?php } ?>
                                                                                    </ol>
                                                                                </li>
                                                                            <?php }
                                                                        } ?>
                                                                            </ol>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                } ?>
                                                                    </ol>
                                                                </li>
                                                                <?php
                                                            }
                                                        } ?>
                                                            </ol>
                                                        </li>
                                                    <?php }
                                                } ?>
                                                    </ol>
                                            <?php }
                                        ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!-- <tfoot> -->
                                    <tfoot style="display: none;">
                                        <tr>
                                            <td colspan="2" class="text-center">Output:</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?=form_open(admin_url('halaman/save_nestable'), array('id' => 'form1'))?>
                                                    <textarea id="nestable-output" name="serialization" class="form-control" readonly></textarea>
                                                    <textarea id="nestable2-output" name="serialization2" class="form-control" readonly></textarea>
                                                <?=form_close()?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                var updateOutput = function(e) {
                    var list   = e.length ? e : $(e.target),
                        output = list.data('output');
                    if (window.JSON) {
                        output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                    } else {
                        output.val('JSON browser support required for this demo.');
                    }
                };

                var saveNestable = function() {
                    $.ajax({
                        type: 'POST',
                        url: '<?=admin_url('halaman/save_nestable')?>',
                        data: {
                            serialization       : $('#nestable-output').val(),
                            serialization2      : $('#nestable2-output').val()
                        }
                    });
                }

                // activate Nestable for list 1
                $('#nestable').nestable({
                    group: 1,
                    maxDepth: 2
                })
                .on('change', updateOutput);
                // .on('change', saveNestable);

                // activate Nestable for list 2
                $('#nestable2').nestable({
                    group: 1,
                    maxDepth: 2
                })
                .on('change', updateOutput);
                // .on('change', saveNestable);

                // output initial serialised data
                updateOutput($('#nestable').data('output', $('#nestable-output')));
                updateOutput($('#nestable2').data('output', $('#nestable2-output')));

                $('#nestable-menu').on('click', function(e) {
                    var target = $(e.target),
                        action = target.data('action');
                    if (action === 'expand-all') {
                        $('.dd').nestable('expandAll');
                    }
                    if (action === 'collapse-all') {
                        $('.dd').nestable('collapseAll');
                    }
                });
            });
        </script>
