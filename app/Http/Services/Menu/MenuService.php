<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use http\Env\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{

    public function getParent(){
        return Menu::where('parent_id', 0)->get();
    }
    public function getAll(){
        return Menu::orderbyDesc('id')->paginate(20);
    }
    public function create($request){
        try {
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (string) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
            ]);

            Session::flash('success','Tạo danh mục thành công');
        } catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){
        $id = $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if($menu){
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        else return false;
    }

    public function update($request, $menu): bool
    {
        $menu->fill($request->input());
        $menu->save();

        Session::flash('success','Cập nhật danh mục thành công');

        return true;
    }
    public function getById($id){
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getProducts($menu, $request){

        $query = $menu->products()
        ->select('id', 'name', 'price', 'price_sale', 'thumb')
        ->where('active', 1);

        if($request->input('price')){
            $query->orderBy('price', $request->input('price'));
        }
        
        return $query->orderBy('id')->paginate(12)->withQueryString();

    }
}