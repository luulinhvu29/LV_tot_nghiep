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

//    public function getGoogleSignInUrl()
//    {
//        try {
//            $url = Socialite::driver('google')->stateless()
//                ->redirect()->getTargetUrl();
//            return response()->json([
//                'url' => $url,
//            ])->setStatusCode(Response::HTTP_OK);
//        } catch (\Exception $exception) {
//            return $exception;
//        }
//    }
//
//    public function loginCallback(Request $request)
//    {
//        try {
//            $state = $request->input('state');
//
//            parse_str($state, $result);
//            $googleUser = Socialite::driver('google')->stateless()->user();
//
//            $user = User::where('email', $googleUser->email)->first();
//            if ($user) {
//                throw new \Exception(__('google sign in email existed'));
//            }
//            $user = User::create(
//                [
//                    'email' => $googleUser->email,
//                    'name' => $googleUser->name,
//                    'google_id'=> $googleUser->id,
//                    'password'=> '123',
//                    'level' =>Constant::user_level_client,
//                ]
//            );
//            return response()->json([
//                'status' => __('google sign in successful'),
//                'data' => $user,
//            ], Response::HTTP_CREATED);
//
//        } catch (\Exception $exception) {
//            return response()->json([
//                'status' => __('google sign in failed'),
//                'error' => $exception,
//                'message' => $exception->getMessage()
//            ], Response::HTTP_BAD_REQUEST);
//        }
//    }
}
