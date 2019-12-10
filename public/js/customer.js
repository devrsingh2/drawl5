$('#subscribe').click(function(){

    var form_data = $('#subscribe-form').serialize();
    $.ajax({
        method: "post",
        url: $('#subscribe-form').attr('action'),
        data: form_data,
        success: function(data){
            if($.isEmptyObject(data.error)) {
                toastr.success(data.message, '', {
                    timeOut: 2000,
                    extendedTimeOut: 2000,
                    fadeOut: 2000,
                    closeButton: false,
                    "positionClass": "toast-bottom-right"
                });
           }else{
                toastr.error(data.message, '', {
                    timeOut: 2000,
                    extendedTimeOut: 2000,
                    fadeOut: 2000,
                    closeButton: false,
                    "positionClass": "toast-bottom-right"
                });
            }
        }
    });
});

$('#place-requirement').submit(function(e){

    e.preventDefault();
    e.stopPropagation();
    var form_data = $(this).serialize();
    $.ajax({
        method: "POST",
        url: $(this).attr('action'),
        data: form_data,
        success: function(data){
            var response = JSON.parse(data);
            $('#place-requirement-model').modal('toggle');
            swal("Good job!", "You have posted the requirement!", "success");
        }
    });
    return false;
});
$("#existing-requirement").on('show.bs.modal', function(){
    var url = $("#customer_url").val()+"/get-requirements";
    $.ajax({
        type: "GET",
        url: url,
        success: function(data){
            var response = JSON.parse(data);
            $.each(response.data, function(){
                $('.existing-requirement').find('tbody').append("<tr>"+
                    "<td>"+this.title+"</td>"+
                    "<td>"+this.description+"</td>"+
                    "<td>"+this.quantity+"</td>"+
                    "<td><span class=\"badge badge-"+(this.active==1?'danger':'secondary')+"\">"+(this.active==1?'Active':'Disabled')+"</span></td>"+
                    "</tr>");
            });
        }
    });
});
$(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});

function menuToggle() {
    const panels = document.getElementsByClassName('menu_panel');
    const menu = document.getElementsByClassName('menu_info')[0];
    const btn = document.getElementById('btn');

    if(panels[0].classList.contains('drop_down')) {
        //close
        $('.menu_info').addClass('hide');
        btn.innerHTML = '';
        btn.style.backgroundImage = 'url("https://res.cloudinary.com/dsp6kqag8/image/upload/v1469753516/Menu_gk3ed1.svg")';
        panels[0].style.animationDelay = '.5s';
        panels[0].classList.remove('drop_down');
        panels[0].classList.add('reverse_drop_down');
        panels[2].style.animationDelay = '.0s';
        panels[2].classList.remove('drop_down');
        panels[2].classList.add('reverse_drop_down');
        panels[1].style.animationDelay = '.25s';
        panels[1].classList.remove('drop_up');
        panels[1].classList.add('reverse_drop_up');
        menu.style.animationDelay = '.25s';
        menu.classList.remove('drop_up');
        menu.classList.add('reverse_drop_up');
        setTimeout(function(){
            $('.menu_panel').addClass('hide');
        },1000);
    } else if(panels[0].classList.contains('reverse_drop_down')) {
        //open
        $('.menu_panel').removeClass('hide');
        btn.style.backgroundImage = 'none';
        btn.innerHTML = '<p>&times;</p>';
        panels[0].style.animationDelay = '0s';
        panels[0].classList.remove('reverse_drop_down');
        panels[0].classList.add('drop_down');
        panels[2].style.animationDelay = '.5s';
        panels[2].classList.remove('reverse_drop_down');
        panels[2].classList.add('drop_down');
        panels[1].style.animationDelay = '.25s';
        panels[1].classList.remove('reverse_drop_up');
        panels[1].classList.add('drop_up');
        menu.style.animationDelay = '.75s';
        menu.classList.remove('reverse_drop_up');
        menu.classList.add('drop_up');
        setTimeout(function(){
            $('.menu_info').removeClass('hide');
        },800);
    } else {
        //initial
        panels[0].style.animationDelay = '0s';
        panels[0].classList.add('drop_down');
        panels[2].style.animationDelay = '.5s';
        panels[2].classList.add('drop_down');
        panels[1].style.animationDelay = '.25s';
        panels[1].classList.add('drop_up');
        btn.style.backgroundImage = 'none';
        btn.innerHTML = '<p>&times;</p>'
        menu.style.animationDelay = '.75s';
        menu.classList.add('drop_up');
        $('.menu_panel').removeClass('hide');
        setTimeout(function(){
            $('.menu_info').removeClass('hide');
        },800);
    }
}
function main() {
    const btn = document.getElementById('btn');
    btn.addEventListener('click', menuToggle);
    initProfile();
    bannerData();
}

function bannerData() {
    var bannerDataRoute=$('#bannerDataRoute').val();

    $.ajax({
        type: "GET",

        url:bannerDataRoute,
        success: function(data){
            var response = JSON.parse(data);

            $('#progress_req').text(response.req_per);
            $('#progress_bid').text(response.bid_per);
            /* $('#email').text(response.data[0].email);*/
        }
    });
}

