<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo"><a href="{{ route('home') }}"><span>Reverse-Auction</span></a></div>

            <ul>
                <li class="label">Resources</li>
                <li @if(request()->segment(2) == 'dashboard' || request()->segment(2) == 'profile' || request()->segment(2) == 'setting') class="active open" @endif>
                    <a class="sidebar-sub-toggle"><i class="ti-home"></i> Main <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li @if(request()->segment(2) === 'dashboard') class="active" @endif >
                            <a href="{{ route('user.dashboard') }}">Dashboard</a>
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
                <li @if(request()->segment(2) == 'ctc') class="active" @endif >
                    <a href="{{ route('user.ctc') }}"><i class="ti-file"></i> Cycle Time Calculation </a>
                </li>
                <li @if(request()->segment(2) == 'rfq') class="active" @endif >
                    <a href="{{ route('user.rfq') }}"><i class="ti-file"></i> RFQ </a>
                </li>
                <li @if(request()->segment(2) == 'machine-comparison') class="active" @endif >
                    <a href="{{ route('user.machine-comparison') }}"><i class="ti-file"></i> Machine Comparison </a>
                </li>

                <li><a><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>