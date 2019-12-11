<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}"><i class="icon_house_alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $pagetitle }}</li>
                            {{--{{ $page_sub_title }}--}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->