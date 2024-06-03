@include('backend.user.component.breadcrumb', ['title'=>$config['seo']['index']['title']])
{{-- Cấu hình theo thứ tự từ index vào trong --}}
<div class="card shadow mb-4 mt20">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{$config['seo']['index']['title']}}</h6>
    </div>
    <div class="card-body">
        @include('backend.user.component.filter')

       @include('backend.user.component.table')
    </div>

</div>



