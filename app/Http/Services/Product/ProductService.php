<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }
    protected function isValidPrice($request){
        if($request->input('price') < $request->input('price_sale')){
            Session::flash('error', 'Giá giảm phải nhỏ hơn hoặc bằng giá gốc');
            return false;
        }
        if($request->input('price') < 0 && $request->input('price_sale') < 0){
            Session::flash('error', 'Giá không hợp lệ do < 0');
            return false;
        }
        return true;
    }
    public function create($request){
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice){
            try {
//                $request->except('_token');
                Product::create([
//                    $request->all()
                    'name' => (string) $request->input('name'),
                    'menu_id' => (string) $request->input('menu_id'),
                    'description' => (string) $request->input('description'),
                    'content' => (string) $request->input('content'),
                    'active' => (string) $request->input('active'),
                    'price' => (string) $request->input('price'),
                    'price_sale' => (string) $request->input('price_sale'),
                    'thumb' => (string) $request->input('thumb'),
                ]);

                Session::flash('success','Thêm sản phẩm thành công');
            } catch (\Exception $err){
                Session::flash('error','Thêm sản phẩm lỗi');
                \Log::info($err->getMessage());
                return false;
            }
            return true;
        }
        else return false;
    }
}
