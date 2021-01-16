<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Skills\Store;

class SkillsController extends BackEndController
{
    public function __construct(Skill $model)
    {
        Parent::__construct($model);
    }


    public function store(Store $request){
        
       $this->model->create($request->all());
        return redirect()->route('skills.index');
       
    }


    
    public function update($id,Store $request){

        $user = $this->model->FindOrFail($id);
        $user->update($request->all());
        return back();
    }
}
