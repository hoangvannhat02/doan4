<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    use HasFactory;
    protected $table = 'tintuc';
    protected $fillable = [
        'id','TieuDe',
        'NgayTao','NoiDung',
        'Anh','MaNguoiDung',
        'TrangThai'
    ];
}
