@include('backend.user.catalogue.component.breadcrumb',['title'=>$config['seo']['delete']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('user.catalogue.destroy', $userCatalogue->id)}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fade-in-right">
        <div class="row px-5">
            <div class="col-lg-5 mt-3" >
                <div class="panel-head">
                    <div class="panel-title font-weight-bold text-dark h5 ">
                        Bạn đang muốn xóa nhóm thành viên: <strong>{{$userCatalogue->name}}</strong>
                    </div>
                    <div class="panel-description text-dark">
                        <Strong>Lưu ý: </Strong> Thông tin sẽ không thể khôi phục sau khi xóa
                    </div>
                </div>
            </div>
            <div class="col-lg-7 bg-white shadow-lg p-3 mb-5 bg-body rounded mt-2">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb-3 mt-3">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Tên nhóm thành viên <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="text"
                                    name="email"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    value="{{old('email', $userCatalogue->name ?? '')}}"
                                    readonly
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Mô tả <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="text"
                                    name="descrtiption"
                                    value="{{old('description', $userCatalogue->description ?? '')}}"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    readonly
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb-3 mt-0">
            <button class="btn btn-danger px-5" type="submit" name="send" value="send">Xóa nhóm người dùng này</button>
        </div>
    </div>
</form>

<style>
    .select2-container--default .select2-selection--single {
        border:none;
    }
</style>




