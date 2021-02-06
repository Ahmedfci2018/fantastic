<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillsController extends BackEndController
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:191'],
        ]);

        Skill::create([
            'name' => $request->name,
        ]);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('skills.index');
    } //end of store

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
        ]);

        $skill->update($request->all());

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('skills.index');

    }//end of update
}
