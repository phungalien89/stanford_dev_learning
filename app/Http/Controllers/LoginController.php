<?php

namespace App\Http\Controllers;

use App\Rules\UpperCase;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function dangnhap()
    {
        return view('dangnhap');
    }

    public function thuchiendangnhap(Request $request)
    {
        $rules = [
            'email' => ['required', 'email', new UpperCase()],
            'password' => 'required'
        ];
        $messages = [
            'email.required' => 'Bạn chưa nhập :attribute',
            'email.email' => ':attribute bạn nhập chưa đúng',
            'password.required' => 'Bạn chưa nhập :attribute'
        ];
        $attributes = [
            'email' => 'Email',
            'password' => 'Mật khẩu'
        ];
        $data = $request->validate($rules, $messages, $attributes);
        if ($request->email == 'admin' && $request->password == '123') {
            session()->put(['currentUser' => 'admin']);
            return redirect()->route('trangchu');
        }
        return redirect()->route('trangchu');
    }

    public function thuchiendangnhap2(LoginRequest $request)
    {
        if ($request->email == 'admin' && $request->password == '123') {
            return redirect()->route('sach.index')->with('currentUser', 'admin');
        } else {
            return back()->withInput()->withErrors(['email' => 'Email này chưa đăng ký bạn ơi &#x1F608', 'password' => 'Mật khẩu sai bét rồi bạn &#x1F606 .']);
        }
    }
}
