$('#finishing_project').click(function(){ 
	loading();
	$.ajax({
		url         : $('#form1').attr('action'),
		type        : "POST",
		dataType	: 'json',
		data        : $('#form1').serialize(),
		error		: function () {
						notify('error!','error','#form1','top');
						loadingcomplete();
					},
		success     : function(ret){
						if (ret.error==1) {
							notify(ret.message,'error','#form1','top');
						}
						else{
							window.location.href='';
							notify(ret.message,'success');
							$('#popFinishing').modal('hide');
						}
						loadingcomplete();
		}
	})
})
$('#save').click(function(){
	var back_url = $(this).attr('data-back') || '';
	loading();
	$.ajax({
		url         : $('#form1').attr('action'),
		type        : "POST",
		dataType	: 'json',
		data        : $('#form1').serialize(),
		error		: function () {
						notify('error!');
						loadingcomplete();
					},
		success     : function(ret){
						if (ret.error==1) {
							console.log(ret);
							notify(ret.message);
							loadingcomplete();
						}
						else{
							window.location.href=this_controller + back_url;
						}
		}
	})
})

$('#save_kontak').click(function(){
	loading();
	$.ajax({
		url         : $('#form1').attr('action'),
		type        : "POST",
		dataType	: 'json',
		data        : $('#form1').serialize(),
		error		: function () {
						notify('error!');
						loadingcomplete();
					},
		success     : function(ret){ 
						if (ret.error==1) {
							console.log(ret);
							notify(ret.message);
						}
						else{
							$('body').hide();
							window.location.href=this_controller+'kontak/'+ret.id_profil_mitra;
						}
						loadingcomplete();
		}
	});
})
$('#save_kontak2').click(function(){
	loading();
	$.ajax({
		url         : $('#form1').attr('action'),
		type        : "POST",
		dataType	: 'json',
		data        : $('#form1').serialize(),
		error		: function () {
						notify('error!');
						loadingcomplete();
					},
		success     : function(ret){ 
						if (ret.error==1) {
							console.log(ret);
							notify(ret.message);
						}
						else{
							$('body').hide();
							window.location.href=this_controller+'view/'+ret.id_ref_logframe;
						}
						loadingcomplete();
		}
	});
})


function ajaxFileUpload(){
		$('#result').html('Loading...');
	$.ajaxFileUpload
	(
		{
			url				:this_controller+'upload/upload_file',
			secureuri		:false,
			fileElementId	:'upload_file',
			dataType		: 'text',
			data			:{ temp:$('#temp_kontak').val()},
			success			: function (data){ 
									if(data == 'err_size'){
										$('#result').html('');  
										alert('Besar maksimal foto yang di upload adalah 300kb'); 
									}
									else{
										$('#result').html(data);
										$('#temp_kontak').val(data); 
									}
									$('#upload_file').val('');
			}
		}
	)
	return false;
}
function view_img(img){
		$('#fotonya').attr('src',base_url+"uploads/"+img);
		$('#foto').modal('show');
}
$('.cbx-parent').change(function(){
	var cbx = $(this);
	var id = cbx.attr('data-id');
	if (cbx.attr('checked')) {
		$('#sub-'+id).removeClass('invis');
	}
	else{
		$('#sub-'+id).addClass('invis');
	}
})
