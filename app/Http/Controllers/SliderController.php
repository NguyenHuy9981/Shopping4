<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateSlider;
use App\Slider;
use App\Straits\StraitUploadFile;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use StraitUploadFile;

    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    function index() {
        $sliders = $this->slider->paginate();
        return view('admin.slider.index', compact('sliders'));
    }

    function create() {

        return view('admin.slider.create');
    }

    function store(ValidateSlider $request) {
        $imageInput = $this->UploadFile($request, 'image_path', 'SLIDER');

        $this->slider->create([
            'name'	=>  $request['name'],
            'description' => $request['description'],
            'image_path' => $imageInput['feature_image'],
            'image_name' => $imageInput['feature_image_name']
        ]);

        return redirect(route('slider.index'));
    }

    function edit($id) {
        $slider = $this->slider->find($id);

        return view('admin.slider.edit', compact('slider'));
    }

    function update(ValidateSlider $request, $id) {
        $imageInput = $this->UploadFile($request, 'image_path', 'SLIDER');

        $slider = $this->slider->find($id)->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'image_path' => $imageInput['feature_image'],
            'image_name' => $imageInput['feature_image_name']
        ]);

        return redirect(route('slider.index'));
    }

    function delete($id) {

        $slider = $this->slider->find($id)->delete();
        return response()->json([
            'Huy' => 'Beautifull',
            'message' => 'success',
            
        ], 200);
        

    }
}
