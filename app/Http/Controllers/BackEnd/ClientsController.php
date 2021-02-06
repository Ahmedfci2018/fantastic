<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Client;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientsController extends BackEndController
{
    public function __construct(Client $model)
    {
        parent::__construct($model);
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'image' => ['image'],
        ]);

        $request_data=$request->except(['image']);

        // store image
        if ($request->image){

            $this->uploadImage($request, 'uploads/client_images/',600);

            $request_data['image'] = $request->image->hashName();
        } //end of if
        else
        {
            $request_data['image'] = "default.png";
        }
        $this->model->create($request_data);

        //
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('clients.index');
    } //end of store

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'image' => ['image'],
        ]);

        $request_data=$request->except(['image']);

        // store image
        if ($request->image){

            if($client->image != 'default.png'){
                Storage::disk('public_uploads')->delete('/client_images/'. $client->image);
            }

            $this->uploadImage($request,'uploads/client_images/', 600);

            $request_data['image'] = $request->image->hashName();
        } //end of if
        $client->update($request_data);

        //
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('clients.index');

    }//end of update

}
