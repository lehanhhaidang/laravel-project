


<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th><input class="input-checkbox checkboxItem" type="checkbox" name="" id="checkAll"></th>
                <th>Tên</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Nhóm thành viên</th>
                <th>Tình trạng</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($users)&&is_object($users))
                @foreach ($users as $user)
            <tr>
                <td>
                    <input 
                        class="input-checkbox checkBoxItem" 
                        type="checkbox" 
                        name="" 
                        id="checkOne" 
                        value="{{$user->id}}"
                    />
                </td>
                <td>{{$user->name}}</td>
                <td style="width: 125px"><span class="image"><img src="{{$user->image}}" style="width:100px; height:100px"></span></td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td class="text-center">{{$user->user_catalogues->name}}</td>
                <td class="text-center js-switch-{{$user->id}} ">
                    <input 
                        type="checkbox" 
                        class="js-switch status" 
                        data-field ="publish" 
                        data-model="User" 
                        value="{{$user->publish}}" {{ (($user->publish)==2) ? 'checked' : '' }} 
                        data-modelId = {{$user->id}} 
                    />
                </td>
                <td class="text-center">
                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{route('user.delete',$user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
             @endforeach
            @endif
        </tbody>
    </table>
    {{ $users->links('pagination::bootstrap-5') }}

</div>
<style>
    .select2-container--default .select2-selection--single {
        border:none;
    }
</style>




