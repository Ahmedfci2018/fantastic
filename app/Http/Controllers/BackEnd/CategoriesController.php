<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CategoriesController extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'meta_keywords' => ['max:191'],
            'meta_desc' => ['max:191'],
        ]);

        Category::create([
            'name' => $request->name,
            'meta_keywords' => $request->meta_keywords,
            'meta_desc' => $request->meta_desc,
        ]);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('categories.index');
    } //end of store

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'meta_keywords' => ['max:191'],
            'meta_desc' => ['max:191'],
        ]);

        $category->update($request->all());

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('categories.index');

    }//end of update

}
