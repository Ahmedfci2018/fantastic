<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Tag;
use Illuminate\Http\Request;


class TagsController extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:191'],
        ]);

        Tag::create([
            'name' => $request->name,
        ]);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('tags.index');
    } //end of store

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
        ]);

        $tag->update($request->all());

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('tags.index');

    }//end of update
}
