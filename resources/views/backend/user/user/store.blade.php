@php
    $title = '';
    if ($config['method'] == 'create') {
        $title = $config['seo']['create']['title'];
    } elseif ($config['method'] == 'edit') {
        $title = $config['seo']['edit']['title'];
    }
@endphp

@include('backend.user.user.component.breadcrumb', ['title' => $title])

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $url = ($config['method']=='create') ? route('user.store') : route('user.update', $user->id);
@endphp
<form action="{{$url}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fade-in-right">
        <div class="row px-5">
            <div class="col-lg-5 mt-3" >
                <div class="panel-head">
                    <div class="panel-title font-weight-bold text-dark h5 ">
                        Thông tin chung
                    </div>
                    <div class="panel-description text-dark">
                        Nhập thông tin người dùng
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
                                        Email <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="text"
                                    name="email"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    value="{{old('email', $user->email ?? '')}}"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Họ tên <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="text"
                                    name="name"
                                    value="{{old('name', $user->name ?? '')}}"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        @php
                            $userCatalogue = [
                                '[Chọn nhóm thành viên]',
                                'Quản trị viên',
                                'CTV'
                            ]
                        @endphp
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Nhóm thành viên <span class="text-danger">(*)</span>
                                    </label>
                                    <select name="user_catalogue_id" class="form-control setupSelect2">
                                        @foreach ($userCatalogue as $key => $item)
                                            <option {{ $key == old('user_catalogue_id',
                                            (isset($user->user_catalogue_id)) ?
                                             $user->user_catalogue_id : '') ? 'selected' : '' }}
                                            value ="{{$key}}">
                                            {{$item}}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Ngày sinh<span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="date"
                                    name="birthday"
                                    value="{{old('birthday', (isset($user->birthday)) ? date
                                    ('Y-m-d', strtotime($user->birthday)) : '' )}}"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        @if($config['method'] =='create')
                        <div class="row mb-3 mt-3">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Mật khẩu <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Nhập lại mật khẩu <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="password"
                                    name="repassword"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mb-3 mt-3">
                            <div class="col-lg-12 w-max">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Tải ảnh đại diện lên <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="text"
                                    name="image"
                                    class="form-control upload-image"
                                    value="{{old('image', $user->image ?? '')  }}"
                                    placeholder=""
                                    data-upload="Images"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-5">
            <div class="col-lg-5 mt-3" >
                <div class="panel-head">
                    <div class="panel-title font-weight-bold text-dark h5 ">
                        Phương thức liên lạc
                    </div>
                    <div class="panel-description text-dark">
                       Điền vào phương thức liên lạc
                        <br>

                    </div>
                </div>
            </div>
            <div class="col-lg-7 bg-white shadow-lg p-3 mb-5 bg-body rounded mt-2">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb-3 mt-3">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="form-control" class="control-label text-right">
                                        Thành phố
                                    </label>
                                    <select class="form-control setupSelect2 province location" name="province_id" data-target="districts">
                                        <option value="0">[Chọn thành phố]</option>
                                        @if (isset($provinces))
                                            @foreach ($provinces as $province)
                                                <option @if(old('province_id')== $province->code) selected @endif value="{{$province->code}}">{{$province->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="" class="control-label text-right">
                                        Quận/Huyện
                                    </label>
                                    <select class="form-control districts location setupSelect2" name="district_id" data-target="wards">
                                        <option value="0">[Chọn quận/huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="" class="control-label text-right">
                                        Phường/Xã
                                    </label>
                                    <select class="form-control setupSelect2 wards" name="ward_id">
                                        <option value="0">[Chọn phường/xã]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="" class="control-label text-right">
                                        Địa chỉ
                                    </label>
                                    <input type="text" name="address" value="{{old('address', $user->address ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="" class="control-label text-right">
                                        Số điện thoại
                                    </label>
                                    <input type="text" name="phone" value="{{old('phone', $user->phone ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="" class="control-label text-right">
                                        Ghi chú
                                    </label>
                                    <input type="text" name="description" value="{{old('description', $user->description ?? '')}}" class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center mb-3 mt-0">
            <button class="btn btn-primary px-5" type="submit" name="send" value="send">Lưu</button>
        </div>
    </div>
</form>

<style>
    .select2-container--default .select2-selection--single {
        border:none;
    }
</style>


<script>
    var province_id = '{{  isset($user->province_id) ? $user->province_id : old('province_id') }}'
    var district_id = '{{ isset($user->district_id) ? $user->district_id : old('district_id' )}}'
    var ward_id = '{{ isset($user->ward_id) ? $user->ward_id : old('ward_id') }}'
</script>


