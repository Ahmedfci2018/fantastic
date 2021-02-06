<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Latestnew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LatestnewsController extends BackEndController
{
    public function __construct(Latestnew $model)
    {
        parent::__construct($model);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'name' => ['required', 'string', 'max:191'],
            'date' => ['required'],
            'description' => ['required', 'min:10'],
            'image' => ['image'],
        ]);

        $request_data=$request->except(['image']);

        // store image
        if ($request->image){

            $this->uploadImage($request, 'uploads/news_images/',600);

            $request_data['image'] = $request->image->hashName();
        } //end of if
        else
        {
            $request_data['image'] = "default.png";
        }
        $this->model->create($request_data);

        //
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('latestnews.index');
    } //end of store

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'name' => ['required', 'string', 'max:191'],
            'date' => ['required'],
            'description' => ['required', 'min:10'],
            'image' => ['image'],
        ]);

        $latestnew=Latestnew::findOrFail($id);
        $request_data=$request->except(['image']);

        // store image
        if ($request->image){

            if($latestnew->image != 'default.png'){
                Storage::disk('public_uploads')->delete('/news_images/'. $latestnew->image);
            }

            $this->uploadImage($request,'uploads/news_images/', 600);

            $request_data['image'] = $request->image->hashName();
        } //end of if
        $latestnew->update($request_data);


        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('latestnews.index');

    }//end of update

}
