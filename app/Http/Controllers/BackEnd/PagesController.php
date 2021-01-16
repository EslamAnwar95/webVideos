<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Pages\Store;

class PagesController extends BackEndController
{
    public function __construct(Page $model)
    {
        Parent::__construct($model);
    }


    public function store(Store $request){
        
       $this->model->create($request->all());
        return redirect()->route('pages.index');
       
    }


    
    public function update($id,Store $request){

        $user = $this->model->FindOrFail($id);
        $user->update($request->all());
        return back();
    }
}
