<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function create($request){
        try {
//                $request->except('_token');
            Slider::create($request->input());

            Session::flash('success','Thêm slider thành công');
        } catch (\Exception $err){
            Session::flash('error','Thêm sslider lỗi');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function getAll(){
        return Slider::orderByDesc('id')->paginate(15);
    }

    public function update($request, $slider){
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success','Sửa sản phẩm thành công');
        } catch (\Exception $err){
            Session::flash('error','Sửa sản phẩm lỗi');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){
        $id = $request->input('id');
        $slider = Slider::where('id', $id)->first();
        if($slider){
            $path = str_replace('storage', 'public', $slider->thumb);
            Storage::delete($path);
            return Slider::where('id', $id)->delete();
        }
        else return false;
    }
}