function initProfile(){
    var getprofileurl=$('#getprofileurl').val();
    $.ajax({

        type: "GET",
        //url: '{{url("customer/get-profile")}}',
        url:getprofileurl,
        success: function(data){
            var response = JSON.parse(data);

            $('#name').text(response.data[0].name);
            $('#phone').text(response.data[0].phone);
            $('#email').text(response.data[0].email);
        }
    });
}

/*$(document).ready(function() {

    var url = $("#customer_url").val()+"/get-requirements";
    $.ajax({
        type: "GET",
        url: url,
        success: function(data){
            var response = JSON.parse(data);
            console.log(response);
            $.each(response.data, function(){
                $('.existing-requirement').find('tbody').append("<tr>"+
                    "<td>"+this.title+"</td>"+
                    "<td>"+this.description+"</td>"+
                    "<td>"+this.quantity+"</td>"+
                    "<td><span class=\"badge badge-"+(this.active==1?'danger':'secondary')+"\">"+(this.active==1?'Active':'Disabled')+"</span></td>"+
                    "</tr>");
            });
        }
    });
});*/

$('#place-requirement-without-popup').submit(function(e){

    e.preventDefault();
    e.stopPropagation();
    var form_data = $(this).serialize();
    $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: form_data,
        success: function(data){
            var response = JSON.parse(data);
            swal("Good job!", "You have posted the requirement!", "success");
        },
        error: function(data){
            console.log(data);
        }
    });
    return false;
});


$('#update-password').submit(function(e){

    e.preventDefault();
    e.stopPropagation();
    var form_data = $(this).serialize();

    $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: form_data,
        success: function(data){

            if($.isEmptyObject(data.error)){
                toastr.success(data.message, '', {timeOut: 200,extendedTimeOut: 200, fadeOut: 200, closeButton: false,"positionClass": "toast-bottom-right"})
                setTimeout(function() {

                }, 5000);
                $('#change-password').modal('toggle');
            }else{
                printErrorMsg(data.error);

            }
        },
        error: function(json)
        {
            /*if(json.status === 422) {
                var errors = json.responseJSON;
                $.each(json.responseJSON, function (key, value) {
                    $('.'+key+'-error').html(value);
                });
            } else {
                // Error
                // Incorrect credentials
                // alert('Incorrect credentials. Please try again.')
            }*/
            if(json.status === 422) {
                var errors = json.responseJSON.errors;
                // printErrorMsg(errors);
                $(".password-error-msg").find("ul").html('');
                $(".password-error-msg").css('display','block');
                $.each(errors, function(key, value) {
                    $(".password-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        }
    });
    return false;
});

function printErrorMsg (msg) {

    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function(key, value) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}
$("#upfile1").click(function () {
    $("#file1").trigger('click');

});

$("#file1").change(function(){
    readURL(this);
    var form = document.getElementById('img_upload');
    $.ajax({
        url: $('#img_upload').attr('action'),
        type: "POST",
        data:  new FormData(form),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
            if (data.error_code === 1) {
                toastr.error(data.message, '', {
                    timeOut: 2000,
                    extendedTimeOut: 2000,
                    fadeOut: 2000,
                    closeButton: false,
                    "positionClass": "toast-bottom-right"
                });
            }
            else {
                toastr.success(data.message, '', {
                    timeOut: 2000,
                    extendedTimeOut: 2000,
                    fadeOut: 2000,
                    closeButton: false,
                    "positionClass": "toast-bottom-right"
                });
                $('#profile-model').modal('toggle');
            }
        },
        error: function(json){
            if(json.status === 422) {
                var errors = json.responseJSON.errors;
                $.each(errors, function(key, value) {
                    toastr.error(value, '', {
                        timeOut: 2000,
                        extendedTimeOut: 2000,
                        fadeOut: 2000,
                        closeButton: false,
                        "positionClass": "toast-bottom-right"
                    });
                });
            }
        }
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#upfile1').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function updateProfile()
{
    var name = $('#name').text();
    var phone = $('#phone').text();
    var url = $('#update_profile').val();

    var token = $('#token').val();
    $.ajax({
        method: "POST",
        data: {'name':name,'phone':phone, _token: token},
        url: url,
        success: function(data) {
            if($.isEmptyObject(data.error)) {
                toastr.success(data.message, '', {
                    timeOut: 2000,
                    extendedTimeOut: 2000,
                    fadeOut: 2000,
                    closeButton: false,
                    "positionClass": "toast-bottom-right"
                });
                $('#profile-model').modal('toggle');
            }else{
                printProfileErrorMsg(data.error);
            }
        },
        error: function(data){
            if($.isEmptyObject(data.error)) {
                toastr.success(data.responseJSON.message, '', {
                    timeOut: 2000,
                    extendedTimeOut: 2000,
                    fadeOut: 2000,
                    closeButton: false,
                    "positionClass": "toast-bottom-right"
                })

            }
        }
    });
}

function printProfileErrorMsg (msg) {

    $(".profile-error-msg").find("ul").html('');
    $(".profile-error-msg").css('display','block');
    $.each( msg, function(key, value) {
        $(".profile-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}

