<?php
namespace App\Http\Controllers\BackEnd;

use App\Models\Comment;
use Illuminate\Http\Request;

trait CommentTrait{

    public function commentStore(Request $request){
        $request->validate([
            'comment'=> 'required',
        ]);
        $request_data= $request->all() + ['user_id'=> auth()->user()->id];
        Comment::create($request_data);
        return redirect()->route('videos.edit', ['id' =>$request_data['video_id'], '#comment']);
    } //end of commentStore

    public function commentUpdate(Request $request , $id){
        $request->validate([
            'comment'=> 'required',
        ]);
        $request_data= $request->all() + ['user_id'=> auth()->user()->id];
        $comment = Comment::findOrFail($id);
        $comment->update($request_data);
        return redirect()->route('videos.edit', ['id' =>$request_data['video_id'], '#comment']);
    } //end of commentStore

    public function commentDelete($id){

        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('videos.edit', ['id' =>$comment->video_id, '#comment']);
    }
}
