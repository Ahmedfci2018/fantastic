<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $comments = Comment::orderBy('id', 'desc')->paginate(5);
        return view('back-end.home', compact('comments'));
    }//end of index
}
