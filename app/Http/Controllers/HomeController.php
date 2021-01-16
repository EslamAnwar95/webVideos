<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Page;
use App\Models\User;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FrontEnd\Comments\Store;
use App\Http\Requests\FrontEnd\Users\Store as UsersStore;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
             'commentStore' , 'commentUpdate','updateProfile',
        ]);
    }

    public function index()
    {
        $videos = Video::published()->orderBy('id' , 'desc');
        if(request()->has('search') && request()->get('search') != ' '){
            $videos = $videos->where('name','like','%'.request()->get('search').'%');
        }
        $videos = $videos->paginate('30');
        return view('home' , compact('videos') );
    }


    public function category($id)
    {
        $category = Category::findOrFail($id);

        $videos = Video::published()->where('cat_id' , $id)->orderBy('id' , 'desc')->paginate('30');
        return view('front-end.category.index' , compact('videos' , 'category') );
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    


    public function skills($id)
    {
        $skill = Skill::findOrFail($id);
       
        $videos = Video::published()->whereHas('skills', function($query) use ($id) {
            $query->where('skill_id' , $id);
        })->orderBy('id' , 'desc')->paginate('30');
        return view('front-end.skill.index' , compact('videos' , 'skill') );
    }

    public function getVideo($id)
    {
        $video = Video::with('skills','tags','cat','user','comments.user')->findOrFail($id);              
        return view('front-end.video.index' , compact('video' ) );
    }

    public function tags($id){
        $tag = Tag::findOrFail($id);
        $videos = Video::published()->whereHas('tags', function($query) use ($id){
            $query->where('tag_id',$id);
        })->orderBy('id','desc')->paginate('30');
        return view('front-end.tag.index' , compact('videos' , 'tag') );
    }

    public function commentUpdate($id,Store $request) {
        $comment = Comment::findOrFail($id);
        // dd($comment);
        if(($comment->user_id == auth()->user()->id) || auth()->user()->group == 'admin' ) {
            $comment->update(['comment' => $request->comment]); 
            alert()->success('Your Comment Has Been Updated', 'Done');
        }  
        alert()->success('We Didn\'t found this Comment', 'Sorry');
        return redirect()->route('frontEnd.video', ['id'=> $comment->video_id , '#comment']);
    }

    public function commentStore($id,Store $request) {
        $video = Video::published()->findOrFail($id);
        // dd($comment);        
        $comment = Comment::create([
            'user_id' => auth()->user()->id,
            'video_id' => $video->id,
            'comment' => $request->comment
        ]);
        alert()->success('Your Comment has been added', 'Done');
        return redirect()->route('frontEnd.video', ['id'=> $comment->video_id , '#comment']);
    }

    public function messageStore(\App\Http\Requests\FrontEnd\Messages\Store $request) {
        
        Message::create($request->all());
        alert()->success('Your Message has been sent', 'Done');
        return redirect()->route('frontend.landing');
    }

    
    public function welcome() {
        $videos = Video::published()->orderBy('id' , 'desc')->paginate('12');
        $videosCount = Video::published()->count();
        $commentsCount = Comment::count();
        $tagsCount = Tag::count();
        return view('welcome' ,compact('videos','videosCount','commentsCount','tagsCount'));
    }


    public function page($id , $slug = null) {
        $page = Page::findOrFail($id);
        return view('front-end.pages.index' , compact('page'));
    }

    public function profile($id , $slug = null) {

        $user = User::findOrFail($id);
        return view('front-end.profile.index' , compact('user'));
    }

    public function updateProfile(UsersStore $request) {

        $user = User::findOrFail(auth()->user()->id);
        $array = [];
        if ($request->email != $user->email) {
            $email = User::where('email',$request)->first();
            if($email == null) {
                $array['email'] = $request->email;   
            }
            
        }

        if ($request->name != $user->name) {
            $array['name'] = $request->name;
        }

        if ($request->password != '') {
            $array['password'] = Hash::make($request->password);

        }
        if (!empty($array)){
            $user->update($array);
        }
        alert()->success('Your Profile has been Updated', 'Done');
        return redirect()->route('front.profile' , ['id'=>$user->id , 'slug' => slug($user->name)]);
    }


}

