$(document).on('click','.pilih',function() {
	var id = $(this).attr('data-id');
	var kegiatan = $('#row'+id+' td.judul_kegiatan').html();
	$('#dari_kegiatan').val(kegiatan);
	$('#id_work_plan').val(id);
	$('#popupKegiatan').modal('hide');
})

$('#save').click(function(){
	var val = $(this).html();
	if(val == loadingBtn){return}
	$(this).html(loadingBtn);
	$.ajaxFileUpload({
			url				:$('#form1').attr('action'),
			secureuri		:false,
			fileElementId	:'file',
			dataType		: 'text',
			data			: $('#form1').serializeObject(),
			success			: function (msg){
								if(msg.substring(0,1) == '0'){
									$('#message').html(msg.substring(1));
									$('#message').show();
									$('#save').html(val);
								}
								else{
									window.location.href=this_controller;
								}
			}
	})
})

$('#save_kontak').click(function(){
	var val = $(this).html();
	if(val == loadingBtn){return}
	//if($("#form_tags").validate().form() == true) {
		$.ajax({
			url         : $('#form1').attr('action'),
			type        : "POST",
			data        : $('#form1').serialize(),
			beforeSend  : function(){$('#save').html(loadingBtn);},
			error		: function () {alert('Error!');$('#save_kontak').html(val);},
			success     : function(msg){ 
							 var data = msg.split('|');
							if(msg.substring(0,1) == '0'){
								$('#message').html(msg.substring(1));
								$('#message').show();
								$('#save_kontak').html(val);
							}
							else{
								window.location.href=this_controller+'kontak/'+data[0];
							}
			}
		});
	//}
})
 
$('#cancel').click(function(){
		window.location.href=this_controller;
	})

$(document).on('click','.unduh',function() {
	var btn	= $(this);
	var id	= btn.attr('data-id');
	var url = btn.attr('href');
	$.ajax({
			url         : this_controller+'unduh',
			type        : "POST",
			data        : 'id='+id,
			beforeSend  : function(){btn.find('i').addClass('icon-spin icon-spinner')},
			error		: function () {alert('Error!')},
			success     : function(msg){
								btn.find('i').removeClass('icon-spin icon-spinner');
								window.location.href=url;
								btn.parent().find('span').html('('+msg+')');
				
			}
		});
	return false;
})
