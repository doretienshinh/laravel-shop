<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{

    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }

    public function index(){
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function create(){
        return view('admin.menu.add',
        [
            'title' => 'Thêm danh mục mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request){
         $results = $this->menuService->create($request);

         return redirect()->back();
    }

    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->menuService->destroy($request);

        if($result){
            return response()->json([
               'error' => false,
                'message'=> 'Xóa thành công danh mục'
            ]);
        }
        else return response()->json([
            'error' => true,
        ]);
    }

    public function show(Menu $menu){
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục - ' .$menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request){

        $this->menuService->update($request, $menu);

        return redirect(route('admin.menus.list'));
    }
}
