<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductService
{

    const LIMIT = 12;

    public function get($page = null){
        // fix lỗi load chưa hết sản phẩm
        return Product::select('id','name', 'price', 'price_sale', 'thumb')
            ->orderByDesc('id')
            ->when($page != null, function($query) use ($page){
                $query->offset($page * $this::LIMIT);
            })
            ->limit($this::LIMIT)
            ->get();
    }

}
