<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{
    //
    public function login(){
        return View('admin.login.index',['title'=>'Trang đang nhập hệ thống']);
    }

    
}
