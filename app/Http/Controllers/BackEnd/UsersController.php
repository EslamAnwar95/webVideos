<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;

class UsersController extends BackEndController
{
    public function __construct(User $model)
    {
        Parent::__construct($model);
    }

   
    protected function filter($users)
    {
        if(request()->has('name') && request()->get('name') != '' ) {

            $users = $users->where('name', request()->get('name'));
        }

        return $users;
    }
   

    public function store(Store $request){
        $requestArray = $request->all();
        $requestArray['password'] =  Hash::make($requestArray['password']);
       $this->model->create($requestArray);
        
        return redirect()->route('users.index');
       
    }

    

    public function update($id,Update $request){
     
        $user = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        // dd($requestArray);
        // if(request()->has('password') && request()->get('password') != '' ){
            if(isset($requestArray['password']) && $requestArray['password'] != '' ){

            // $requestArray = $requestArray +  ['password' => Hash::make($request->password)];

            $requestArray['password'] =  Hash::make($requestArray['password']);
        }else {
            unset($requestArray['password']);
        }

        $user->update($requestArray);
        return back();
    }

   
}
