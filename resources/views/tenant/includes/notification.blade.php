
<li class="notification-nav dropdown dropdown-notification nav-item" >
    <a class="nav-link nav-link-label" href="#" data-toggle="dropdown" aria-expanded="false">{{--<i class="ficon ft-bell"></i>--}}<i class="fa fa-bell"></i><span class="badge badge-pill badge-danger badge-up badge-glow" id="unread_count">0</span></a>
    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right" style="max-height: 300px; overflow-y: auto">
        <li class="dropdown-menu-header">
            <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6>{{--<span class="notification-tag badge badge-danger float-right m-0">5 New</span>--}}
        </li>
        <li class="scrollable-container media-list w-100 ps" id="main">
    {{--        @if(isset($user_noti))
                @foreach($user_noti as $noti_value)
                    <a href="{{route('customer.list-bids', $noti_value->requirement_id)}}">
                        <div class="media">
                            <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                            <div class="media-body">
                                <h6 class="media-heading">{{$noti_value->subject}}</h6>
                                <p class="notification-text font-small-3 text-muted">{{$noti_value->message}}</p><small>

                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time></small>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif--}}

            {{--<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></li>
        <li class="dropdown-menu-footer">
            <a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a>
        </li>--}}
    </ul>
</li>
<script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>

<style>
/*.active{
    background: #343957;
}*/
</style>
<script>
    $(document).ready(function() {

        $.ajax({
            type: "GET",
            url: "{{route('get-notification')}}",

            success: function(data){
                var noti="";
                showactive="";
                j=0;
                for(i=0;i<data.length;i++){

                    if(data[i]['status'] == 'unread')
                    {
                    j++;
                        showactive="active";
                    }
                   if(data[i]['type'] == 'bid_placed'){
                    noti+='<div class ="'+showactive+'"><a  onclick="return makeRead('+data[i]['id']+')" href="{{url('customer/list-bids/')}}/'+data[i]['requirement_id']+'" ><div class="media"><div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div><div class="media-body"><h6 class="media-heading">'+data[i]['subject']+'</h6><p class="notification-text font-small-3 text-muted" style="word-wrap: break-word;" >'+data[i]['message']+'</p><small><time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">'+data[i]['created_at']+ '</time></small></div></div></a></div>'
                   }else{
                       noti+='<div class ="'+showactive+'"><a  onclick="return makeRead('+data[i]['id']+')" href="{{url('customer/list-notification')}}/" ><div class="media"><div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div><div class="media-body"><h6 class="media-heading">'+data[i]['subject']+'</h6><p class="notification-text font-small-3 text-muted">'+data[i]['message']+'</p><small><time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">'+data[i]['created_at']+ '</time></small></div></div></a></div>'
                   }
                }

                $('#main').html(noti);
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
