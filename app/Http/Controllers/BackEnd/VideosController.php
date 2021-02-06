<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\Category;
use App\Models\Comment;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

class VideosController extends BackEndController
{
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    use CommentTrait;
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'meta_keywords' => ['max:191'],
            'meta_desc' => ['max:191'],
            'description' => ['required', 'min:10'],
            'youtube' => ['required', 'string'],
            'image' => ['image'],
        ]);

        $request_data = $request->except('image') + ['user_id' => auth()->user()->id ];

        // store image
        if ($request->image){
            $this->uploadImage($request);
            $request_data['image'] = $request->image->hashName();
        } //end of if

        $row = $this->model->create($request_data);

        // store skills
        if(isset($request_data['skills']) && !empty($request_data['skills'])){
            $row->skills()->sync($request_data['skills']);
        } //end if

        //store tags
        if(isset($request_data['tags']) && !empty($request_data['tags'])){
            $row->tags()->sync($request_data['tags']);
        } //end if

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('videos.index');
    } //end of store

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'meta_keywords' => ['max:191'],
            'meta_desc' => ['max:191'],
            'description' => ['required', 'min:10'],
            'youtube' => ['required', 'string'],
            'image' => ['image'],
        ]);

        $request_data =  $request->except(['image']);

        // store image
        if ($request->image){

            if($video->image != 'default.png'){
                Storage::disk('public_uploads')->delete('/video_images/'. $video->image);
            }
            $this->uploadImage($request);

            $request_data['image'] = $request->image->hashName();
        } //end of if


        $video->update($request_data);

        if(isset($request_data['skills']) && !empty($request_data['skills'])){
            $video->skills()->sync($request_data['skills']);
        } //end if

        if(isset($request_data['tags']) && !empty($request_data['tags'])){
            $video->tags()->sync($request_data['tags']);
        } //end if

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('videos.index');
    }//end of update

    protected function append()
    {
        $array =[
            'categories'=> Category::get(),
            'skills'=> Skill::get(),
            'tags'=> Tag::get(),
            'comments'=> [],

            'selected_skills'=> [],
            'selected_tags'=> [],
        ];

        if(\request()->route()->parameter('video')){
            $array['selected_skills'] = $this->model->find(\request()->route()->parameter('video'))->skills()->get()->pluck('id')->toArray();

            $array['selected_tags'] = $this->model->find(\request()->route()->parameter('video'))->tags()->get()->pluck('id')->toArray();

            $array['comments'] = $this->model->find(\request()->route()->parameter('video'))->comments()->orderBy('id', 'desc')->get();
        }

        return $array;

    }

    public function destroy($id)
    {
        $row = $this->model->findOrFail($id);

        if($row->image != 'default.png'){

            Storage::disk('public_uploads')->delete('/video_images/'. $row->image);
        }
        $row->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route($this->getClassNameFromModel().'.index');

    } //end of destroy function


    public function uploadImage($request){

        \Intervention\Image\Facades\Image::make($request->image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('uploads/video_images/'. $request->image->hashName()));
    }

}
