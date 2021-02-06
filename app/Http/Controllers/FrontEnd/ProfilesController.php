<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function profile($id, $slug =null){

        $user=User::findOrFail($id);
        return view('front-end.profiles.index', compact('user'));
    } //end of profile

    public function update($id, $slug=null, Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'password' => ['confirmed'],
        ]);

        $user=User::findOrFail($id);
        $request_data=$request->except(['password' , 'image']);
        // store image
        if ($request->image){

            if($user->image != 'default.png'){
                Storage::disk('public_uploads')->delete('/user_images/'. $user->image);
            }

            $this->uploadImage($request);

            $request_data['image'] = $request->image->hashName();
        } //end of if


        if($request->has('password') && $request->get('password') != ''){

            $request_data += ['password' => Hash::make($request->password)];
        }

        $user->update($request_data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('front.profile', ['id'=>$id]);
    }

    protected function uploadImage($request){

        \Intervention\Image\Facades\Image::make($request->image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('uploads/user_images/'. $request->image->hashName()));
    }
}
