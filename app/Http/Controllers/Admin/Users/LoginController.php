<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    function index(){
        return view('admin.users.login',[
            'title'=> 'Đăng nhập vào admin'
        ]);
    }

    public function store(Request $request){

        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            Session::flash('success', 'Đăng nhập thành công');
            return redirect()->route('admin');
        }
        Session::flash('error', 'Email hoặc Password không chính xác');

        return redirect()->back();
    }
}
