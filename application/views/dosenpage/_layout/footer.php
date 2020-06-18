<!-- begin::Footer -->
			<footer class="m-grid__item		m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2019 &copy; 
								<a href="#" class="m-link">
									Teknik Elektro UNHAS
								</a>
							</span>
						</div>
					</div>
				</div>
			</footer>
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->	    
	    <!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->	
    	<!--begin::Base Scripts -->
		<script src="<?=dosen_assets()?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?=dosen_assets()?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
		<script src="<?=dosen_assets()?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->  
        <!--begin::Page Snippets -->
		<script src="<?=dosen_assets()?>assets/app/js/dashboard.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
		<!--begin::Page Resources -->
		<script src="<?=dosen_assets()?>assets/demo/default/custom/components/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
		<script src="<?=dosen_assets()?>assets/demo/default/custom/components/forms/widgets/bootstrap-maxlength.js" type="text/javascript"></script>
		<script src="<?=dosen_assets()?>assets/demo/default/custom/components/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
		<script src="<?=dosen_assets()?>assets/demo/default/custom/components/forms/widgets/summernote.js" type="text/javascript"></script>
		<!--end::Page Resources -->
		<script type="text/javascript">
			var tbl_spk_desainGrafis = $('#tbl_spk_cs').mDatatable({
			data: {
				saveState: {cookie: false},
				/*type: 'remote',
			        source: {
			          read: {
			            // sample GET method
			            method: 'GET',
			            url: 'https://keenthemes.com/metronic/preview/inc/api/datatables/demos/default.php',
			            map: function(raw) {
			              // sample data mapping
			              var dataSet = raw;
			              if (typeof raw.data !== 'undefined') {
			                dataSet = raw.data;
			              }
			              return dataSet;
			            },
			          },
			        },
			        pageSize: 10,
			        serverPaging: true,
			        serverFiltering: true,
			        serverSorting: true,*/
			},
			// layout definition
			layout: {
				theme: 'default', // datatable theme
				class: '', // custom wrapper class
				scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
				// height: 450, // datatable's body's fixed height
				footer: false // display/hide footer
			},

			// column sorting
			sortable: true,
			search: {
				input: $('#generalSearch'),
			},
			columns: [

				{
					field: 'No',
					textAlign: 'center',
					width: 20
				},
				{
					field: 'Judul Penelitian',
					textAlign: 'left',
					width: 400
				},
				{
					field: 'Nama Anggota',
					textAlign: 'center',
					width: 120
				},
				{
					field: 'Tahun',
					textAlign: 'center',
					width: 50
				},
				{
					field: 'Sumber Dana',
					textAlign: 'center',
					width: 60
				},
				{
					field: 'Tindakan',
					textAlign: 'center',
					width: 80
				},
				{
					field: 'Judul Pengabdian',
					textAlign: 'left',
					width: 400
					
				},
				{
					field: 'Judul Publikasi',
					textAlign: 'left',
					width: 400
				},
				{
					field: 'Deskripsi',
					textAlign: 'left',
					width: 200
				},
				{
					field: 'No',
					textAlign: 'center',
					width: 50
				},
				{
					field: 'Kode',
					textAlign: 'center',
					width: 100
				},
				{
					field: 'Mata Kuliah',
					textAlign: 'center',
					width: 400
				},
				{
					field: 'SKS',
					textAlign: 'center',
					width: 50
				},
				{
					field: 'Semester',
					textAlign: 'center',
					width: 100
				},
				{
					field: 'Program',
					textAlign: 'center',
					width: 100
				},
				{
					field: 'Tindakan',
					textAlign: 'center',
					width: 80
				}

			],
		});
		</script>
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
    <script src="<?php echo dosen_assets(); ?>plugins/sweetalert/sweetalert.min.js"></script>
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
                if (isConfirm){ location.href = "<?=dosen_url()?>" + "/" + data_class + "/hapus/" + data_id + "?act=" + data_id; }
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
                if (isConfirm){ location.href = "<?=dosen_url('halaman/reset-menu')?>"; }
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
	<!-- end::Body -->
</html>