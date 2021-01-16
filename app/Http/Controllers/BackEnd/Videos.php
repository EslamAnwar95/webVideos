<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BackEnd\Videos\Store;
use App\Http\Requests\BackEnd\Videos\Update;

class Videos extends BackEndController
{
    use commentTrait;

    public function __construct(Video $model)
    {
        Parent::__construct($model);
    }


    protected function with()
    {
        return ['cat', 'user'];
    }

    public function store(Store $request)
    {
       
        $fileName = $this->uploadImage($request);
        $requestArray =  ['user_id' => auth()->user()->id , 'image' => $fileName ] + $request->all() ;
      
        $user = $this->model->create($requestArray);
        // dd($user);
        $this->syncTagsSkills($user,$requestArray);

        return redirect()->route('videos.index');
    }



    public function update($id, Update $request)
    {
     

        $requestArray = $request->all();
        if($request->hasFile('image')) {

            $fileName = $this->uploadImage($request); 

            $requestArray = ['image' =>$fileName] + $requestArray;
        }
        $user = $this->model->FindOrFail($id);
        $user->update($requestArray);
        $this->syncTagsSkills($user,$requestArray);

        return back();
    }

    protected function append()
    {


        $array =  [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' =>Tag::get(),
            'selectedTags' => [],
            'selectedSkills' => [],
            'comments' => []
        ];

        if (request()->route()->parameter('video')) {

            $array['selectedSkills'] = Video::find(request()->route()->parameter('video'))
                ->skills()->pluck('skills.id')->toArray();
                
            $array['selectedTags'] = Video::find(request()->route()->parameter('video'))
            ->tags()->pluck('tags.id')->toArray();  
            
            $array['comments'] = Video::find(request()->route()->parameter('video'))
            ->comments()->orderBy('created_at','desc')->with('user')->get();  
        }

        return $array;
    }


    protected function syncTagsSkills($user,$requestArray){

        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {

            $user->skills()->sync($requestArray['skills']);
        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {

            $user->tags()->sync($requestArray['tags']);
        }
    }

    protected function uploadImage($request){

        $file = $request->file('image');      
        $fileName = time().Str::random('5').'.'.$file->getClientOriginalExtension();     
        $file->move(public_path('uploads'),$fileName);
        return $fileName;
    }
}
