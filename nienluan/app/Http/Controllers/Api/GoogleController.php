<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService,

    )
    {
        $this->userService = $userService;

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        dd($user);
        // Xử lý thông tin của người dùng và đăng nhập thành công
        $user = User::where('email', $user->email)->first();

        if(!empty($user)){

            $remember = false;
            Auth::login($user, $remember);
            return redirect()->intended('');
        }else{
            $user = Socialite::driver('google')->user();

            $data = [
                'email' => $user->email,
                'name' => $user->name,
                'google_id'=> $user->id,
                'password'=> bcrypt('123456'),
                'level' =>Constant::user_level_client,
            ];

            $this->userService->create($data);

            $user = User::where('email', $user->email)->first();

            $remember = false;
            Auth::login($user, $remember);
            return redirect()->intended('');
        }
    }

}
