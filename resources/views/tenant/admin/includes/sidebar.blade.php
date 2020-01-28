<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo"><a href="{{ route('admin.home') }}"><span>Reverse-Auction</span></a></div>
            <ul>
                <li @if(request()->segment(2) == '') class="active" @endif><a href="{{ route('admin.home') }}"><i class="ti-dashboard"></i> Dashboard</a></li>
                @if(request()->user()->role === 1)
                    <li class="label">Resources</li>
                    <li @if(request()->segment(2) == 'settings' || request()->segment(2) == 'roles' || request()->segment(2) == 'categories' || request()->segment(2) == 'cms')class="active open" @endif >
                        <a class="sidebar-sub-toggle"><i class="ti-home"></i> Main <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            {{--<li @if(request()->segment(2) == '')class="active" @endif><a href="{{ route('admin.home') }}">Dashboard</a></li>--}}
                            <li @if(request()->segment(2) === 'settings')class="active" @endif><a href="{{ route('settings') }}">Settings</a></li>
                            <li @if(request()->segment(2) === 'roles')class="active" @endif><a href="{{ route('roles.list') }}">Roles</a></li>
                            <li @if(request()->segment(2) === 'categories')class="active" @endif><a href="{{ route('categories.list') }}">Categories</a></li>

                            <li @if(request()->segment(2) === 'cms')class="active" @endif><a href="{{ route('cms.list') }}">CMS</a></li>
                        </ul>
                    </li>

                    <li class="label">Users</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-user"></i>  Site Admin  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{ route('admin.list') }}">Manage Admin</a></li>
                        </ul>
                    </li>
                    <li @if(request()->segment(2) == 'vendors' || request()->segment(2) == 'customers')class="active open" @endif>
                        <a class="sidebar-sub-toggle"><i class="ti-user"></i>  Site Users  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li @if(request()->segment(2) == 'vendors') class="active" @endif ><a href="{{ route('vendors.list') }}">Vendors</a></li>
                            <li @if(request()->segment(2) == 'customers') class="active" @endif ><a href="{{ route('customers.list') }}">Customers</a></li>
                        </ul>
                    </li>
                    <li class="label">Other Resources</li>
                    {{--<li @if(request()->segment(2) == 'products') class="active" @endif ><a href="{{ route('products.list') }}"><i class="ti-file"></i> Products </a></li>

                    <li @if(request()->segment(2) == 'requirements' || request()->segment(2) == 'customers')class="active open" @endif>
                        <a class="sidebar-sub-toggle"><i class="ti-view-grid"></i> Requirements <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li @if(request()->segment(2) == 'requirements') class="active" @endif ><a href="{{ route('requirements.list') }}">Requirements</a></li>
                        </ul>
                    </li>--}}

                    <li @if(request()->segment(2) == 'faq') class="active" @endif ><a href="{{ route('faq.list') }}"><i class="ti-file"></i> FAQ </a></li>
                    <li @if(request()->segment(2) == 'blog') class="active" @endif ><a href="{{ route('blog.list') }}"><i class="ti-file"></i> Blog </a></li>
                    <li @if(request()->segment(2) == 'banner') class="active" @endif ><a href="{{ route('banner.list') }}"><i class="ti-file"></i> Banner </a></li>
                    <li @if(request()->segment(2) == 'testimonial') class="active" @endif ><a href="{{ route('testimonial.list') }}"><i class="ti-file"></i> Testimonial </a></li>
                    <li @if(request()->segment(2) == 'newsletter') class="active" @endif ><a href="{{ route('newsletter.list') }}"><i class="ti-file"></i> Newsletter </a></li>

                @else
                    @php
                        $arr_user_permission = [];
                        /*$all_permission = request()->user()->userRole->hasPermission;
                        foreach ($all_permission as $key => $value) {
                            $arr_user_permission[] = $all_permission{$key}->getPermission->module;
                        }*/
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

                    @if(isInArray(['settings', 'roles', 'categories', 'cms'], $arr_user_permission) === true)
                        <li class="label">Resources</li>
                        <li @if(request()->segment(2) == 'settings' || request()->segment(2) == 'roles' || request()->segment(2) == 'categories' || request()->segment(2) == 'cms')class="active open" @endif >
                            <a class="sidebar-sub-toggle"><i class="ti-home"></i> Main <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                @if(in_array('settings', $arr_user_permission))
                                    <li @if(request()->segment(2) === 'settings')class="active" @endif><a href="{{ route('settings') }}">Settings</a></li>
                                @endif
                                @if(in_array('roles', $arr_user_permission))
                                    <li @if(request()->segment(2) === 'roles')class="active" @endif><a href="{{ route('roles.list') }}">Roles</a></li>
                                @endif
                                @if(in_array('categories', $arr_user_permission))
                                    <li @if(request()->segment(2) === 'categories')class="active" @endif><a href="{{ route('categories.list') }}">Categories</a></li>
                                @endif
                                @if(in_array('cms', $arr_user_permission))
                                    <li @if(request()->segment(2) === 'cms')class="active" @endif><a href="{{ route('cms.list') }}">CMS</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(isInArray(['users', 'vendors', 'customers'], $arr_user_permission) === true)
                        <li class="label">Users</li>
                        @if(in_array('users', $arr_user_permission))
                            <li><a class="sidebar-sub-toggle"><i class="ti-user"></i>  Site Admin  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                                <ul>
                                    <li><a href="{{ route('admin.list') }}">Manage Admin</a></li>
                                </ul>
                            </li>
                        @endif
                        @if(isInArray(['vendors', 'customers'], $arr_user_permission) === true)
                            <li @if(request()->segment(2) == 'vendors' || request()->segment(2) == 'customers')class="active open" @endif>
                                <a class="sidebar-sub-toggle"><i class="ti-user"></i>  Site Users  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                                <ul>
                                    @if(in_array('vendors', $arr_user_permission))
                                        <li @if(request()->segment(2) == 'vendors') class="active" @endif ><a href="{{ route('vendors.list') }}">Vendors</a></li>
                                    @endif
                                    @if(in_array('customers', $arr_user_permission))
                                        <li @if(request()->segment(2) == 'customers') class="active" @endif ><a href="{{ route('customers.list') }}">Customers</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    @endif
                    @if(isInArray(['products', 'requirements'], $arr_user_permission) === true)
                        <li class="label">Other Resources</li>
                        @if(in_array('products', $arr_user_permission))
                            <li @if(request()->segment(2) == 'products') class="active" @endif ><a href="{{ route('products.list') }}"><i class="ti-file"></i> Products </a></li>
                        @endif
                        @if(in_array('requirements', $arr_user_permission))
                            <li @if(request()->segment(2) == 'requirements' || request()->segment(2) == 'customers')class="active open" @endif>
                                <a class="sidebar-sub-toggle"><i class="ti-view-grid"></i> Requirements <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                                <ul>
                                    <li @if(request()->segment(2) == 'requirements') class="active" @endif ><a href="{{ route('requirements.list') }}">Requirements</a></li>
                                </ul>
                            </li>
                        @endif
                    @endif

                @endif
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><i class="ti-close"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>