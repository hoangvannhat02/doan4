<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    //
    public function index()
    {
        $kh = KhachHang::get();
        return view('admin.khachhang.index', compact('kh'));
    }
    public function save(Request $request)
    {
        $hoten = $request->HoVaTen;

        $diachi = $request->DiaChi;
        $dienthoai = $request->SoDienThoai;
        $email = $request->Email;
        $username = $request->UserName;
        $password = $request->PassWord;

        KhachHang::create([
            "HoVaTen" => $hoten,
            "DiaChi" => $diachi,
            "SoDienThoai" => $dienthoai,
            "Email" => $email,
            "PassWord"=>$password,
            "UserName"=>$username
        ]);

        return redirect()->route('khachhang.index');
    }

    public function edit($id)
    {
        $kh = KhachHang::find($id);
        return view('admin.khachhang.edit', ['khachhang' => $kh]);
    }

    public function update(Request $request, $id)
    {

        KhachHang::where('id', $id)->update(
            [
                "HoVaTen" => $request -> HoVaTen,
            "DiaChi" => $request -> DiaChi,
            "SoDienThoai" => $request -> SoDienThoai,
            "Email" => $request -> Email,
            "UserName"=>$request->UserName,
            "PassWord" => $request->PassWord             
            ]
        );
        return redirect()->route('khachhang.index');
    }

    public function destroy($id)
    {
        KhachHang::destroy($id);
        return redirect()->route('khachhang.index');
    }

    public function create()
    {
        return view('admin.khachhang.create');
    }
}
