<style>
    .modal-header .close {
        padding-left: -22px;
        padding: 1rem 1rem;
        margin: -1rem -1rem -1rem auto;
        width: 13%;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="place-requirement" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frm_post_requirement" action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" id="product_id">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Post Requirement</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    @csrf
                    <div id="product-title" class="form-group" style="display: none;">
                        <label for="title">Product Title: </label>
                        <span id="product-name"></span>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter requirement title"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter description of requirement"></textarea>
                    </div>
                    <div id="div-category" class="form-group" style="display: none;">
                        <label for="category">Category</label>
                        <select class="custom-select" id="category" name="category">
                            <option value="">Select Category</option>
                            @if(Auth::check() && Auth::user()->role==4)
                                @isset($categories)
                                    @foreach($categories as $category)
                                        <option value='{{$category->id}}'>{{$category->name}}</option>
                                    @endforeach
                                @endif
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" min="1" value="1" name="quantity" id="quantity" placeholder="Enter quantity"/>
                    </div>
                    <div class="form-group">
                        <label for="attachment">Attachment</label>
                        <input type="file" class="form-control" name="attachment" id="attachment" />
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn_requirement_submit">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>
<input type="hidden" name="getprofileurl" id="getprofileurl" value='{{url("customer/get-profile")}}'>
@section('footer')
    <script>
        $('#portfolio').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            showCloseBtn: true,
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1]
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    var requirement_id = item.el.attr('data-source');
//                return item.el.attr('title') + ' &middot; <button class="btn btn-sm btn-primary image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">Place This Requirement</button>';
                    return '<div class="product-class">' +
                        '<button class="btn btn-sm btn-primary image-source-link" onclick="return fnToOpenPlaceRequirement('+requirement_id+');" >Place This Requirement</button>' +
                        '</div>';
                }
            }
        });
        function fnToOpenPlaceRequirement(id) {
            window.location.href='{{ url('/') }}/customer/place-requirement/'+id;
            /*$.magnificPopup.close();
            $('#product_id').val(id);
            $.ajax({
                url: "{{ route('get-product-data') }}",
                method:'POST',
                dataType: 'json',
                data: {
                    _token: '{!! csrf_token() !!}',
                    product_id: id
                },
                success: function(res) {
                    $('#product-title').css({ 'display': 'block'})
                    $('#product-name').text(res.results.name)
                }
            });
            $('#div-category').css({
                'display': 'none'
            });
            $('#place-requirement').modal({
                show: true
            });*/
        }
        function placeNewRequirement() {
            $('#product_id').val('');
            $('#div-category').css({
                'display': 'block'
            });
            $('#product-title').css({ 'display': 'none'})
            $('#place-requirement').modal({
                show: true
            });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#btn_requirement_submit").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var product_id = $("input[name='product_id']").val();
                var title = $("input[name='title']").val();
                var description = $("textarea[name='description']").val();
                var category = $("select[name='category']").val();
                var quantity = $("input[name='quantity']").val();
//                var attachment = $("input[name='attachment']").val();
                var formData = new FormData($('#frm_post_requirement')[0]);
                $.ajax({
                    url: "{{ route('post-requirement') }}",
                    type:'POST',
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    /*data: {
                        _token: _token,
                        product_id: product_id,
                        title: title,
                        description: description,
                        category: category,
                        quantity: quantity,
                        attachment: new FormData($('#attachment').files)
                    },*/
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
//                            alert(data.message);
                            $('.print-error-msg').hide();
                            $('#frm_post_requirement').find("input[type=text], input[type=file], textarea, select").val("");
                            toastr.success(data.message, '', {timeOut: 300000,extendedTimeOut: 1000, fadeOut: 1000, closeButton: false,"positionClass": "toast-top-center"})
                            setTimeout(function() {
                                $('#place-requirement').modal('hide');
                            }, 2000);
                            return;
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
                            printErrorMsg(errors);
                        }
                    }
                });
            });
        });

        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    </script>
@endsection