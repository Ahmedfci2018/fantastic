<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function create()
    {
       return view('create');
    }

    public function store(Request $request)

    {

        $this->validate($request, [

            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if($request->hasfile('filename'))
        {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $data[] = $name;
            }
        }

        $form= new Form();
        $form->filename=json_encode($data);


        $form->save();

        return back()->with('success', 'Your images has been successfully');
    }

}
