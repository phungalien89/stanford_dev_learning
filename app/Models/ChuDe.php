<?php

namespace App\Models;

use App\Models\Sach;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChuDe extends Model
{
    use HasFactory;

    protected $table = 'subject';
    protected $primaryKey = 'subjectId';
    public $timestamps = false;
    public $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'subjectId', 'subjectName', 'subjectDesc'
    ];

    public function sach()
    {
        return $this->hasMany(Sach::class);
    }
}
