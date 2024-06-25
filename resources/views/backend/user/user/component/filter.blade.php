<form action="{{ route('user.index') }}" method="get">
    <div class="filer-warpper">
        <div class="perpage">
            @php
                $perpage = request('perpage') ? : old('perpage');
            @endphp
            <select name="perpage" id="" class="form-control input-sm perpage filter">
                @for($i=20; $i <=100; $i+=20)
                <option {{ ($perpage == $i)  ? 'selected' : '' }} value="{{$i}}">{{$i}} record</option>
                @endfor
            </select>
        </div>
        <div class="spacer"></div> 
        <div class="action">
            @php
                $publish = request('publish') ? : old('publish');
            @endphp
            <select class="form-control mr-3" name="publish" id="">
                @foreach (config('apps.general.publish') as $key => $val)
                    <option {{ ($publish == $key) ? 'selected' : '' }} value="{{$key}}"> {{$val}}</option>
                @endforeach
            </select>

            <select class="form-control setupSelect2 mb-2" name="user_catalogue_id" id="">
                <option value="0">Chọn nhóm người dùng</option>
                <option value="1">Quản trị viên</option>
                <option value="2">CTV</option>
            </select>
            <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
                <div class="input-group">
                    <input
                        type="text"
                        name="keyword"
                        value="{{ request('keyword') ? : old('keyword') }}"
                        class="form-control ml-1"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2">
                </div>
            </div>
            <div class="input-group-append">
                <button class="btn btn-primary search-user" type="submit" name="search" value="search">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
            <a href="{{route('user.create')}}" class="btn btn-danger"><i class="fa fa-plus"></i>Add</a>
        </div>
    </div>

</form>


<style>
    .select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 28px;
    user-select: none;
    -webkit-user-select: none;
    margin-bottom: 10px;
    
}
</style>