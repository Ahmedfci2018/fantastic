<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Page;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidersController extends BackEndController
{
    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }


    public function store(Request $request)
    {

        $request->validate([
           
            'image' => ['image'],
        ]);

        $request_data=$request->except(['image']);

        // store image
        if ($request->image){

            $this->uploadImage($request, 'uploads/slider_images/',800);

            $request_data['image'] = $request->image->hashName();
        } //end of if
        else
        {
            $request_data['image'] = "default.png";
        }
        $this->model->create($request_data);

        //
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('sliders.index');
    } //end of store

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => ['image'],
        ]);

        $request_data=$request->except(['image']);

        // store image
        if ($request->image){

            if($slider->image != 'default.png'){
                Storage::disk('public_uploads')->delete('/slider_images/'. $slider->image);
            }

            $this->uploadImage($request,'uploads/slider_images/', 800);

            $request_data['image'] = $request->image->hashName();
        } //end of if
        $slider->update($request_data);

        //
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('sliders.index');

    }//end of update

}
