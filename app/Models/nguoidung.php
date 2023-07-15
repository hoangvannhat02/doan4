<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class nguoidung extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $table = 'nguoidung';
    protected $fillable = [
        'id','UserName',
        'PassWord','HoTen',
        'DiaChi','DienThoai',
        'Anh',
        'Email','NgayTao','TrangThai'
    ];
    
    public function getAuthPassword()
    {
        return $this->PassWord;
    }
}
