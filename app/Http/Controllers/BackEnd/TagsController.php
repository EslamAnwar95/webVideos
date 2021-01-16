<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Tags\Store;

class TagsController extends BackEndController
{
    public function __construct(Tag $model)
    {
        Parent::__construct($model);
    }


    public function store(Store $request){
        
       $this->model->create($request->all());
        return redirect()->route('tags.index');
       
    }


    
    public function update($id,Store $request){

        $user = $this->model->FindOrFail($id);
        $user->update($request->all());
        return back();
    }
}
