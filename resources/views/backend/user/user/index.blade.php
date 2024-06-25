@include('backend.user.user.component.breadcrumb', ['title'=>$config['seo']['index']['title']])
{{-- Cấu hình theo thứ tự từ index vào trong --}}
<div class="card shadow mb-4 mt20">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">{{$config['seo']['index']['title']}}</h6>
        @include('backend.dashboard.component.toolbox', ['model' => 'User'])
    </div>
    <div class="card-body">
        @include('backend.user.user.component.filter')
        @include('backend.user.user.component.table')
    </div>
</div>




