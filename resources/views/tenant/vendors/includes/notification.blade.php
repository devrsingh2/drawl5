<li class="header-icon dib"><i class="ti-bell"></i><span class="badge badge-pill badge-danger badge-up badge-glow" id="unread_count"></span>
    <div class="drop-down">
        <div class="dropdown-content-heading">
            <span class="text-left">Recent Notifications</span>
        </div>
        <div class="dropdown-content-body">
            <ul id="main" style="max-height: 300px; overflow-y: auto">

                <li class="text-center">
                    <a href="{{route('vendor.notification')}}" class="more-link">See All</a>
                </li>
            </ul>
        </div>
    </div>
</li>
<script>
    $(document).ready(function() {

        $.ajax({
            type: "GET",
            url: "{{route('vendor.get-notification')}}",

            success: function(data){

                var noti="";

                j=0;
                for(i=0;i<data.length;i++){

                    if(data[i]['status'] == 'unread')
                    {
                        j++;

                    }
                    /*noti+='<div><li ><a onclick="return makeRead('+data[i]['id']+')" href="{{--{{url('vendors/vendors/')}}--}}/'+data[i]['requirement_id']+'/place-bid" ><div class="notification-content"><small class="notification-timestamp pull-right">'+data[i]['created_at']+'</small><div class="notification-heading">'+data[i]['subject']+'</div><div class="notification-text">'+data[i]['message']+'</div></div></a></li></div>'*/
                    noti+='<div><li ><a onclick="return makeRead('+data[i]['id']+')" href="{{url('vendors/notification')}}" ><div class="notification-content"><small class="notification-timestamp pull-right">'+data[i]['created_at']+'</small><div class="notification-heading">'+data[i]['subject']+'</div><div class="notification-text">'+data[i]['message']+'</div></div></a></li></div>'
                }

                $('#main').prepend(noti);
                //alert(data[0]['message']);

                $('#unread_count').text(j);
            }
        });
        return false;
    });

    function makeRead(id){
        $.ajax({
            method: "POST",
            url: "{{route('notification.change-status')}}",
            data:{
                id:id,
                _token: '{!! csrf_token() !!}',
            },
            success: function(data){

            }
        });
    }
</script>
