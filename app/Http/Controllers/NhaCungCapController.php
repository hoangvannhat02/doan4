<?php

namespace App\Http\Controllers;

use App\Models\nhacungcap;
use Illuminate\Http\Request;

class NhaCungCapController extends Controller
{
    //
    public function index()
    {
        $ncc = nhacungcap::get();
        return view('admin.nhacungcap.index', compact('ncc'));
    }
    public function save(Request $request)
    {
        $hoten = $request->HoTen;

        $diachi = $request->DiaChi;
        $dienthoai = $request->DienThoai;
        $email = $request->Email;

        nhacungcap::create([
            "HoTen" => $hoten,
            "DiaChi" => $diachi,
            "DienThoai" => $dienthoai,
            "Email" => $email
        ]);

        return redirect()->route('nhacungcap.index');
    }

    public function edit($id)
    {
        $ncc = nhacungcap::find($id);
        return view('admin.nhacungcap.edit', ['nhacungcap' => $ncc]);
    }

    public function update(Request $request, $id)
    {

        nhacungcap::where('id', $id)->update(
            [
                "HoTen" => $request -> HoTen,
            "DiaChi" => $request -> DiaChi,
            "DienThoai" => $request -> DienThoai,
            "Email" => $request -> Email              
            ]
        );
        return redirect()->route('nhacungcap.index');
    }

    public function destroy($id)
    {
        nhacungcap::destroy($id);
        return redirect()->route('nhacungcap.index');
    }

    public function create()
    {
        return view('admin.nhacungcap.create');
    }
}
