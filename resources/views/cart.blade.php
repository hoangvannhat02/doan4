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

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table class="update_cart_url" data-url="{{ route('updatecart') }}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="deletecart_url" data-url="{{ route('deletecart') }}">
                              @if (is_countable($carts))
                              @foreach ($carts as $id => $item)
                              <tr>
                               <td>{{ $id }}</td>
                               <td class="cart__product__item">
                                   <img style="width:100px;heigth:100px;" src="{{ $item['image'] }}" alt="">
                                   <div class="cart__product__item__title">
                                       <h6>{{ $item['productname']}}</h6>
                                       <div class="rating">
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                           <i class="fa fa-star"></i>
                                       </div>
                                   </div>
                               </td>
                               <td class="cart__price">{{ number_format($item['price']) .'VND' }}</td>
                               {{-- <form method="GET" action="{{ route('updatecart',['id'=>$id]) }}">
                                   @csrf --}}
                               <td class="cart__quantity">
                                   <div class="pro-qty">
                                       <input type="text" minlength="1" name="quantity" value="{{ $item['quantity'] }}">  
                                   </div>                        
                               </td>
                               {{-- </form> --}}
                               <td class="cart__total">{{ number_format($item['price']*$item['quantity']) .'VND' }}</td>
                               <td class="cart__close d-flex"><span class="icon_close mr-2 delete_cart" data-id="{{ $id }}"></span><button id="update_cart" data-id="{{ $id }}" class="btn btn-danger update_cart">Update</button></td>
                           </tr>
                              @endforeach
                              @else
                                <tr>
                                    <td>
                                        Không có sản phẩm trong giỏ hàng    
                                    </td>
                                </tr> 
                           
                              @endif
                               
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
          
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span> @php
                                $sum = 0;
                                $cart = session()->get('cart',[]);
                                if(is_countable($cart)){
                                    foreach ($cart as $x) {
                                    $sum += $x['quantity'] * $x['price'];
                                    } 
                                }
                                
                                echo number_format($sum).'VNĐ';
                            @endphp</span></li>
                            <li>Total <span>@php echo number_format($sum).'VNĐ' @endphp</span></li>
                         
                        </ul>
                        <a href="{{ route('hoadon') }}"  class="primary-btn mb-2">Đơn hàng của bạn</a>
                        <a href="{{ route('checkout') }}"  class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
    </section>
@endsection