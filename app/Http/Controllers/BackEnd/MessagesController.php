<?php

namespace App\Http\Controllers\BackEnd;


use App\Mail\ReplayContact;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function replay($id, Request $request){
        $request->validate([
           'replayMessage'=>['required']
        ]);

        $oldMessage =$this->model->findOrFail($id);
        Mail::send(new ReplayContact($oldMessage, $request->replayMessage));
        return redirect()->route('messages.edit', $oldMessage->id);
    }
}
