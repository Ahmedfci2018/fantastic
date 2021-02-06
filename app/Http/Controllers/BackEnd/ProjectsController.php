<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Page;
use App\Models\Project;
use App\Models\ProjectsImage;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends BackEndController
{
    public function __construct(Project $model)
    {
        parent::__construct($model);
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'code' => ['required'],
            'description' => ['required', 'min:10'],
            'image' => ['image'],
        ]);

        $request_data=$request->except(['image','catalog']);

        // store image
        if ($request->image){

            $this->uploadImage($request, 'uploads/project_images/',600);

            $request_data['image'] = $request->image->hashName();
        } //end of if
        else
        {
            $request_data['image'] = "default.png";
        }

        // store catalog
        if ($request->catalog){

            $fileName = time().'.'.$request->catalog->extension();

            $request->catalog->move(public_path('uploads/products_catalog'), $fileName);

            $request_data['catalog'] = $fileName;
        } //end of if

        $this->model->create($request_data);

        //
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('projects.index');
    } //end of store

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'code' => ['required'],
            'description' => ['required', 'min:10'],
            'image' => ['image'],
        ]);

        $request_data=$request->except(['image','catalog']);

        // store image
        if ($request->image){

            if($project->image != 'default.png'){
                Storage::disk('public_uploads')->delete('/project_images/'. $project->image);
            }

            $this->uploadImage($request,'uploads/project_images/', 600);

            $request_data['image'] = $request->image->hashName();
        } //end of if

         // store catalog
         if ($request->catalog){

            Storage::disk('public_uploads')->delete('/products_catalog/'. $project->catalog);

            $fileName = time().'.'.$request->catalog->extension();

            $request->catalog->move(public_path('uploads/products_catalog'), $fileName);

            $request_data['catalog'] = $fileName;
        } //end of if

        $project->update($request_data);

        //
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('projects.index');

    }//end of update


    public function images($id)
    {
        $module_name_plural=$this->getClassNameFromModel();
        $module_name_singular=$this->getSingularModelName();
        $rows = ProjectsImage::where('project_id',$id)->paginate(5);
        return view('back-end.project-images.index',compact('id','rows'));
    }

    public function createImages($id)
    {
        return view('back-end.project-images.create',compact('id'));
    }

    public function storeImages(Request $request)
    {
        $request->validate([
            'image' => ['image', 'required'],
        ]);

        $request_data = $request->except('image');

    
        // store image
        if ($request->image){
            $this->uploadImage($request,'uploads/project_images/', 600);
            $request_data['image'] = $request->image->hashName();
        } //end of if

        ProjectsImage::create($request_data);


        session()->flash('success', __('site.added_successfully'));
        return redirect()->back();

    }

    public function editImages($id)
    {
        $row = ProjectsImage::findOrFail($id);
        return view('back-end.project-images.edit',compact('row'));
    }

    public function updateImages($id, Request $request)
    {
        $request_data =  $request->except(['image']);
        $img =ProjectsImage::findOrFail($id);

        // store image
        if ($request->image){

            if($img->image != 'default.png'){
                Storage::disk('public_uploads')->delete('/project_images/'. $img->image);
            }
            $this->uploadImage($request,'uploads/project_images/', 600);

            $request_data['image'] = $request->image->hashName();
        } //end of if


        $img->update($request_data);


        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('projects.images', $img->project_id);
    }

    public function destroyImage($id)
    {
        $row = ProjectsImage::findOrFail($id);

        if($row->image != 'default.png'){

            Storage::disk('public_uploads')->delete('/project_images/'. $row->image);
        }
        $row->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->back();
    }

}
