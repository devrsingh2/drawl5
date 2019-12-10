$('#checkall').on('click',function(){
    if(this.checked){
        $('.check_list').each(function(){
            this.checked = true;
        });
    }else{
        $('.check_list').each(function(){
            this.checked = false;
        });
    }
});

$('.check_list').on('click',function(){
    if($('.check_list:checked').length == $('.check_list').length){
        $('#checkall').prop('checked',true);
    }else{
        $('#checkall').prop('checked',false);
    }
});