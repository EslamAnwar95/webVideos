<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\BackEnd\Messages\Store;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Mail\ReplayContact;

class MessagesController extends BackEndController
{
    public function __construct(Message $model)
    {
        Parent::__construct($model);
    }

    public function replay($id, Store $request) {
        $contactMessage = $this->model->findOrFail($id);
        $replayMessage =  $request->message;
        Mail::send(new ReplayContact($contactMessage , $replayMessage));
        
        return redirect()->route('messages.edit',['id' =>$contactMessage->id ]);



    }
}
