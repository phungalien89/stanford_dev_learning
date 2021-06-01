<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Log\NullLogger;

class PhongBanController extends Controller
{
    //Hàm lấy danh sách
    public function danhsach()
    {
        $phongban = DB::select('select * from phongban');
        return view('phongban.danhsach', compact('phongban'));
    }

    public function hienThiThemPhong()
    {
        return view('phongban.phongadd');
    }

    public function themmoi_phongban(Request $request)
    {
        $rules = [
            'maphong' => ['required'],
            'tenphong' => ['required']
        ];
        $messages = [
            'maphong.required' => 'Bạn chưa điền mã phòng',
            'tenphong.required' => 'Bạn chưa điền tên phòng'
        ];
        $data = Validator::make($request, $rules, $messages);
        $data = [$data->maphong, $data->tenphong];
        DB::insert('insert into phongban(maphong, tenphong) values (?, ?)', $data);
        $thongbao = 'Thêm mới phòng ban thành công';
        return view('phongban.phongadd', compact('thongbao'));
    }

    public function chiTietSua($id)
    {
        $objPhongBan = null;
        if (isset($id)) {
            $phongs = DB::select('select * from phongban where MaPhong=?', [$id]);
            foreach ($phongs as $pb) {
                $objPhongBan = $pb;
            }
        }
        return view('phongban.phongedit', compact('objPhongBan'));
    }

    public function suaThongTin(Request $request, $id)
    {
        $tenPhong = $request->tenphong;
        DB::update('update phongban set tenphong=? where MaPhong=?', [$tenPhong, $id]);
        return redirect()->route('phongban.danhsach');
    }

    public function xoaPhongBan($id)
    {
        if (isset($id)) {
            DB::delete('delete from phongban where MaPhong=?', [$id]);
            return redirect()->route('phongban.danhsach');
        }
        return view('phongban.danhsach');
    }
}
