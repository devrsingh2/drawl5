<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
</a>
@php
    function isInArray($needle, $haystack)
    {
        foreach ($needle as $stack) {
            if (in_array($stack, $haystack)) {
                return true;
            }
        }
        return false;
    }

@endphp
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}/">{{ config('app.name') }}</a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded"
                     @if(isset(auth()->user()->profile_img))
                     src="{{ url('/') }}/public/img/userprofile/{{ auth()->user()->profile_img }}"
                     @else
                     src="{{ url('/') }}/public/img/user.png"
                     @endif
                     alt="User picture">
            </div>
            <div class="user-info">
                <span class="user-name">{{ auth()->user()->name }}</span>
                <span class="user-role">Customer</span>
                <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
            </div>
        </div>
        <!-- sidebar-header  -->
    {{--<div class="sidebar-search">
        <div>
            <div class="input-group">
                <input type="text" class="form-control search-menu" placeholder="Search...">
                <div class="input-group-append">
          <span class="input-group-text">
            <i class="fa fa-search" aria-hidden="true"></i>
          </span>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- sidebar-search  -->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('customer.dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="header-menu"><span>Resources</span></li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="far fa-gem"></i>
                        <span>Main</span>
                    </a>
                    <div class="sidebar-submenu">
                    <ul>
                        <li ><a href="{{route('customer.dashboard-profile')}}">Profile<span class="badge badge-pill badge-danger"></span></a></li>
                        <li ><a href="{{route('customer.setting')}}">Account Setting<span class="badge badge-pill badge-info"></span></a></li>

                    </ul>
                    </div>
                </li>

                <li class="header-menu">
                    <span>General</span>
                </li>
                @if(\App\Helpers\GeneralHelper::getCurrentTenant() === env('CLIENT1'))

                    <li class="@if(request()->segment(2) == 'purchase') active @endif">
                        <a href="{{ route('customer.purchase') }}">
                            <i class="fa fa-check"></i>
                            <span>Bids</span>
                        </a>
                    </li>

                @else

                    <li class="@if(request()->segment(2) == 'place-requirement') active @endif">
                        <a href="{{ route('place-requirement') }}">
                            <i class="fa fa-folder"></i>
                            <span>Post Requirement</span>
                        </a>
                    </li>
                    <li class="@if(request()->segment(2) == 'list-notification') active @endif">
                        <a href="{{ route('customer.list-notification') }}">
                            <i class="fa fa-folder"></i>
                            <span>Notification</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown @if(request()->segment(2) == 'open-requirement'
                || request()->segment(2) == 'inprogress-requirement'
                || request()->segment(2) == 'completed-requirement'
                ) active @endif">
                        <a href="#">
                            <i class="far fa-gem"></i>
                            <span>Requirements</span>
                            <span class="badge badge-pill badge-primary">
                                        {{ \App\Requirement::where('user_id', auth()->user()->id)->count() }}
                                    </span>
                        </a>
                        <div class="sidebar-submenu"
                             @if(request()->segment(2) == 'open-requirement'
                             || request()->segment(2) == 'inprogress-requirement'
                             || request()->segment(2) == 'completed-requirement'
                             ) style="display: block;" @endif
                        >
                            <ul>
                                <li class="@if(request()->segment(2) == 'open-requirement') active @endif">
                                    <a href="{{ route('open-requirement') }}">Open
                                        <span class="badge badge-pill badge-danger">
                                        {{ \App\Requirement::where('user_id', auth()->user()->id)->where(function ($q) {
                                        $q->orWhere('status', 'pending')
                                        ->orWhere('status', 'active');
                                    })->count() }}
                                    </span>
                                    </a>
                                </li>
                                <li class="@if(request()->segment(2) == 'inprogress-requirement') active @endif">
                                    <a href="{{ route('inprogress-requirement') }}">In Progress
                                        <span class="badge badge-pill badge-info">
                                        {{ \App\Requirement::where('user_id', auth()->user()->id)->where('status', 'inprogress')->count() }}
                                    </span>
                                    </a>
                                </li>
                                <li class="@if(request()->segment(2) == 'completed-requirement') active @endif">
                                    <a href="{{ route('completed-requirement') }}">Completed
                                        <span class="badge badge-pill badge-success">
                                        {{ \App\Requirement::where('user_id', auth()->user()->id)->where('status', 'completed')->count() }}
                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="@if(request()->segment(2) == 'purchase') active @endif">
                        <a href="{{ route('customer.purchase') }}">
                            <i class="fa fa-check"></i>
                            <span>Purchase</span>
                        </a>
                    </li>
                    <li class="@if(request()->segment(2) == 'payment-history') active @endif">
                        <a href="{{ route('customer.payment-history') }}">
                            <i class="fa fa-check"></i>
                            <span>Payment History</span>
                        </a>
                    </li>

                @endif
                {{--   <li class="@if(request()->segment(2) == 'customer-notification') active @endif">
                       <a href="{{ route('get-notification') }}">
                           <i class="fa fa-check"></i>
                           <span>Notification</span>
                       </a>
                   </li>--}}

            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
        {{--<a href="#">
            <i class="fa fa-bell"></i>
            <span class="badge badge-pill badge-warning notification">3</span>
        </a>
        <a href="#">
            <i class="fa fa-envelope"></i>
            <span class="badge badge-pill badge-success notification">7</span>
        </a>
        <a href="#">
            <i class="fa fa-cog"></i>
            <span class="badge-sonar"></span>
        </a>--}}
        {{--<a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>--}}
    </div>
</nav>
