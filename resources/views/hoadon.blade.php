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
                        <span>Hóa đơn</span>
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
                <a href="{{ route('hoadon') }}" class="btn btn-secondary mr-1">Đơn hàng chưa được duyệt</a>
                <a href="{{ route('hoadonvanchuyen') }}" class="btn btn-warning mr-1">Đơn hàng đang vận chuyển</a>
                <a href="{{ route('hoadondagiao') }}" class="btn btn-success">Đơn hàng đã giao</a>
            </div>
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">                     
                        <table class="update_cart_url">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ngày tạo</th>
                                    <th>Địa chỉ nhận</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dshdb as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ date('d/m/Y', strtotime($item['NgayTao'])) }}
                                    </td>
                                    <td> {{ $item['DiaChiNhan'] }}</td>
                                  
                                    <td>
                                        @if($item['TrangThai']==0)
                                            <p style="color: red">Chờ xét duyệt</p>
                                        @elseif($item['TrangThai']==1)
                                            <p style="color: yellow">Đang vận chuyển</p>
                                        @elseif($item['TrangThai']==2)
                                            <p style="color: green">Đã giao hàng</p>
                                        @endif
                                                     
                                    </td>
                                  
                                    <td> {{ $item['TongTien'] }}</td>
                                    <td class="d-flex">
                                        @if($item['TrangThai']==0)
                                            <a onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này không?')" href="{{ route('huydon',["id"=>$item->id]) }}" class="icon_close fa-2x mr-2" ></a>
                                            <a href="{{ route('chitietdonhang',['id'=>$item['id']]) }}"><i class="fa fa-eye fa-2x"></i></a>                  
                                        @elseif($item['TrangThai']==1)
                                            <a href="{{ route('chitietdonhang',['id'=>$item['id']]) }}"><i class="fa fa-eye fa-2x"></i></a>
                                        @elseif($item['TrangThai']==2)
                                            <a href="{{ route('chitietdonhang',['id'=>$item['id']]) }}"><i class="fa fa-eye fa-2x"></i></a>
                                        @endif
                                       
                                    
                                    </td>
                                @endforeach
                              
                           </tr>
                                
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
           
        </div>
        @if(Count($dshdb)<=0)
        
        @else
            <div class="pagination d-flex justify-content-center">
                {{ $dshdb->links() }}
            </div>
        @endif
    </section>
    <!-- Shop Cart Section End -->
    </section>
@endsection