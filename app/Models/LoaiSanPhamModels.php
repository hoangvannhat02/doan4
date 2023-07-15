<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPhamModels extends Model
{
    use HasFactory;
    protected $table = "loaisanpham";
    protected $fillable = [
        'id',
        'TenLoai',     
        'MoTa'
    ];
   
}