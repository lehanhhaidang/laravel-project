


<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th><input class="input-checkbox checkboxItem" type="checkbox" name="" id="checkAll"></th>
                <th>Tên ngôn ngữ</th>
                <th>Canonical</th>
                <th> Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($languages)&&is_object($languages))
                @foreach ($languages as $language)
            <tr>
                <td>
                    <input 
                        class="input-checkbox checkBoxItem" 
                        type="checkbox" 
                        name="" 
                        id="checkOne" 
                        value="{{$language->id}}"
                    />
                </td>
                <td>{{$language->name}}</td>
                <td> {{$language->canonical}}</td>
                <td class="text-center js-switch-{{$language->id}} ">
                    <input 
                        type="checkbox" 
                        class="js-switch status" 
                        data-field ="publish" 
                        data-model="Language" 
                        value="{{$language->publish}}" {{ (($language->publish)==2) ? 'checked' : '' }} 
                        data-modelId = {{$language->id}} 
                    />
                </td>
                <td class="text-center">
                    <a href="{{route('language.edit',$language->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{route('language.delete',$language->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
             @endforeach
            @endif
        </tbody>
    </table>
    {{ $languages->links('pagination::bootstrap-5') }}

</div>
<style>
    .select2-container--default .select2-selection--single {
        border:none;
    }
</style>




