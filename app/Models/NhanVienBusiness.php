<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;

class NhanVienBusiness extends Model
{
    use HasFactory;

    public $arrNhanVien = [];

    public function layDanhSach()
    {
        $nam = new NhanVien();
        $nam->maNV = 'SF001';
        $nam->hoTen = 'Trần Thành Nam';
        $nam->email = 'thanhcong.tran@gmail.com';
        $nam->dienThoai = '0355078993';
        $nam->diaChi = 'Hà Nội';

        $this->arrNhanVien[] = $nam;

        $dung = new NhanVien();
        $dung->maNV = 'SF002';
        $dung->hoTen = 'Hoàng Anh Dũng';
        $dung->email = 'anhdung.hoang@gmail.com';
        $dung->dienThoai = '0355078234';
        $dung->diaChi = 'Hà Nội';

        $this->arrNhanVien[] = $dung;

        $ha = new NhanVien();
        $ha->maNV = 'SF003';
        $ha->hoTen = 'Lê Thị Hà';
        $ha->email = 'ha.lethi@gmail.com';
        $ha->dienThoai = '0322492917';
        $ha->diaChi = 'Nam Định';

        $this->arrNhanVien[] = $ha;

        return $this->arrNhanVien;
    }

    public function themmoi_nhanvien($nv)
    {
        $this->arrNhanVien[] = $nv;
    }
}
