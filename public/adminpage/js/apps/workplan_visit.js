$('.unduh_file').click(function(){ 
	var idx = $(this).attr('id');
	var link = $(this).attr('data-url-rm');  
		$.ajax({
			url 		: this_controller+ link,
			data 		: 'id_work_plan='+ idx,
			type 		: 'POST',
			dataType	: 'json',
			success		: function(msg){
						if (msg.file == null){
							alert('Tidak Ada File untuk di download');
						}
						else { 
							window.location.href=msg.link; 
						} 
			}
		}) 
})

$('.view_detail').click(function(){ 
	var idx = $(this).attr('id');
	var link = $(this).attr('data-url-rm');  
		$.ajax({
			url 		: this_controller+ link,
			data 		: 'id_work_plan='+ idx,
			type 		: 'POST', 
			success		: function(msg){
							$('#bagian_data').html(msg); 
			}
		}) 
})