<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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
//        dd($this->menuService->getAll()->toArray());
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
}
