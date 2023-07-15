<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\LoaiSanPhamModels;
use App\Models\sanpham;
use Illuminate\Pagination\Paginator;
use PHPUnit\Framework\Constraint\Count;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('header',function($view){
            $loaisp = LoaiSanPhamModels::all();
            $sumsl = 0;
       
            $listcart = session()->get('cart',[]); 
            if(is_countable($listcart)){
                foreach ($listcart as $key => $value) {
                    $sumsl += $value['quantity'];
                } 
            }
            $view->with('loaisp',$loaisp)
                ->with('sumsl',$sumsl);
        });

        view()->composer('category',function($view){
            $loaisp = LoaiSanPhamModels::all();
            $spa = sanpham::orderBy('id','desc')->take(6)->get();
            $view->with('loaisp',$loaisp)
                ->with('spa',$spa)
            ;
        });
        view()->composer('detail',function($view){
           
            $spa = sanpham::orderBy('id','desc')->take(6)->get();
            $view
                ->with('spa',$spa)
            ;
        });

        Paginator::useBootstrap();
    
    }
}
