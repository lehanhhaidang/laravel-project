<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{
    protected $provinceRepository;
    protected $userService;
    protected $userRepository;
    public function __construct
    (
        UserService $userService,
        UserRepository $userRepository,
        ProvinceRepository $provinceRepository


    )
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->provinceRepository = $provinceRepository;

    }


    public function index(Request $request){
        $users = $this->userService->paginate($request); //Tách phương thức ra, sử dụng UserService và UserServiceInterface
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


        $config['seo'] = config('apps.user');
        $template = 'backend.user.user.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'users'
        ));
    }

    public function create()
    {
        $provinces = $this->provinceRepository->all();
        $config = $this->configData();

        $config['seo'] = config('apps.user');
        $config['method'] = 'create';
        $template = 'backend.user.user.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces'
        ));
    }

    public function store(StoreUserRequest $request)
    {
        if($this->userService->create($request)){
            flash()->success('Thêm mới thành công');
            return redirect()->route('user.index');
        }
        flash()->error('Thêm mới thất bại');
        return redirect()->route('user.index');

    }

    public function edit($id){
        $user = $this->userRepository->findById($id);
        $provinces = $this->provinceRepository->all();
        $config = $this->configData();

        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';
        $template = 'backend.user.user.store';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces',
            'user'
        ));
    }

    public function update($id, UpdateUserRequest $request)
    {
        if($this->userService->update($id, $request)){
            flash()->success('Cập nhật thành công');
            return redirect()->route('user.index');
        }
        flash()->success('Cập nhật thất bại. Vui lòng thử lại.');
        return redirect()->route('user.index');
    }

    public function delete($id){
        $config['seo'] = config('apps.user');
        $user = $this->userRepository->findById($id);
        $template = 'backend.user.user.delete';
        return view('backend.dashboard.layout',compact(
            'template',
            'user',
            'config'
        ));
    }

    public function destroy($id){
        if($this->userService->destroy($id)){
            flash()->success('Xóa thành công');
            return redirect()->route('user.index');
        }
        flash()->success('Xóa thất bại. Vui lòng thử lại.');
        return redirect()->route('user.index');
    }


    private function configData(){
        return [
            'js' =>[
                'backend/js/plugins/switchery/switchery.js',            
                'backend/plugin/ckfinder_2/ckfinder.js',
                'backend/library/finder.js',
                'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js',
                'backend/library/location.js',



            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css',
            ]
        ];
    }
}
