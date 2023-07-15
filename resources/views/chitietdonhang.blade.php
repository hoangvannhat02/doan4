@extends('layout')
@section('content')
    <section>
         <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Chi tiết hóa đơn</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        
        <div class="container">
            <div class="mb-5 d-flex justify-content-center">
                <h2>Chi tiết hóa đơn</h2>
            </div>
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">                     
                        <table class="update_cart_url">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá </th>
                                    <th>Tạm tính</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($danhsachsanpham as $id => $item)
                                <tr>
                                    <td>{{ $item[0]['id'] }}</td>
                                    <td>{{ $item[0]['TenSanPham'] }}</td>
                                    <td>{{ $item[0]['SoLuong'] }}</td>
                                    <td>{{ number_format($item[0]['GiaBan']) .'đ'}}</td>
                                    
                                    <td>{{ number_format($item[0]['TamTinh']) . 'đ'}}</td>
                            
                              
                                </tr>
                                @endforeach
                               
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Tổng tiền: {{ number_format($tongtien) .'đ'}}</td>
                                </tr>
                            </tfoot>
                        </table>
                       
                    </div>
                </div>
            </div>
           
        </div>
        
    </section>
    <!-- Shop Cart Section End -->
    </section>
@endsection