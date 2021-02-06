<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded=['skills', 'tags'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    } // end of user

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    } //end of category

    public function skills(){
        return $this->belongsToMany(Skill::class, 'skills_videos');
    } //end of skills

    public function tags(){
        return $this->belongsToMany(Tag::class, 'tags_videos');
    } //end of tags

    public function comments(){
        return $this->hasMany(Comment::class);
    } //end of comments

    public function scopePublished(){
        return $this->where('published', 1);
    }
}
