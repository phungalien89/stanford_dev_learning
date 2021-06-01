<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\NhanVienBusiness;
use App\Models\PhongBan;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public $bus;

    public function __construct()
    {
        global $bus;
        $bus = app('nhanVienBus');
    }

    public function themmoi_nhanvien()
    {
        return view('nhanvien.nhanvien-add');
    }

    public function danhsach_nhanvien(Request $request)
    {
        $pb = PhongBan::all();
        $arrNV = NhanVien::paginate(3);
        $search = "";
        $phongban = "";
        return view('nhanvien.danhsach', compact(['arrNV', 'pb', 'search', 'phongban']));
    }

    public function timkiem_nhanvien(Request $request)
    {
        $tuKhoa = $request->search;
        $phong = $request->phongban;

        $pb = PhongBan::all();
        $arrNV = NhanVien::where(function($q) use ($tuKhoa){
            $q->orWhere('MaNV', 'like', '%' . $tuKhoa . '%')
             ->orWhere('HoTen', 'like', '%' . $tuKhoa . '%')
            ->orWhere('DiaChi', 'like', '%' . $tuKhoa . '%');
        });
        /*
        ! Can not use $arrNV = $request->whenHas('key', callback)
        ! because if the key of whenHas is missing, it is gonna return the request.
        ! Press Ctrl + Left-Click to see the detail of whenHas func
        */
        if($request->has('phongban')){
            $arrNV = $arrNV->where('MaPhong', $phong);
        }
        $search = $tuKhoa;
        $phongban = $phong;
        $arrNV = $arrNV->paginate(3);
        return view('nhanvien.danhsach', compact(['arrNV', 'pb', 'search', 'phongban']));
    }

    public function luutru_nhanvien(Request $request)
    {
        global $bus;
        $nv = new NhanVien();
        $nv->maNV = $request->manv;
        $nv->hoTen = $request->hoten;
        $nv->email = $request->email;
        $nv->diaChi = $request->diachi;
        $nv->dienThoai = $request->dienthoai;

        $bus->themmoi_nhanvien($nv);
        return redirect('/danhsach1');
    }

    public function danhsach_nhanvien1()
    {
        global $bus;
        $arrNhanVien = $bus->layDanhSach();
        return view('nhanvien.danhsach1', compact('arrNhanVien'));
    }
}
