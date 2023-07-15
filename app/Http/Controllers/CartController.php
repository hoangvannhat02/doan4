<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;

class CartController extends Controller
{
    //
    public function ViewCart(){
        return View('cart');
    }
    public function AddToCart(){
        cart::add(
            [
                
            ]
            );
    }
}
