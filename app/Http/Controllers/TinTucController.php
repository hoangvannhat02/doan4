<?php

namespace App\Http\Controllers;

use App\Models\nguoidung;
use App\Models\tintuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    //
    public function index(){
        $tt = tintuc::join('nguoidung', 'tintuc.MaNguoiDung', '=', 'nguoidung.id')->select('tintuc.*', 'nguoidung.HoTen')->get();

        return view('admin.tintuc.index',['tintuc'=>$tt]);
    }
    public function save(Request $request){
        $tieude = $request -> TieuDe;
        $ngaytao = $request -> NgayTao;
        $noidung = $request -> NoiDung;
        $manguoidung = $request -> MaNguoiDung;
        $trangthai =  intval($request->TrangThai);
        
       
        $filename = '';
        if($request -> hasFile('Anh')){
            $rq = $request -> file('Anh');
            $nameimg = $rq->getClientOriginalName();
            $filename = '/access/img/trend/' .$nameimg;
            $request -> Anh->move(public_path('/access/img/trend/'),$filename);
        }
        
        tintuc::create([
            "TieuDe"=>$tieude,
            "Anh"=>$filename,
            "NgayTao"=>$ngaytao,
            "NoiDung" => $noidung,
            "MaNguoiDung" => $manguoidung,
            "TrangThai" => $trangthai
        ]); 
       
        return redirect()->route('tintuc.index');
    }

    public function edit($id){
        
        $nd = nguoidung::pluck('HoTen','id');
        $listtintuc = tintuc::find($id);
        return view('admin.tintuc.edit',['listtintuc'=>$listtintuc],compact("nd"));
    }

    public function update(Request $request,$id){
        $tt = tintuc::find($id);
       
        $filename = '';
        if($request -> hasFile('Anh')){
            $rq = $request -> file('Anh');
            $nameimg = $rq->getClientOriginalName();
            $filename = '/access/img/trend/' .$nameimg;
            $request -> Anh->move(public_path('/access/img/trend/'),$filename);
            tintuc::where('id',$id)->update(
                [
                    "TieuDe"=>$request -> TieuDe,
                    "Anh"=>$filename,
                    "NgayTao"=>$request->NgayTao,
                    "NoiDung" => $request->NoiDung,
                    "MaNguoiDung" => $request->MaNguoiDung,
                    "TrangThai" => intval($request->TrangThai)
                ]
                );
        }
        else{
            tintuc::where('id',$id)->update(
                [
                    "TieuDe"=>$request -> TieuDe,
                    "Anh"=>$tt["Anh"],
                    "NgayTao"=>$request->NgayTao,
                    "NoiDung" => $request->NoiDung,
                    "MaNguoiDung" => $request->MaNguoiDung,
                    "TrangThai" => intval($request->TrangThai)
                ]
                );
        }
        
        return redirect()->route('tintuc.index');
    }

    public function destroy($id){
        
        tintuc::destroy($id);
        return redirect()->route('tintuc.index');
    }

    public function create(){
        $listnguoidung = nguoidung::pluck('HoTen','id');
        return view('admin.tintuc.create',['listnguoidung'=>$listnguoidung]);
    }
}
