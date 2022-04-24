<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;
use App\Models\Cart;

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
    public function detail(Customer $customer){
        return view('admin.cart.detail',[
            'title' => 'Đơn hàng của ' .$customer->name,
            'customer' => $customer,
            'products' => $customer->carts()->get()
        ]);
    }
}
