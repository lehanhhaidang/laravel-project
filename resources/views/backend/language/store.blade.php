@php
    $title = '';
    if ($config['method'] == 'create') {
        $title = $config['seo']['create']['title'];
    } elseif ($config['method'] == 'edit') {
        $title = $config['seo']['edit']['title'];
    }
@endphp

@include('backend.language.component.breadcrumb', ['title' => $title])

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
    $url = ($config['method']=='create') ? route('language.store') : route('language.update', $language->id);
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
                        Nhập thông tin ngôn ngữ
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
                                        Ngôn ngữ <span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    value="{{old('name', $language->name ?? '')}}"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Canonical<span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="text"
                                    name="canonical"
                                    value="{{old('canonical', $language->canonical ?? '')}}"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-lg">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Ảnh đại diện<span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="text"
                                    name="image"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    value="{{old('image', $language->image ?? '')}}"
                                    >
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">
                                        Ghi chú<span class="text-danger">(*)</span>
                                    </label>
                                    <input
                                    type="text"
                                    name="description"
                                    value="{{old('description', $language->description ?? '')}}"
                                    class="form-control"
                                    placeholder=""
                                    autocomplete="off"
                                    >
                                </div>
                            </div> --}}
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




