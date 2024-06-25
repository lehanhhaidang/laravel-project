


<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th><input class="input-checkbox checkboxItem" type="checkbox" name="" id="checkAll"></th>
                <th>Tên nhóm thành viên</th>
                <th> Số thành viên</th>
                <th>Mo ta</th>
                <th>Tình trạng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($userCatalogues)&&is_object($userCatalogues))
                @foreach ($userCatalogues as $userCatalogue)
            <tr>
                <td>
                    <input 
                        class="input-checkbox checkBoxItem" 
                        type="checkbox" 
                        name="" 
                        id="checkOne" 
                        value="{{$userCatalogue->id}}"
                    />
                </td>
                <td>{{$userCatalogue->name}}</td>
                <td> {{$userCatalogue->users_count}} nguoi</td>
                <td>{{$userCatalogue->description}}</td>
                <td class="text-center js-switch-{{$userCatalogue->id}} ">
                    <input 
                        type="checkbox" 
                        class="js-switch status" 
                        data-field ="publish" 
                        data-model="UserCatalogue" 
                        value="{{$userCatalogue->publish}}" {{ (($userCatalogue->publish)==2) ? 'checked' : '' }} 
                        data-modelId = {{$userCatalogue->id}} 
                    />
                </td>
                <td class="text-center">
                    <a href="{{route('user.catalogue.edit',$userCatalogue->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{route('user.catalogue.delete',$userCatalogue->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
             @endforeach
            @endif
        </tbody>
    </table>
    {{ $userCatalogues->links('pagination::bootstrap-5') }}

</div>
<style>
    .select2-container--default .select2-selection--single {
        border:none;
    }
</style>




