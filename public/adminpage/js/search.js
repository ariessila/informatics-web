$(".search_data").on("keyup", function(e) {
    $('#search_text').html($('.search_data').val());
    get_date();
});
$("#calendar_days_number,#calendar_months_word,#calendar_years_number").on("change", function(e) {
    get_date();
});
function get_date(){
    if($("#calendar_years_number").val() != '' && $("#calendar_months_word").val() != '' && $("#calendar_days_number").val() != ''){
        $('#search_publish_date').val($("#calendar_years_number").val()+'-'+$("#calendar_months_word").val()+'-'+$("#calendar_days_number").val());
    }else{
        $('#search_publish_date').val('');
    }
}
setTimeout(function() {
    $('#search_id_status_publish').val(2);
    $('#search_approval_level').val(100);
    $('#search_text').html(search_get_value);
    $('.search_data').val(search_get_value);
    $('#filter_data').click();
}, 500);

