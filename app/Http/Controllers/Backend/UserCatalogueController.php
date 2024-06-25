<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;
use App\Http\Requests\StoreUserCatalogueRequest;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;

class UserCatalogueController extends Controller
{
    protected $userCatalogueService;
    protected $userCatalogueRepository;
    public function __construct
    (
        UserCatalogueService $userCatalogueService,
        UserCatalogueRepository $userCatalogueRepository

    )
    {
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;

    }


    public function index(Request $request){
        $userCatalogues = $this->userCatalogueService->paginate($request); //Tách phương thức ra, sử dụng UserCatalogueService và UserCatalogueServiceInterface
        // $users = User::paginate(15); //Phương thức cũ, có thể sử dụng
        $config = [
                'js' =>[
                    'backend/js/plugins/switchery/switchery.js',
                    'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js',



                ],
                'css' => [
                    'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css',

                    'backend/css/plugins/switchery/switchery.css'
                ]
            ];


        $config['seo'] = config('apps.usercatalogue');
        $template = 'backend.user.catalogue.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'userCatalogues'
        ));
    }

    public function create()
    {
       

        $config['seo'] = config('apps.usercatalogue');
        $config['method'] = 'create';
        $template = 'backend.user.catalogue.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
        ));
    }

    public function store(StoreUserCatalogueRequest $request)
    {
        if($this->userCatalogueService->create($request)){
            flash()->success('Thêm mới thành công');
            return redirect()->route('user.catalogue.index');
        }
        flash()->error('Thêm mới thất bại');
        return redirect()->route('user.catalogue.index');

    }

    public function edit($id){
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $config['seo'] = config('apps.usercatalogue');
        $config['method'] = 'edit';
        $template = 'backend.user.catalogue.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'userCatalogue'
        ));
    }

    public function update($id, StoreUserCatalogueRequest $request)
    {
        if($this->userCatalogueService->update($id, $request)){
            flash()->success('Cập nhật thành công');
            return redirect()->route('user.catalogue.index');
        }
        flash()->success('Cập nhật thất bại. Vui lòng thử lại.');
        return redirect()->route('user.catalogue.index');
    }

    public function delete($id){
        $config['seo'] = config('apps.usercatalogue');
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $template = 'backend.user.catalogue.delete';
        return view('backend.dashboard.layout',compact(
            'template',
            'userCatalogue',
            'config'
        ));
    }

    public function destroy($id){
        if($this->userCatalogueService->destroy($id)){
            flash()->success('Xóa thành công');
            return redirect()->route('user.catalogue.index');
        }
        flash()->success('Xóa thất bại. Vui lòng thử lại.');
        return redirect()->route('user.catalogue.index');
    }
}
