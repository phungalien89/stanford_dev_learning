<?php

namespace App\Models;

use App\Models\ChuDe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sach extends Model
{
    use HasFactory;


    protected $table = 'book';
    protected $primaryKey = 'bookId';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'bookId', 'bookName', 'bookDesc', 'bookImage', 'bookPrice', 'bookAuthor', 'bookApproved', 'subjectId'
    ];

    public function bookImage()
    {
        return $this->bookImage ? '/storage/' . $this->bookImage : '/storage/upload/unavailable-image.jpg';
    }

    public function chude()
    {
        return $this->belongsTo(ChuDe::class);
    }
}
