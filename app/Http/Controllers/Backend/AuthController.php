<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Flasher\Prime\FlasherInterface;

use function Flasher\Prime\flash;

class AuthController extends Controller
{
    public function __construct()
    {
        // Đảm bảo bạn có bất kỳ logic khởi tạo nào cần thiết ở đây
    }

    public function index()
    {
        if(Auth::id()>0)
        {
            return redirect()->route('dashboard.index');
        }
        return view('backend.auth.login');
    }

    public function login(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            flash()->success('Login successfully');

            return redirect()->route('dashboard.index');
        }
        flash()->error('Login failed');
        return redirect()->route('auth.admin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.admin');
    }
}
