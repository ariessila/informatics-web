                    <div class="modal fade" id="modal-cropper" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Crop Gambar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="max-width: 100%;">
                                        <img id="image-cropping" src="<?=upload_url('blogs').'no_image.png'?>" style="max-width: 100%;" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <link rel="stylesheet" href="<?=admin_assets()?>plugins/cropperjs/dist/cropper.min.css">
                    <script src="<?=admin_assets()?>plugins/cropperjs/dist/cropper.min.js"></script>
                    <script>
                        window.addEventListener('DOMContentLoaded', function () {
                            var preview = document.getElementById('image-preview');
                            var cropping = document.getElementById('image-cropping');
                            var upload = document.getElementById('image-upload');
                            var $modal = $('#modal-cropper');
                            var is_cropped = false;
                            var original_src = preview.src;
                            // var upl_val = '';
                            var cropper;

                            upload.addEventListener('change', function (e) {
                                // upl_val = upload.value;
                                if (upload.value == '') preview.src = original_src;
                                var files = e.target.files;
                                var done = function (url) {
                                    cropping.src = url;
                                    $modal.modal('show');
                                };
                                var reader;
                                var file;
                                var url;

                                if (files && files.length > 0) {
                                    file = files[0];

                                    if (URL) {
                                        done(URL.createObjectURL(file));
                                    } else if (FileReader) {
                                        reader = new FileReader();
                                        reader.onload = function (e) {
                                            done(reader.result);
                                        };
                                        reader.readAsDataURL(file);
                                    }
                                }
                            });

                            $modal.on('shown.bs.modal', function () {
                                is_cropped = false;
                                cropper = new Cropper(cropping, {
                                    aspectRatio: 16 / 9,
                                    viewMode: 2,
                                });
                            }).on('hidden.bs.modal', function () {
                                if (!is_cropped) {
                                    upload.value = '';
                                    preview.src = original_src;
                                }

                                cropper.destroy();
                                cropper = null;
                            });

                            document.getElementById('crop').addEventListener('click', function () {
                                var initialAvatarURL;
                                var canvas;

                                $modal.modal('hide');

                                if (cropper) {
                                    is_cropped = true;
                                    canvas = cropper.getCroppedCanvas({
                                        width: 720,
                                        height: 405,
                                    });

                                    initialAvatarURL = preview.src;
                                    preview.src = canvas.toDataURL();
                                    $('#image-cropped').val(JSON.stringify(cropper.getData()));
                                }
                            });
                        });
                    </script>
