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
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    @foreach($tintuc as $item)
                    <div class="blog__item">
                        <div class="blog__item__pic large__item set-bg" data-setbg="{{ $item->Anh }}"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">{{ $item->TieuDe }}</a></h6>
                            <ul>
                                <li>by <span>{{ $item->HoTen }}</span></li>
                                <li>{{ $item -> NgayTao }}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    
                   
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="https://cdn.tgdd.vn/Files/2020/09/07/1287894/muc-bento-gia-bao-nhieu-mua-muc-bento-o-dau-vua-re-vua-chat-luong-202009071028275580.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">🦑 Khô mực BenTo Thái Lan.</a></h6>
                            <ul>
                                <li>by <span>Ema Timahe</span></li>
                                <li>Seb 17, 2019</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="https://chiaki.vn/upload/news/content/2022/12/banh-mix-dai-loan-jpg-1669956558-02122022114918.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">🍰 BÁNH MIX ĐÀI LOAN NGON XỊN MỊN 🍰</a>
                            </h6>
                            <ul>
                                <li>by <span>Ema Timahe</span></li>
                                <li>Seb 17, 2019</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="/access/img/blog/blog-8.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">Kim Kardashian Steps Out In Paris Wearing Shocking Sparkly...</a></h6>
                            <ul>
                                <li>by <span>Ema Timahe</span></li>
                                <li>Seb 17, 2019</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="/access/img/blog/blog-10.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">A-list Battle! Angelina Jolie & Lady Gaga Fighting Over Who...</a></h6>
                            <ul>
                                <li>by <span>Ema Timahe</span></li>
                                <li>Seb 17, 2019</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="https://cf.shopee.vn/file/b0fa3ac60c97ef337ff83a8d0f1500af"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">Hãy hưởng thụ cuộc sống bằng việc...
                                </a></h6>
                            <ul>
                                <li>by <span>Ema Timahe</span></li>
                                <li>Seb 17, 2019</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="https://comlangvong.com.vn/wp-content/uploads/2019/05/com-tuoi-lang-vong.png"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">🌾🌾 QUÀ HÀ NỘI
                                CỐM LÀNG VÒNG – TIỆM CÔ MẬN</a></h6>
                            <ul>
                                <li>by <span>Ema Timahe</span></li>
                                <li>Seb 17, 2019</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic large__item set-bg" data-setbg="/access/img/blog/blog-6.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">Stephanie Pratt Busts Out Of Teeny Black Bikini During Hawaii...</a></h6>
                            <ul>
                                <li>by <span>Ema Timahe</span></li>
                                <li>Seb 17, 2019</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <a href="#" class="primary-btn load-btn">Load more posts</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="/access/img/instagram/insta-1.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="/access/img/instagram/insta-2.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="/access/img/instagram/insta-3.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="/access/img/instagram/insta-4.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="/access/img/instagram/insta-5.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="/access/img/instagram/insta-6.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram End -->
    </section>
@endsection