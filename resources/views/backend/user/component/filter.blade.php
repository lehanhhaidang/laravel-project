<div class="filer-warpper">
    <div class="perpage">
        <select name="" id="" class="form-control input-sm perpage filter">
            @for($i=20; $i <=100; $i+=20)
            <option value="{{$i}}">{{$i}} record</option>
            @endfor
        </select>
    </div>
    <div class="spacer"></div> <!-- Thêm khoảng trống để tạo khoảng cách lớn -->
    <div class="action">
        <select class="form-control" name="" id="">
            <option value="">Choose User group</option>
            <option value="">Administration</option>
            <option value="">Default User</option>
        </select>
        <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            </div>
        </div>
        <div class="input-group-append">
            <button class="btn btn-primary search-user" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
        <a href="{{route('user.create')}}" class="btn btn-danger"><i class="fa fa-plus"></i>Add</a>
    </div>
</div>
