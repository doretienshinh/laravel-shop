<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderRequest;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SliderController extends Controller
{

    protected $sliderService;

    public function __construct(SliderService $sliderService){
        $this->sliderService = $sliderService;
    }

    public function create(){
        return view('admin.sliders.add',
            [
                'title' => 'Thêm slide mới'
            ]);
    }

    public function store(SliderRequest $request)
    {
        $this->sliderService->create($request);
        return redirect()->route('admin.sliders.list');
    }

    public function index(){
        return view('admin.sliders.list',
            [
                'title' => 'Danh sách slide',
                'sliders' => $this->sliderService->getAll()
            ]);
    }

    public function show(Slider $slider){
        return View('admin.sliders.edit',[
            'title' => 'Chỉnh sửa slider ' .$slider->name,
            'slider' => $slider
            ]);
    }

    public function update(Slider $slider, SliderRequest $request)
    {
        $this->sliderService->update($request, $slider);

        return redirect(route('admin.sliders.list'));
    }
    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->sliderService->destroy($request);

        if($result){
            return response()->json([
                'error' => false,
                'message'=> 'Xóa thành slide'
            ]);
        }
        else return response()->json([
            'error' => true,
        ]);
    }
}
