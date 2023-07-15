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
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
        <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
                </div>
            </div>
            <form action="{{ route('addbill',['id'=>$listkh['id']]) }}" class="checkout__form" method="POSt">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Full Name <span>*</span></p>
                                    <input type="text" name="HoVaTen" value="{{ $listkh['HoVaTen'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" name="DiaChi" value="{{ $listkh['DiaChi'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Địa chỉ nhận <span>*</span></p>
                                    <input name="DiaChiNhan" type="text" required>
                                </div>
                                
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input name="SoDienThoai" value="{{ $listkh['SoDienThoai'] }}" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input name="Email" value="{{ $listkh['Email'] }}" type="text" readonly>
                                </div>
                            </div>

                            
                            
                        </div>
                
                       
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>Your order</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    
                                    <li>
                                        <span class="top__text">Product</span>
                                        <span class="top__text__right">Total</span>
                                    </li>
                                    @foreach ($carts as $item)
                                        <li>{{ $item['productname'] }} <span>{{ number_format($item['price']*$item['quantity']) }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Subtotal <span>@php
                                        $sum = 0;
                                        $cart = session()->get('cart');
                                        foreach ($cart as $x) {
                                            $sum += $x['quantity'] * $x['price'];
                                        } 
                                        echo number_format($sum).'VNĐ';
                                    @endphp</span></li>
                                    <li>Total <span>@php echo number_format($sum).'VNĐ';
                                        @endphp</span></li>
                                </ul>
                            </div>
                            
                            <button type="submit" class="site-btn">Place oder</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->

      
@endsection