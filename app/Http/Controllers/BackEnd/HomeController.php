<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends BackEndController
{

    public function __construct(User $model)
    {
        Parent::__construct($model);
    }
    
    public function index(){
        $comments = Comment::with('user','video')->orderBy('id','desc')->paginate(20);
        return view('back-end.home',compact('comments'));
    }
}
