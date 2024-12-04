<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Repository\UserRepository;

class RegisterController extends Controller
{
    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(){
        return view('auth.client.register');
    }
    public function register(RegisterRequest $request){
        try {
            $this->userRepository->create($request->all());
            // $user->assignRole('customer');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', 'Đã có lỗi xảy ra. Vui lòng thử lại.');
        }
        return redirect()->route('client.index')->with('success', 'Đăng ký thành công.');
        
    }
}
