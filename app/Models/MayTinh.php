<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MayTinh extends Model
{
    use HasFactory;

    public $tenMay = '';
    public $tenHang = '';

    public function inThongTin()
    {
        echo 'Tên máy tính: <code style="color: red">' . $this->tenMay . '</code><br>';
        echo 'Hãng sản xuất: <code style="color: red">' . $this->tenHang . '</code><br>';
    }
}
