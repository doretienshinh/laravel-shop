<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService){
        $this->cartService = $cartService;
    }

    public function index(){
        $result = $this->cartService->getAllCustomer();
        return view('admin.cart.list',[
            'title' => 'Danh sách đặt hàng',
            'customers' => $result
        ]);
    }
}
