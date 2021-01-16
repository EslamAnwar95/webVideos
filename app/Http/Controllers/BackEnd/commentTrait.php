<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Comment;

trait commentTrait  {

    public function commentStore(Store $request) {
        
        $requestArray = $request->all() + ['user_id' => auth()->user()->id];
      
        Comment::create($requestArray);

       
        return redirect()->route('videos.edit', ['video' => $requestArray['video_id'] ,'#comments']);
    }


    public function commentDelete($id) {

        $comment = Comment::findOrFail($id);

        $comment->delete();

        return redirect()->route('videos.edit' , ['video' => $comment->video_id ,'#comments' ]);
    }  
    
    

    public function commentUpdate($id,Store $request){

        $comment = Comment::findOrFail($id);

        $comment->update($request->all());
        // dd($comment->video_id);
        return redirect()->route('videos.edit' , ['video' => $comment->video_id ,'#comments' ]);
    }   
}