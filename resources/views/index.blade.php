@extends('layout')
@section('content')
@include('slide')
   <section>
        <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Categories Section Begin -->
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*"> <a href="{{ route('home') }}">All</a></li>
                    @foreach ($loaisp as $item)
                    <li data-filter=".{{ $item->id }}"><a href="{{ route('showbycategory', ['id' => $item->id]) }}">{{ $item->TenLoai }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            @foreach($sp as $data)
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $data->id }}">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ $data->Anh }}">
                        <div class="label new">New</div>
                        <ul class="product__hover">
                            <li><a href="/access/img/product/bánh đa.jfif"class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span data-url="{{ route('addtocart',['id'=>$data->id]) }}" class="icon_bag_alt add_to_cart"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{ route('detail',['id'=>$data->id]) }}">{{ $data -> TenSanPham }}</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">{{ number_format($data->GiaBan) .' VNĐ' }}</div>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>  
           
    </div>
    <div class="pagination d-flex justify-content-center">
        {{ $sp->links() }}
    </div>
    </section>
   
    <!-- Product Section End -->

    <!-- Banner Section Begin -->
    <section class="banner set-bg" data-setbg="/access/img/banner/dai-dien-9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Banner Section End -->

    <!-- Trend Section Begin -->
    <section class="trend spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Hot Trend</h4>
                    </div>
                    @foreach ($spchay as $item)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img style="width:100px;height:100px;" src="{{ $item->Anh }}" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>{{ $item->TenSanPham }}</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">{{ number_format($item->GiaBan) }} đ</div>
                        </div>
                    </div>
                    @endforeach
                    
                   
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Best seller</h4>
                    </div>
                    @foreach ($spbanchay as $item)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            
                            <a href=" {{ route('detail',['id'=>$item->id]) }}"><img style="width:100px;height:100px;" src="{{ $item -> Anh }}" alt=""></a>
                        </div>
                        <div class="trend__item__text">
                           
                            <h6><a style="color: black;" href=" {{ route('detail',['id'=>$item->id]) }}">{{ $item->TenSanPham }}</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">{{ number_format($item->GiaBan) }} đ</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Feature</h4>
                    </div>
                    @foreach ($spp as $item)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img style="width:100px;height:100px;" src="{{ $item -> Anh }}" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>{{ $item -> TenSanPham }}</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">{{ number_format($item->GiaBan) }} đ</div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Trend Section End -->

    <!-- Discount Section Begin -->
    <section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="/access/img/banner/bannerdoan.jfif" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2019</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Discount Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Services Section End -->

    <!-- Instagram Begin -->
    <div class="instagram">
    <div class="container-fluid">
        <div class="row">
           
                @foreach ($spa as $item)
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ $item->Anh }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ hvn_shop</a>
                    </div>
                </div>
            </div>
                @endforeach
               
         
           
        </div>
    </div>
    </div>
    <!-- Instagram End -->

   </section>

@endsection