/*
* for other category
* */
$('#other').on('change', function (e){
    if($('#other_des').css('display') == 'none'){
        $('#other_des').show();
        $('#other_des').val('');
    }
    else {
        $('#other_des').hide();
    }
});
