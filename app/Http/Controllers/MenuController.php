<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $MenuService){
        $this->menuService = $MenuService;
    }

    public function index(Request $request, $id, $slug = ''){
        $menu = $this->menuService->getById($id);
        $products = $this->menuService->getProducts($menu, $request);
        return view('menu', [
            'title' => $menu->name,
            'products' => $products,
            'menu' => $menu
        ]);
    }
}
