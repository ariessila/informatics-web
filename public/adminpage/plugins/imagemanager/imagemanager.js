$(document).ready(function(){

	$('.browse-image').click(function(){
		$('#list-image-manager').html("<i class='fa fa-spinner fa-spin'></i> Loading...");
		$('#popImageManager').modal('show');
		var id = $(this).attr('id');
		$('#popImageManager').attr('data-image-id',id);
		$('#popImageManager').removeAttr('data-is-ckeditor');
		$.ajax({
			url         : admin_url + "home/imagemanager",
			type        : "POST",
			error		: function (a,b,c) {
							alert('error loading image');
						},
			success     : function(ret){
							$('#list-image-manager').html(ret);
			}
		});

	})
	$('#upload-img').click(function(){
		if($('#imagemanagersource').val()){
			ajaxFileUpload();
		}
		else{
			alert('File is required');
		}
	})

	$('#imagemanager-cancel').click(function(){
		$('#modal-crop').modal('hide');
		$('#file').val('');
	})
	$('#imagemanager-save').click(function(){
		var thumb = $('#image-thumb img').attr('src');
		var is_public = $('#is_public').attr('checked') ? 1 : 0;
		var imgname = $('#imagemanager-name').val();
		var tmp = $('#image-thumb img').attr('data-tmp');
		if(!thumb){
			alert('please create thumbnail');
			return;
		}

		var btn = $(this);
		if(btn.html() == 'Loading...'){
			return;
		}
		var is_ckeditor = $('#popImageManager').attr('data-is-ckeditor');
		var is_popImage = $('#popImageManager').attr('data-image-id');
		btn.html('Loading...');
		$.ajax({
			url         : base_url+"apps/home/imagemanager_save",
			type        : "POST",
			data 		: 'is_public='+is_public+'&name='+imgname+'&tmp='+tmp,
			error		: function (a,b,c) {alert('error')},
			success     : function(ret){
							$('#modal-crop').modal('hide');
							$('.browse-image').trigger('click');
							console.log(is_popImage);
							if(is_ckeditor){
								$('#popImageManager').attr('data-image-id',is_popImage);
								$('#popImageManager').attr('data-is-ckeditor','1');
							}
							btn.html('Save');

						}
		});

	})

})

	$(document).on('click','.select-image',function(){
		var img = $(this).parent().parent().find('img');
		var path = img.attr('src');
		var fname = img.attr('data-img');
		var is_ckeditor = $('#popImageManager').attr('data-is-ckeditor');

		var area = $('#popImageManager').attr('data-image-id');

		$('#popImageManager').modal('hide');
		if(is_ckeditor){
			CKEDITOR.instances[area].insertHtml('<img src="'+base_url+'images/article/large/'+fname+'">');
		} else {
			$("#"+area).html('<img width="100%" src="'+path+'">');
			$("#"+area).parent().find('input').val(fname);
		}
	})
	$(document).on('click','.zoom-image',function(){
		var img = $(this).parent().parent().find('img');
		var path = img.attr('src');
		var fname = img.attr('data-img');

		$('#imageDetail').attr('src',path.replace('thumbs/','ori/'));
		$('#popImageManagerDetail').modal('show');
	})



	function ajaxFileUpload() {
		var btn = $('#upload-img');
		if(btn.html() == 'Loading...'){
			return;
		}
		btn.html('Loading...');
		$('#image-thumb img').removeAttr('src');
		$.ajaxFileUpload({
			url				: base_url+'apps/home/imagemanager',
			secureuri		: false,
			fileElementId	: 'imagemanagersource',
			dataType		: 'post',
			data			: {name:'img'},
			success			: function (data){
							data = (JSON.parse(data));
							if(data.message=='success'){
								$('#upload_loading').removeClass('icon-refresh');
								croping(data.filename,data.height,data.width);
								$('.result').html('');
								$('#file_thumb').val('');
								$('#file,#imagemanager-name').val(data.file);
								$('#modal-crop').modal('show');
								btn.html('Upload');
							} else {
								alert(data.message);
							}
							},
			error			: function(){alert('error');btn.html('Upload')}
		})
	}

	function croping(fname,tinggi,lebar){
		$(document).ready(function(){
		   var cropzoom = $('#crop_container').cropzoom({
				width:750,
				height:400,
				bgColor: '#CCC',
				enableRotation:true,
				enableZoom:true,
				zoomSteps:1,
				rotationSteps:1,
				selector:{
				  centered:true,
				  borderColor:'blue',
				  borderColorHover:'yellow',
				  startWithOverlay: false,
				  hideOverlayOnDragAndResize: true
				},
				image:{
					source:fname,
					width:lebar,
					height:tinggi,
					minZoom:10,
					maxZoom:1500,
					snapToContainer:false
				}
			});
			$('#crop').click(function(){
				var btn = $(this);
				var val = btn.html();
				btn.html('Loading...');
				if (val != 'Loading...') {
					cropzoom.send(base_url+'external/resize_and_crop.php','POST',{},function(ret){
						var val = btn.html('Create Thumbnail');
						// var html = '<div class="img-list" title="'+ret+'">\
						// 				<div class="img"><img width="100%" src="{base_url}external/'+ret+'" data-img="'+ret+'"></div>\
						// 				<div>\
						// 					<span class="img-name">'+ret+'</span>\
						// 					<i class="icon-zoom-in pull-right zoom-image" title="Zoom"></i>\
						// 					<i class="icon-ok pull-right select-image" title="Select Image"></i>\
						// 				</div>\
						// 			</div>';
						// $("#image img").attr('src',"{base_url}external/"+ret);
						$('#image-thumb img').attr('src',base_url+'external/'+ret);
						$('#image-thumb img').attr('data-tmp',ret);
						// $('#modal-crop').modal('hide');
						$('#file_thumb').val(ret);
					});
				}
			});
			$('#restore').click(function(){
				$('.result').find('img').remove();
				$('.result').find('.txt').show()
				cropzoom.restore();
			});
		});
	}


	// $(document).on('click','.cke_button__image',function(){
	// 	alert('?');
	// 	setTimeout($('#cke_dialog_close_button').trigger('close'),1000);

	// })
