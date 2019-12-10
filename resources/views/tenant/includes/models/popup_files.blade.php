<style>
    .modal-header .close {
        padding-left: -22px;
        padding: 1rem 1rem;
        margin: -1rem -1rem -1rem auto;
        width: 13%;
    }
    #upfile1{
        cursor:pointer;
        border: 1px solid black;
    }
    .image-upload{
        text-align: center;
    }
    .profile-img{
        border-radius: 50%;
        height: 150px;
        width: 150px;
        box-shadow: 0px 0px 21px #31a2b8;
    }
    .profile-modal{
        width: 400px;
        margin: 10%;
    }
    .social-icons{
        margin:10px;
    }
    .close-button{
        position: absolute;
        right: 13px;
        z-index:1;
    }
</style>
<input type="hidden" id="update_profile" value="{{route('update-profile-text')}}" />
<input type="hidden" id="token" value="{!! csrf_token() !!}" />
<!-- Modal -->
<div class="modal fade" id="change-password" role="dialog">

    <div class="modal-dialog">
        <div class="modal-content">
            <form id="update-password" action="{{ route('customer.update-password') }}" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="alert alert-danger password-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password"/>
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" >
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" />
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="existing-requirement" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Existing Requirements</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="alert alert-danger password-error-msg" style="display:none">
                <ul></ul>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <div class="container">

                    <table class="existing-requirement table table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<input type="hidden" name="getprofileurl" id="getprofileurl" value='{{url("customer/get-profile")}}'>

<!-- profile modal -->
<!-- Modal -->
<div class="modal fade" id="profile-model" role="dialog" style='z-index:1041;'>
    <div class="modal-dialog">
        <div class="modal-content profile-modal">
            <div class="alert alert-danger profile-error-msg" style="display:none">
                <ul></ul>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="close-button">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!------ Include the above in your HEAD tag ---------->

                <!-- Add icon library -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <div class="row">
                    <div class="col-md-12 col-xs-12 justify-content-center">
                        <div class="image-upload" >
                            <form id="img_upload" action="{{route('customer.upload-profile-img')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if(isset(auth()->user()->profile_img))
                                    <img src="{!!asset('/public/img/userprofile/'.auth()->user()->profile_img)!!}"  style=" " id="upfile1" class="profile-img">
                                @else
                                    <img src="{{ url('/') }}/public/img/user.png" style=" " id="upfile1" class="profile-img" >
                                @endif
                                <input id="file1" type="file" name="attachment" style="display: none;" />
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <h1 id="name" contenteditable="true" class="text-center"></h1>
                        <p class="title text-center" id="phone" contenteditable="true"></p>
                        <p id="email" class="text-center"></p>
                        <div class="text-center social-icons">
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </div>
                        <button class="btn-info" onclick="return updateProfile()">Update</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

