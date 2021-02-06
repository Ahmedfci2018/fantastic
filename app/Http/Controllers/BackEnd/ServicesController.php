<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends BackEndController
{
    public function __construct(Service $model)
    {
        parent::__construct($model);
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'description' => ['required', 'min:10'],
            'image' => ['image'],
        ]);

        $request_data=$request->except(['image']);

        // store image
        if ($request->image){

            $this->uploadImage($request, 'uploads/service_images/',600);

            $request_data['image'] = $request->image->hashName();
        } //end of if
        else
        {
            $request_data['image'] = "default.png";
        }
        $this->model->create($request_data);

        //
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('services.index');
    } //end of store

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'description' => ['required', 'min:10'],
            'image' => ['image'],
        ]);

        $request_data=$request->except(['image']);

        // store image
        if ($request->image){

            if($service->image != 'default.png'){
                Storage::disk('public_uploads')->delete('/service_images/'. $service->image);
            }

            $this->uploadImage($request,'uploads/service_images/', 600);

            $request_data['image'] = $request->image->hashName();
        } //end of if
        $service->update($request_data);

        //
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('services.index');

    }//end of update

}
