<?php

namespace App\Http\View\Composers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CartComposer
{
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if(is_null($carts)) 
            $view->with('product_carts', null);
        else{
            $productId = array_keys($carts);
            $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
            $view->with('product_carts', $products);
        }
    }
}
