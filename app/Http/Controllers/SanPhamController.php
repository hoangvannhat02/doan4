<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPhamModels;
use Illuminate\Http\Request;
use App\Models\sanpham;
use Illuminate\Support\Facades\Auth;

class SanPhamController extends Controller
{
    //
    public function index(){
        $sp = sanpham::all();
        return view('admin.sanpham.index',['sanpham'=>$sp]);
    }
    public function save(Request $request){
        $chitiet = $request -> ChiTietSanPham;
        $maloai = $request -> MaLoai;
        $mota = $request -> MoTa;
        $tensp = $request -> TenSanPham;       
        $filename = '';
        if($request -> hasFile('Anh')){
            $rq = $request -> file('Anh');
            $nameimg = $rq->getClientOriginalName();
            $filename = '/access/product/' .$nameimg;
            $request -> Anh->move(public_path('/access/product/'),$filename);
        }
        
        sanpham::create([
            "TenSanPham"=>$tensp,
            "Anh"=>$filename,
            "ChiTietSanPham"=>$chitiet,
            "MaLoai" => $maloai,
            "MoTa" => $mota
        ]); 
       
        return redirect()->route('broad');
    }

    public function edit($id){
        // $sp = sanpham::where('MaSanPham',$id)->first();
        $loaisp = LoaiSanPhamModels::pluck('tenloai','id');
        $sp = sanpham::find($id);
        return view('admin.sanpham.edit',['sanpham'=>$sp],compact("loaisp"));
    }

    public function update(Request $request,$id){
        $sp = sanpham::find($id);
        $filename = '';
        if($request -> hasFile('Anh')){
            $rq = $request -> file('Anh');
            $nameimg = $rq->getClientOriginalName();
            $filename = '/access/product/' .$nameimg;
            $request -> Anh->move(public_path('/access/product/'),$filename);
            sanpham::where('id',$id)->update(
                [
                    'TenSanPham' => $request->TenSanPham,
                    'Anh'=>$filename,
                    'MoTa'=>$request->MoTa,
                    'ChiTietSanPham'=>$request->ChiTietSanPham,
                    'MaLoai'=>$request->MaLoai
                ]
                );
        }
        else{
            sanpham::where('id',$id)->update(
                [
                    'TenSanPham' => $request->TenSanPham,
                    'Anh'=>$sp["Anh"],
                    'MoTa'=>$request->MoTa,
                    'ChiTietSanPham'=>$request->ChiTietSanPham,
                    'MaLoai'=>$request->MaLoai
                ]
                );
        }
        
        return redirect()->route('broad');
    }

    public function destroy($id){
        // sanpham::where("MaSanPham",$id)->delete();
        sanpham::destroy($id);
        return redirect()->route('broad');
    }

    public function create(){
        $loaisp = LoaiSanPhamModels::pluck('tenloai','id');
        return view('admin.sanpham.create',['loaisp'=>$loaisp]);
    }
    
}
