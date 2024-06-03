<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }


    public function index(){
        $users = $this->userService->paginate(); //Tách phương thức ra, sử dụng UserService và UserServiceInterface
        // $users = User::paginate(15); //Phương thức cũ, có thể sử dụng
        $config = $this->config();
        $config['seo'] = config('apps.user');
        $template = 'backend.user.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'users'
        ));
    }

    public function create()
    {
        $config['seo'] = config('apps.user');
        $template = 'backend.user.component.create';
        return view('backend.dashboard.layout',compact(
            'template',
            'config'
        ));
    }

    private function config()
    {
        return [
            'js' =>[
                'backend/js/plugins/switchery/switchery.js',

            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];
    }
}
