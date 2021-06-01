<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function hienthitrangchu()
    {
        $email = session('email');
        return view('trangchu', compact('email'));
    }

    public function hienThiMayTinh()
    {
        $comm = app('computer');
        $comm->inThongTin();
    }
}
