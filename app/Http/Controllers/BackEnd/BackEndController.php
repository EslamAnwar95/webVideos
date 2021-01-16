<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;

    }

    public function index(){

        $users = $this->model;
        $users = $this->filter($users);
        $with = $this->with();
        if(!empty($with)){
            $users = $users->with($with);
        }
        $users = $users->paginate(10);
       
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        $folderName = $routeName;
        $pageTitle = $moduleName. ' Control';
        $pageDesc = 'Here u can edit / delete / add '.$moduleName;
        return view('back-end.'.$folderName.'.index',compact(
            'users',
            'moduleName',
            'pageTitle',
            'pageDesc',
            'sModuleName',
            'folderName',
            'routeName'
        ));
    }

    public function create(){

        $moduleName = $this->getModelName();
        $pageTitle =  ' Create '.$moduleName;
        $routeName = $this->getClassNameFromModel();
        $folderName = $routeName;
        $pageDesc = 'Here u can Create '.$moduleName;
        $append = $this->append();
        return view('back-end.'.$folderName.'.create',compact(
            'moduleName',
            'pageTitle',
            'pageDesc',
            'folderName',
            'routeName'
        ))->with($append);
    }

    public function destroy($id){

        $user = $this->model->find($id);

        $user->delete();

        return redirect()->route($this->getClassNameFromModel().'.index');

    }

    public function edit($id){       
        $user = $this->model->FindOrFail($id);
        $moduleName = $this->getModelName();
        $pageTitle = 'Edit '. $moduleName;
        $pageDesc = 'Here u can Edit '.$moduleName;
        $routeName = $this->getClassNameFromModel();
        $folderName = $routeName;
        $append = $this->append();
        return view('back-end.'.$folderName.'.edit', compact(
            'user',
            'moduleName',
            'pageTitle',
            'pageDesc',
            'folderName',
            'routeName'
        ))->with($append);
    }

    protected function with(){
        return [];
    }

    protected function filter($users)
    {
        return $users;
    }
    protected function getClassNameFromModel()
    {
        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName(){

        return Str::plural($this->getModelName());
    }

    protected function getModelName(){
        
        return class_basename($this->model);
    }

    protected function append(){
        return [];
    }
}
