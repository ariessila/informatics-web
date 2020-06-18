    </div>

    <!--[if lt IE 9]>
        <script src="<?=admin_assets()?>crossbrowserjs/html5shiv.js"></script>
        <script src="<?=admin_assets()?>crossbrowserjs/respond.min.js"></script>
        <script src="<?=admin_assets()?>crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?=admin_assets()?>plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="<?=admin_assets()?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=admin_assets()?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=admin_assets()?>plugins/jquery-cookie/jquery.cookie.js"></script>
    <script src="<?=admin_assets()?>plugins/gritter/js/jquery.gritter.js"></script>
    <script src="<?=admin_assets()?>plugins/flot/jquery.flot.min.js"></script>
    <script src="<?=admin_assets()?>plugins/flot/jquery.flot.time.min.js"></script>
    <script src="<?=admin_assets()?>plugins/flot/jquery.flot.resize.min.js"></script>
    <script src="<?=admin_assets()?>plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="<?=admin_assets()?>plugins/parsley/dist/parsley.js"></script>
    <script src="<?=admin_assets()?>plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=admin_assets()?>plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?=admin_assets()?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?=admin_assets()?>js/apps.min.js"></script>
    <script src="<?=admin_assets()?>js/jquery.nestable.min.js"></script>
    <script src="<?=admin_assets()?>plugins/bootstrap-checkbox-1.4.0/dist/js/bootstrap-checkbox.min.js"></script>
    <script src="<?=admin_assets()?>assets/demo/default/custom/components/forms/widgets/summernote.js" type="text/javascript"></script>
		<script src="<?=admin_assets()?>css/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
		<script src="<?=admin_assets()?>css/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $('td :checkbox').checkboxpicker({
                html: true,
                offLabel: '<span class="glyphicon glyphicon-remove">',
                onLabel: '<span class="glyphicon glyphicon-ok">'
            });
        });

        function switch_publish(id_headline, value) {
            if (value == "Publish") { var status = "Draft"; }
            else var status = "Publish";
            $.ajax({
                type: "POST",
                url: "<?=admin_url('headline/switch_publish')?>/" + id_headline,
                data: { value: status }
            }).done(function(){
                $("#"+id_headline).val(status);
            });
        }
    </script>
    <script src="<?php echo admin_assets(); ?>plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        function hapus_data(data_class, data_id) {
            swal({
                title: "Hapus Data Ini?",
                text: "Data yang sudah dihapus tidak akan bisa dikembalikan lagi.",
                type: "warning",
                allowOutsideClick: true,
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Hapus',
                closeOnConfirm: false
            },
            function(isConfirm){
                if (isConfirm){ location.href = "<?=admin_url()?>" + "/" + data_class + "/hapus/" + data_id + "?act=" + data_id; }
            });
        }
        function reset_menu() {
            swal({
                title: "Atur Ulang Susunan Menu?",
                text: "Susunan menu akan dikembalikan ke pengaturan default.",
                type: "warning",
                allowOutsideClick: true,
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Reset',
                closeOnConfirm: false
            },
            function(isConfirm){
                if (isConfirm){ location.href = "<?=admin_url('halaman/reset-menu')?>"; }
            });
        }
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#uploadgambar").attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
         var editor_config = {
                filebrowserBrowseUrl: '<?=base_url()?>public/adminpage/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: '<?=base_url()?>public/adminpage/ckfinder/ckfinder.html?type=Images',
                filebrowserUploadUrl: '<?=base_url()?>public/adminpage/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: '<?=base_url()?>public/adminpage/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        };
        var editor_config2 = {
                filebrowserBrowseUrl: '<?=base_url()?>public/adminpage/ckfinder2/ckfinder.html',
                filebrowserImageBrowseUrl: '<?=base_url()?>public/adminpage/ckfinder2/ckfinder.html?type=Images',
                filebrowserUploadUrl: '<?=base_url()?>public/adminpage/ckfinder2/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: '<?=base_url()?>public/adminpage/ckfinder2/core/connector/php/connector.php?command=QuickUpload&type=Images'
        };

        

        CKEDITOR.replace('editor2', editor_config );
        CKEDITOR.replace('editor1', editor_config2 );
    </script>
    <!--<script>
    
       ClassicEditor
	    .create( document.querySelector( '#editor' ), {
		ckfinder: {
            "uploaded": true,
			uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		},
		toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
	} )
	.catch( error => {
		console.error( error );
	} );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor_en' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        import Image from '@ckeditor/ckeditor5-image/src/image';
        import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar';
        import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption';
        import ImageStyle from '@ckeditor/ckeditor5-image/src/imagestyle';

        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                plugins: [ Image, ImageToolbar, ImageCaption, ImageStyle ],
                image: {
                    toolbar: [ 'imageTextAlternative', '|', 'imageStyle:full', 'imageStyle:side' ]
                }
            } )
            .then( ... )
            .catch( ... );
    </script> -->
    <script>
		$(function()
		{
			/*-----------------------------------/
			/*	DATE PICKER
			/*----------------------------------*/
			$('.inline-datepicker').datepicker(
			{
				todayHighlight: true
			});
			/*-----------------------------------/
			/*	COLOR PICKER
			/*----------------------------------*/
			$('#demo-colorpicker1').colorpicker(
			{
				align: 'left'
			});
			$('#demo-colorpicker2').colorpicker(
			{
				align: 'left',
				format: 'rgba'
			});
			$('#demo-colorpicker3').colorpicker();
			$('#demo-colorpicker4').colorpicker(
			{
				colorSelectors:
				{
					'#000000': '#000000',
					'#00AAFF': '#00AAFF',
					'#41B314': '#41B314',
					'#e4cb10': '#e4cb10',
					'#F9354C': '#F9354C',
					'#5bc0de': '#5bc0de',
					'#777777': '#777777'
				}
			});
			$('#colorpicker-inline').colorpicker(
			{
				color: '#41B314',
				container: true,
				inline: true
			});
			$('#demo-colorpicker5').colorpicker().on('changeColor', function(e)
			{
				$('#demo-colorpicker5').css('background-color', e.color.toString('rgba'));
			});
			/*-----------------------------------/
			/*	BOOTSTRAP CLOCK PICKER
			/*----------------------------------*/
			$('.basic-clockpicker').clockpicker(
			{
				donetext: 'DONE',
			});
			var input = $('#single-input').clockpicker(
			{
				placement: 'top',
				autoclose: true,
				'default': 'now'
			});
			$('#check-minutes').click(function(e)
			{
				// Have to stop propagation here
				e.stopPropagation();
				input.clockpicker('show').clockpicker('toggleView', 'minutes');
			});
		});
		</script>
</body>
</html>
