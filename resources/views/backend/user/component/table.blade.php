


<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th><input class="input-checkbox checkboxItem" type="checkbox" name="" id="checkAll"></th>
                <th>Information</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Address</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($users)&&is_object($users))
                @foreach ($users as $user)
            <tr>
                <td><input class="input-checkbox checkboxItem" type="checkbox" name="" id="checkOne"></td>
                <td>{{$user->fullname}}</td>
                <td><span class="image"><img src="{{$user->image}}" alt=""></span></td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td><input type="checkbox" class="js-switch" value="{{$user->publish}}" {{ (($user->publish)==1) ? 'checked' : '' }} /></td>
                <td>
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



