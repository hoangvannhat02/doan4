<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPhamModels;
use App\Models\sanpham;
use Illuminate\Support\Facades\DB;
use App\Models\ChiTietHoaDonBan;
use App\Models\HoaDonBan;
use App\Models\KhachHang;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Hamcrest\Core\HasToString;
use Hamcrest\Core\IsNull;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    //

    public function index()
    {
      
        $loaisp = LoaiSanPhamModels::all();
        $sp = DB::table('sanpham')->paginate(4);
        $spp = DB::table('sanpham')->take(3)->get();

        $spchay = sanpham::orderBy('id', 'desc')->take(3)->get();
        $spbanchay = sanpham::join('chitiethoadonban', 'chitiethoadonban.masanpham', '=', 'sanpham.id')
            ->select('sanpham.*', ChiTietHoaDonBan::raw('SUM(chitiethoadonban.soluong) as total_quantity'))
            ->groupBy('sanpham.id', 'sanpham.TenSanPham', 'sanpham.giaban', 'sanpham.SoLuong', 'sanpham.MaLoai', 'sanpham.Anh', 'sanpham.MoTa', 'sanpham.ChiTietSanPham', 'sanpham.created_at', 'sanpham.updated_at')
            ->orderBy('total_quantity', 'desc')
            ->take(3)
            ->get();
        $spa = sanpham::orderBy('id', 'desc')->take(6)->get();

        return view('index', ['loaisp' => $loaisp, 'spchay' => $spchay, 'spbanchay' => $spbanchay, 'spp' => $spp, 'spa' => $spa], compact('sp'));
    }

    public function showByCategory($id)
    {

        // Lấy thông tin tất cả loại sản phẩm
        $loaisp = LoaiSanPhamModels::all();

        // Lấy danh sách sản phẩm theo mã loại từ cơ sở dữ liệu
        $sp = sanpham::where('MaLoai', $id)->paginate(4);

        $spp = DB::table('sanpham')->take(3)->get();

        $spchay = sanpham::orderBy('id', 'desc')->take(3)->get();
        $spbanchay = sanpham::join('chitiethoadonban', 'chitiethoadonban.masanpham', '=', 'sanpham.id')
            ->select('sanpham.*', ChiTietHoaDonBan::raw('SUM(chitiethoadonban.soluong) as total_quantity'))
            ->groupBy('sanpham.id', 'sanpham.TenSanPham', 'sanpham.giaban', 'sanpham.SoLuong', 'sanpham.MaLoai', 'sanpham.Anh', 'sanpham.MoTa', 'sanpham.ChiTietSanPham', 'sanpham.created_at', 'sanpham.updated_at')
            ->orderBy('total_quantity', 'desc')
            ->take(3)
            ->get();
        $spa = sanpham::orderBy('id', 'desc')->take(6)->get();

        // Trả về view hiển thị danh sách sản phẩm và thông tin loại sản phẩm
        return view('index', compact('sp', 'loaisp', 'spp', 'spchay', 'spbanchay', 'spa'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->searchTerm;

        $products = SanPham::where('tensanpham', 'like', '%' . $searchTerm . '%')
            ->orWhere('giaban', 'like', '%' . $searchTerm . '%')
            ->orWhere('chitietsanpham', 'like', '%' . $searchTerm . '%')
            ->paginate();

        return view('category', ['sanpham' => $products]);
    }

    public function categories($id)
    {
        $loaisp = LoaiSanPhamModels::all();
        $lsp = DB::table('sanpham')->where('maloai', $id)->paginate(8);


        return view("category", ['sanpham' => $lsp], ['loaisp' => $loaisp]);
    }
    public function detail($id)
    {
        $spid = sanpham::find($id);

        $sptheomaloai = sanpham::where('sanpham.MaLoai', $spid->MaLoai)->get();

        return view('detail', ['spid' => $spid, 'sptheomaloai' => $sptheomaloai]);
    }

    public function AddToCart($id)
    {
        $product = sanpham::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'id' => $id,
                'productname' => $product->TenSanPham,
                'price' => $product->GiaBan,
                'image' => $product->Anh,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], status: 200);
    }

    public function UpdateCart(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;
        if ($id && $quantity) {
            $carts = session()->get('cart');
            $carts[$id]['quantity'] = $quantity;
            session()->put('cart', $carts);
            return response()->json(['code' => 200], status: 200);
        };
    }

    public function DeleteCart(Request $request)
    {
        $id = $request->id;

        if (isset($id)) {
            $cart = session()->get('cart');
            unset($cart[$id]);
            session()->put('cart', $cart);
            return response()->json([
                'code' => 200,
                'cart' => $cart
            ], status: 200);
        }
    }

    public function cart()
    {
        $carts = session()->get('cart', []);
        return view('cart', compact('carts'));
    }

    public function checkout()
    {
        $listkh = session()->get('khachhang', []);
        if (count($listkh) < 1) {
            return redirect()->route('loginuser');
        }
        $carts = session()->get('cart');
        return view('checkout', compact('carts'), compact('listkh'));
    }

    public function addbill(Request $request, $id)
    {
        // $ngaytao = DateTime();

        $sum = 0;
        $cart = session()->get('cart');
        

        $diachinhan = $request->DiaChiNhan;
        $now = Carbon::now();

        foreach ($cart as $x) {
            $sum += $x['quantity'] * $x['price'];
        }
        HoaDonBan::create([
            'MaKhachHang' => $id,
            'DiaChiNhan' => $diachinhan,
            'NgayTao' => $now,
            'TrangThai' => 0,
            'MoTa' => '',
            'TongTien' => $sum
        ]);

        $lastproduct = HoaDonBan::latest()->first();

        foreach ($cart as $x) {
            ChiTietHoaDonBan::create(
                [
                    'MaSanPham' => $x['id'],
                    'MaHoaDon' => $lastproduct->id,
                    'SoLuong' => $x['quantity'],
                    'TamTinh' => $x['price'] * $x['quantity']
                ]
            );
        }
        session()->flash('cart');

        return redirect()->route('cart')->with('success', 'Thanh toán thành công!');
    }

    public function checklogin(Request $request)
    {
        $tk = $request->username;
        $mk = $request->password;
        $check = KhachHang::where('UserName', '=', $tk)->where('PassWord', '=', $mk)->get();

        if (count($check) > 0) {
            $cus = session()->get('khachhang', []);
            $cus = [
                'id' => $check[0]->id, 'UserName' => $check[0]->UserName,
                'PassWord' => $check[0]->PassWord, 'HoVaTen' => $check[0]->HoVaTen,
                'DiaChi' => $check[0]->DiaChi, 'SoDienThoai' => $check[0]->SoDienThoai,
                'Email' => $check[0]->Email
            ];
            session()->put('khachhang', $cus);
            return redirect()->route('home');
        } else {
            return redirect('login')
                ->withErrors(['login' => 'Tên đăng nhập hoặc mật khẩu không chính xác'])
                ->withInput();
        }
    }

    public function longout()
    {
        session()->forget('khachhang');
        return redirect()->route('loginuser');
    }

    public function login()
    {
        return view('login');
    }
    public function contact()
    {
        return view('contact');
    }
    public function blog()
    {
        $tt = DB::table('tintuc')->join('nguoidung', 'nguoidung.id', '=', 'tintuc.manguoidung')->select('tintuc.*', 'nguoidung.HoTen')->get();
        return view('blog', ['tintuc' => $tt]);
    }
    public function pages()
    {
        return view('pages');
    }
    public function hoadon()
    {
        $ttkh = session()->get('khachhang', []);
        if (Count($ttkh) <= 0)
            $dshdb = [];
        else {
            $dshdb = HoaDonBan::where('hoadonban.makhachhang', $ttkh['id'])->where('trangthai', 0)->paginate(5);
        }
        return view('hoadon', ['dshdb' => $dshdb]);
    }
    public function hoadonvanchuyen()
    {

        $ttkh = session()->get('khachhang', []);
        if (Count($ttkh) <= 0)
            $dshdb = [];
        else {
            $dshdb = HoaDonBan::where('hoadonban.makhachhang', $ttkh['id'])->where('trangthai', 1)->paginate(5);
        }
        return view('hoadon', ['dshdb' => $dshdb]);
    }
    public function hoadondagiao()
    {
        $ttkh = session()->get('khachhang', []);
        if (Count($ttkh) <= 0)
            $dshdb = [];
        else {
            $dshdb = HoaDonBan::where('hoadonban.makhachhang', $ttkh['id'])->where('trangthai', 2)->paginate(5);
        }
        return view('hoadon', ['dshdb' => $dshdb]);
    }

    public function huydon($id)
    {
        HoaDonBan::destroy($id);
        return redirect()->route('hoadon');
    }
    public function chitietdonhang($id){
        $laymasp = ChiTietHoaDonBan::where('MaHoaDon','=',$id)->get();
        $danhsachsanpham = [];
        foreach ($laymasp as $value) {
            $sp = sanpham::join('ChiTietHoaDonBan', 'sanpham.id', '=', 'ChiTietHoaDonBan.MaSanPham')->where('chitiethoadonban.MaSanPham','=',$value['MaSanPham'])->where('chitiethoadonban.MaHoaDon','=',$value['MaHoaDon'])->get();
            $danhsachsanpham[] = $sp;
        }
        
        $gettongtien = HoaDonBan::where('id',$id)->get();

        // dd($gettongtien[0]['TongTien']);
        return view('chitietdonhang',['danhsachsanpham'=>$danhsachsanpham,'tongtien'=>$gettongtien[0]['TongTien']]);
    }
    public function about()
    {
        return view('about');
    }
    public function register()
    {
        return view('register');
    }

    //Đăng ký tài khoản khách hàng
    public function dangky(Request $request)
    {
        KhachHang::create([
            "HoVaTen" => $request->hovaten,
            "DiaChi" => $request->diachi,
            "SoDienThoai" => $request->sodienthoai,
            "Email" => $request->email,
            "UserName" => $request->username,
            "PassWord" => $request->password
        ]);
        return redirect()->route('loginuser')->with('success', 'Đăng ký tài khoản thành công');
    }
}
