<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPhamModels;
use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    //
    public function getallcategory()
    {
        $lsp = LoaiSanPhamModels::get();
        return view('admin.loaisanpham.index', compact('lsp'));
    }
    public function save(Request $request)
    {
        $tenloai = $request->TenLoai;

        $mota = $request->MoTa;

        LoaiSanPhamModels::create([
            "TenLoai" => $tenloai,
            "MoTa" => $mota,
        ]);

        return redirect()->route('loaisanpham.index');
    }

    public function edit($id)
    {
        $lsp = LoaiSanPhamModels::find($id);
        return view('admin.loaisanpham.edit', ['loaisanpham' => $lsp]);
    }

    public function update(Request $request, $id)
    {

        LoaiSanPhamModels::where('id', $id)->update(
            [
                'TenLoai' => $request->TenLoai,
                'MoTa' => $request->MoTa              
            ]
        );
        return redirect()->route('loaisanpham.index');
    }

    public function destroy($id)
    {
        LoaiSanPhamModels::destroy($id);
        return redirect()->route('loaisanpham.index');
    }

    public function create()
    {
        return view('admin.loaisanpham.create');
    }
}
