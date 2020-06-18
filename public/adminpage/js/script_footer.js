$('.add_row').click(function(){
	var idGrid = $(this).attr('alt'); //using attribut alt to get deference grid id
	idGrid = (idGrid) ? idGrid : 'gridData';
	idGrid = '#' + idGrid;
	cek = jQuery(idGrid).jqGrid('getDataIDs');
	if(cek[0]!=0){
	  var su=jQuery(idGrid).addRowData(0,{},'first');
	  jQuery(idGrid).setSelection('0');
	  $('input.editable:first').focus();
		$('select.editable,input:text.editable').attr('class','frm_grid');
	}
})

//changedate('return');
//jQuery("#gridData").jqGrid('gridResize');
jQuery("#gridData").jqGrid('navGrid','#pgridData',{add:false,edit:false,del:false,search:false});
jQuery("#gridData").jqGrid('filterToolbar');


function event_per_month(month,year){
   $.ajax({
      url				:	base_url +'webcontrol/home/event_per_month/month/'+month+'/year/'+year,
      beforeSend		: function(){$('#detail_event').html('Loading...')},
      success			:	function(ret){$('#detail_event').html(ret)}
   });
}
//event_per_month('','');
function detail_event(id){
   $('#theevents').html('Loading...');
   $.ajax({
     url				:	base_url+'webcontrol/home/detail_event/'+id,
     success		:	function(ret){$('#theevents').html(ret)}
  });
   jPopup("theevents",400,300);
}
