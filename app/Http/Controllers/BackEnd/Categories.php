<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\Category;
use App\Http\Requests\BackEnd\Categories\Store;
use App\Http\Controllers\BackEnd\BackEndController;

class Categories extends BackEndController
{
    
    
    public function __construct(Category $model)
    {
        Parent::__construct($model);
    }


    public function store(Store $request){
        
       $this->model->create($request->all());
        return redirect()->route('categories.index');
       
    }


    
    public function update($id,Store $request){

        $user = $this->model->FindOrFail($id);
        $user->update($request->all());
        return back();
    }
}
