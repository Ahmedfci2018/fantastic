<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Category;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Latestnew;
use App\Models\Message;
use App\Models\Page;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::published()->orderBy('id' , 'desc');

        if(\request()->has('search') && \request()->get('search') !='')
        {
            $videos = $videos->where('name', 'like', "%".\request()->get('search')."%");
        }
        $videos=$videos->paginate(30);
        return view('home', compact('videos'));
    }

    public function category($id)
    {

        $videos = Video::published()->where('category_id', $id)->orderBy('id' , 'desc')->paginate(30);
        $category = Category::findOrFail($id);

        return view('front-end.categories.index', compact('videos', 'category'));
    }

    public function skill($id)
    {

        $videos = Video::published()->whereHas('skills', function ($query) use ($id){
            $query->where('skill_id', $id);
        })->orderBy('id' , 'desc')->paginate(30);
        $skill = Skill::findOrFail($id);

        return view('front-end.skills.index', compact('videos', 'skill'));
    }

    public function tags($id)
    {

        $videos = Video::published()->whereHas('tags', function ($query) use ($id){
            $query->where('tag_id', $id);
        })->orderBy('id' , 'desc')->paginate(30);
        $tag = Tag::findOrFail($id);

        return view('front-end.tags.index', compact('videos', 'tag'));
    }

    public function video($id)
    {
        $video = Video::published()->findOrFail($id);
        return view('front-end.videos.index', compact('video'));
    }

    public function commentStore($id, Request $request){
        $request->validate([
            'commentNew'=>['required', 'min:5', 'max:200']
        ]);
        $video = Video::published()->findOrFail($id);
        Comment::create([
            'user_id'=> auth()->user()->id,
            'video_id'=> $id,
            'comment'=> $request->commentNew,
        ]);
        return redirect()->route('front.video',['id'=>$video->id , '#comments']);
    }//end of store

    public function commentUpdate($id, Request $request){
        $request->validate([
           'comment'=>['required', 'min:5', 'max:200']
        ]);
        $comment = Comment::findOrFail($id);
        if(auth()->user()->group == 'admin' || auth()->user()->id == $comment->user_id){
            $comment->update(['comment'=>$request->comment]);
        }
        return redirect()->route('front.video',['id'=>$comment->video_id , '#comments']);
    }

    public function messageStore( Request $request){
        $request->validate([
            'name'=>['required', 'string'],
            'email'=>['required'],
            'subject'=>['required'],
            'message'=>['required', 'min:5', 'max:191'],
        ]);
        Mail::send('contact_email',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'phone_number' => $request->get('phone_number'),
            'user_message' => $request->get('message'),
        ), function($message) use ($request)
          {
             $message->from($request->email);
             $message->to('ahmedfci2018@gmail.com');
          });
        Message::create($request->all());
        session()->flash('success', __('site.messageSent_successfully'));
        return redirect()->back();
    }//end of message store

    public function welcome(){
        $sliders = Slider::all();
        $services = Service::all();

        $news = Service::limit(12)->paginate(6);
        // $news=$news->reverse()->values();


        $data = Project::limit(120)->paginate(18);
        $selectedTags = Project::limit(120)->groupBy('tag_id')->get();
        // $projects=$projects->reverse()->values();

        return view('welcome', compact('sliders', 'news','services', 'data','selectedTags'));
    }//end of welcome


    public function page($id, $slug=null){
        $page = Page::findOrFail($id);
        return view('front-end.pages.index', compact('page'));

    } // end of page


    // ==== makram ====

    public function all_project($id)
    {
        $title=Category::findOrFail($id)->name;

        if($id == 0){
            $projects = Project::all();
            $selectedTags = Project::groupBy('tag_id')->get();
            return view('front-end.projects.all_project',compact('title', 'projects', 'selectedTags'));

        }
        else
        {
            $projects = Project::where('category_id', $id)->get();
            $selectedTags = Project::where('category_id', $id)->groupBy('tag_id')->get();

            return view('front-end.projects.all_project',compact('title', 'projects', 'selectedTags'));
        }

    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
        $data = Project::limit(120)->paginate(18);
        $selectedTags = Project::limit(120)->groupBy('tag_id')->get();

      return view('front-end.pagination_data', compact('data','selectedTags'))->render();
     }
    }

    public function goToProject($id)
    {
        $project=Project::findOrFail($id);
        return view('front-end.projects.project', compact('project'));
    }

    public function goToNew($id)
    {
        $service=Service::findOrFail($id);
        return view('front-end.new', compact('service'));
    }
    public function about()
    {
        return view('front-end.about');
    }
    public function contact()
    {
        return view('front-end.contact');
    }

    public function services()
    {
        $rows = Service::paginate(6);
        return view('front-end.services', compact('rows'));
    }

    public function clients()
    {
        $clients = Client::all();
        return view('front-end.clients', compact('clients'));
    }

}
