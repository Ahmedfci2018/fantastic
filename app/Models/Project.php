<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    } //end of category

    public function tag(){
        return $this->belongsTo(Tag::class, 'tag_id');
    } //end of tag

    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    } //end of tag

    public function images(){
        return $this->hasMany(ProjectsImage::class);
    } //end of images
}
