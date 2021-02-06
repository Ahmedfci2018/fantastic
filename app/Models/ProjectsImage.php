<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectsImage extends Model
{
    protected $guarded=[];

    public function project(){
        return $this->belongsTo(Project::class);
    } // end of project
}
