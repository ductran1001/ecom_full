<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ $title_breadcrumb }}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('get.admin.dashboard') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route($sub1['route']) }}">{{ $sub1['title'] }}</a>
            </li>
            <li class="active">
                <strong>{{ $sub2['title'] }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
