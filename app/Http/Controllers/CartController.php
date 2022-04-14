<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
    }

    public function index(Request $request){
        $result = $this->cartService->create($request);

        // dd(Session::get('carts'));
        return redirect()->back();

        // if($result === false){
        //     return redirect()->back();
        // }
        // else{
        //     return redirect('/carts');
        // }
    }

    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }
}