<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Authority\AuthorityServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Utilities\Common;
use App\Utilities\Constant;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userService;
    private $authorityService;

    public function __construct(UserServiceInterface $userService,
                                AuthorityServiceInterface $authorityService)
    {
        $this->userService = $userService;

        $this->authorityService = $authorityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userService->searchAndPaginate('name', $request->get('search'));

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get('password') != $request->get('password_confirmation')){
            return back()
                ->with('notification', 'ERROR: Confirm password does not match');
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));

        // Xu ly file:
        if($request->hasFile('image')){
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');
        }

        if ($request->level){
            $user = $this->userService->create($data);
        }else{
            $data['level'] = Constant::user_level_client;
            $user = $this->userService->create($data);
        }



        return redirect('admin/user/' . $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {


        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->except('authority_user','authority_pro','authority_cate','authority_brand',
                                'authority_order','authority_enter');

        $au = [
            'user' => $request->authority_user ? true : false,
            'pro' => $request->authority_pro ? true : false,
            'cate' => $request->authority_cate ? true : false,
            'brand' => $request->authority_brand ? true : false,
            'order' => $request->authority_order ? true : false,
            'enter' => $request->authority_enter ? true : false,
        ];

        $pq = $this->authorityService->getAuthorityByUserId($user->id);


        //Xu ly mat khau
        if($request->get('password') != null){
            if($request->get('password') != $request->get('password_confirmation')){
                return back()
                    ->with('notification', 'ERROR: Confirm password does not math');
            }

            $data['password'] = bcrypt($request->get('password'));

        }else {
            unset($data['password']);
        }

        //Xu ly file anh
        if($request->hasFile('image')){
            //Them file moi:
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');

            //Xoa file cu:
            $file_name_old = $request->get('image_old');
            if($file_name_old != ''){
                unlink('front/img/user/' . $file_name_old);
            }
        }

        //Cap nhat du lieu
        $this->userService->update($data, $user->id);

        $this->authorityService->update($au, $pq[0]->id);


        return redirect('admin/user/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user->id);

        //Xoa file:
        $file_name = $user->avatar;
        if($file_name != ''){
            unlink('front/img/user/' . $file_name);
        }

        return redirect('admin/user/');

    }
}
