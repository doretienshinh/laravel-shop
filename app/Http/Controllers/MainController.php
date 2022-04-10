<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;

class MainController extends Controller
{
    protected $slider;
    protected $product;

    public function __construct(SliderService $slider, ProductService $product){
        $this->slider = $slider;
        $this->product = $product;
    }
    public function index(){
        return view('home',[
            'title' => 'Shop của Linh :>',
            'sliders' => $this->slider->show(),
            'products' => $this->product->get()
        ]);
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }
}
