<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhanvien';
    protected $primaryKey = 'MaNV';
    public $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
