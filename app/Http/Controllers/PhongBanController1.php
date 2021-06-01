<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhongBanController1 extends Controller
{
    public function danhsach()
    {
        $phongban = DB::table('phongban')->get();
        return view('phongban1.danhsach', compact('phongban'));
    }

    public function hienThiThemPhong()
    {
        return view('phongban1.phongadd');
    }

    public function themmoi_phongban(Request $request)
    {
        $ma = $request->maphong;
        $ten = $request->tenphong;
        DB::table('phongban')->insert(['MaPhong' => $ma, 'TenPhong' => $ten]);
        return redirect()->route('phongban1.danhsach');
    }

    public function chiTietSua($id)
    {
        $objPhongBan = DB::table('phongban')->where('MaPhong', $id)->first();
        return view('phongban1.phongedit', compact('objPhongBan'));
    }

    public function suaThongTin(Request $request, $id)
    {
        $ma = $request->maphong;
        $ten = $request->tenphong;
        DB::table('phongban')->where('MaPhong', $id)->update(['MaPhong' => $ma, 'TenPhong' => $ten]);
        return redirect()->route('phongban1.danhsach');
    }

    public function xoaThongTin($id)
    {
        DB::table('phongban')->delete($id);
        return redirect()->route('phongban1.danhsach');
    }
}
