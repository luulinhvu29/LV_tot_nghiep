<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Authority\AuthorityServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $userService;
    private $authorityService;

    public function __construct(UserServiceInterface $userService,
                                AuthorityServiceInterface $authorityService)
    {
        $this->userService = $userService;

        $this->authorityService = $authorityService;
    }

    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level'=> [Constant::user_level_host, Constant::user_level_admin], // Tai khoan cap do host hoac admin
        ];

        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember)){

            $user = $this->userService->find(Auth::id());


            if($user->level == 0)
                return redirect()->intended('admin'); // Mac dinh la: trang chu.
            elseif ($user->authority[0]->user){
                return redirect()->intended('admin');
            }elseif ($user->authority[0]->pro){
                return redirect('admin/product');
            }elseif ($user->authority[0]->brand){
                return redirect('admin/brand');
            }elseif ($user->authority[0]->cate){
                return redirect('admin/cate');
            }elseif ($user->authority[0]->enter){
                return redirect('admin/enterCoupon');
            }
        }
        else
        {
            return back()->with('notification', 'Error: Email or password is wrong');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('admin/login');
    }
}
