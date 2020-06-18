$(document).on('click','.show-dtl-addendum',function(){
	var btn = $(this);
	var span = btn.find('span');
	var tr = btn.parent().parent();
	var rowid = tr.attr('id');
	var detail = 'detail'+rowid;
	if(!btn.hasClass('disabled')){
		if (span.hasClass('icon-caret-down')) {
			span.removeClass('icon-caret-down').addClass('icon-caret-up');
			if (!$('tr').hasClass(detail)) {
				tr.after('<tr class="'+detail+'"><td colspan="8" class="center"><i class="fa fa-spinner fa-spin"></i> Loading...</td></tr>');
				$.ajax({
					url         : this_controller+"data_program_child/"+rowid,
					type        : "POST",
					error		: function (a,b,c) {
									$('.'+detail).remove();
									span.addClass('icon-caret-down').removeClass('icon-caret-up');
									alert(c);
								},
					success     : function(ret){
									$('.'+detail).remove();
									tr.after(ret);
					}
				});
			}
			else{
				$('.'+detail).show();
			}
		}
		else{
			span.addClass('icon-caret-down').removeClass('icon-caret-up');
			$('.'+detail).hide();
		}
	}
}) 
$('#save_detail').click(function(){
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
							window.location.href=this_controller+'index/'+ret.id_data_program;
						}
						loadingcomplete();
		}
	});
})

$('#save_tor').click(function(){
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
							window.location.href=this_controller+'index/'+ret.id_data_program+'/'+ret.id_work_plan;
						}
						loadingcomplete();
		}
	});
})

$('#save_penerima_manfaat').click(function(){
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
							window.location.href=this_controller+'index/'+ret.id_data_program+'/'+ret.id_work_plan;
						}
						loadingcomplete();
		}
	});
})

$('#save_wp_report').click(function(){
	loading();
	$.ajaxFileUpload({
		url				: $('#form1').attr('action'),
		secureuri		: false,
		fileElementId	: 'file',
		dataType		: 'json',
		data			: $('#form1').serializeObject(),
		success			: function (ret){
							//$('body').hide();
							//window.location.href='';
							$("#fname").html(ret.file);
							$("#fname").parent().attr('href',base_url+'uploads/work_plan/report/'+ret.file);
							notify(ret.message,'success');
							loadingcomplete();
						},
		error			: function(a){

							notify('error! '+ a.responseText);
							loadingcomplete();
						}
		
	})
})

$('#save_lap_naratif').click(function(){
	loading();
	$.ajaxFileUpload({
		url				: $('#form1').attr('action'),
		secureuri		: false,
		fileElementId	: 'file',
		dataType		: 'json',
		data			: $('#form1').serializeObject(),
		success			: function (ret){
							window.location.href= this_controller;
						},
		error			: function(a){
							notify('error! '+ a.responseText);
							loadingcomplete();
						}
		
	})
})
function ajaxFileUpload(){
	$('#result').html('Loading...');
	$.ajaxFileUpload({
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
									$('#result').html(data );
									$('#temp_kontak').val(data); 
								}
								$('#upload_file').val('');
		}
	})
	return false;
}

$('#save_komen').click(function(){ 
	loading();
	$.ajax({
		url         : $('#formKomeng').attr('action'),
		type        : "POST",
		dataType	: 'json',
		data        : $('#formKomeng').serialize(),
		error		: function () {
						notify('error!','error','#form1','top');
						loadingcomplete();
					},
		success     : function(ret){
						if (ret.error==1) {
							notify(ret.message,'error','#form1','top');
						}
						else{
							$('body').hide();
							window.location.href='';
							//notify(ret.message,'success');
							//$('#popComment').modal('hide');
						}
						loadingcomplete();
		}
	})
})


$('#save_status').click(function(){ 
	loading();
	$.ajax({
		url         : $('#form2').attr('action'),
		type        : "POST",
		dataType	: 'json',
		data        : $('#form2').serialize(),
		error		: function () {
						notify('error!','error','#form2','top');
						loadingcomplete();
					},
		success     : function(ret){
						if (ret.error==1) {
							notify(ret.message,'error','#form2','top');
						}
						else{
							window.location.href='';
							//notify(ret.message,'success');
							//$('#popComment').modal('hide');
						}
						loadingcomplete();
		}
	})
})
$('.berkontribusi').change(function(){
	var cbx = $(this);
	var id = cbx.attr('data-id');
	if (cbx.attr('checked')) {
		if (id ==1){
			$('#data-kontri').removeClass('invis');
		}
		else if (id==2){
			$('#data-kontri').addClass('invis');
		}
	}
	else{ 
		$('#data-kontri').addClass('invis');
	}
})
$('#sesuai_rencana').change(function(){
	if(!$('#sesuai_rencana').attr('checked')){
		$('textarea.report').attr('disabled',true);
		$('#form1').find('.report').each(function(){
			$(this).attr('data-old',$(this).val());
		})
		$('textarea.report').val('');
	}
	else{
		$('textarea.report').attr('disabled',false);
		$('#form1').find('.report').each(function(){
			if ($(this).attr('data-old')) {
				$(this).val($(this).attr('data-old'));
			}
		})
	}

})

function callback(){ 
	if ($('#tombol').hasClass('icon-caret-down')){
		$('#tombol').removeClass('icon-caret-down').addClass('icon-caret-up');
	}
	else {
		$('#tombol').addClass('icon-caret-down').removeClass('icon-caret-up');
	}
}
$(".buka").click(function(){
  $(".data_detail").toggle('slow',callback);
   //$( ".book" ).slideToggle( "slow", function() {
// Animation complete.
});


if(!$('#sesuai_rencana').attr('checked')){
	$('textarea.report').attr('disabled',true);
}


$('#diliput_media').change(function(){
	if($('#diliput_media').attr('checked')){
		$('#file,#filename').show();
	}
	else{
		$('#file,#filename').hide();
	}
})
if($('#diliput_media').attr('checked')){
	$('#file').show();
}
