<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo"><a href="{{ route('user.home') }}"><span>Reverse-Auction</span></a></div>
           
            <ul>
                <li class="label">Resources</li>
                <li @if(request()->segment(2) == 'dashboard' || request()->segment(2) == 'profile' || request()->segment(2) == 'setting') class="active open" @endif>
                    <a class="sidebar-sub-toggle"><i class="ti-home"></i> Main <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li @if(request()->segment(2) === 'dashboard') class="active" @endif >
                            <a href="{{ route('user.home') }}">Dashboard</a>
                        </li>

                        <li @if(request()->segment(2) === 'profile') class="active" @endif >
                            <a href="{{ route('user.profile') }}">Profile</a>
                        </li>
                        <li @if(request()->segment(2) === 'setting') class="active" @endif >
                            <a href="{{ route('user.setting') }}">Settings</a>
                        </li>

                    </ul>
                </li>
                <li class="label">Resources</li>
                <li @if(request()->segment(2) == 'notification') class="active" @endif ><a href="{{ route('user.notification') }}"><i class="ti-file"></i> Notifications </a></li>
                <li @if(request()->segment(2) == 'active-bid-requirements'
                || request()->segment(2) == 'inprogress-requirements'
                || request()->segment(2) == 'completed-requirement'
                ) class="active open" @endif >
                    <a class="sidebar-sub-toggle"><i class="ti-user"></i>  Requirement  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li @if(request()->segment(2) == 'active-bid-requirements') class="active" @endif >
                            <a href="{{ route('user.active-bid-requirement') }}">Active Bid Requirement</a>
                        </li>
                        <li @if(request()->segment(2) == 'inprogress-requirements') class="active" @endif >
                            <a href="{{ route('user.inprogress-requirement') }}">Inprogress Requirement</a>
                        </li>
                        <li @if(request()->segment(2) == 'completed-requirements') class="active" @endif >
                            <a href="{{ route('user.completed-requirement') }}">Completed Requirement</a>
                        </li>
                    </ul>
                </li>

               <li><a><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>