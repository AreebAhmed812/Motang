<?php

namespace App\Http\Controllers;

use App\Models\ModelManagements;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoremodelManagementsRequest;
use App\Http\Requests\UpdatemodelManagementsRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Attachment;
use App\Models\Year;

class ModelManagementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->section = new \stdClass();
        $this->section->title = 'Model';
        $this->section->heading = 'Model';
        $this->section->slug = 'model';
        $this->section->folder = 'model';
    }
    public function index(Request $request) 
    {
        if ($request->header('Accept') == 'application/json') {
            // API request
            return response()->json(['message' => 'Model Data', 'data' =>ModelManagements::all()]);
        } 
        checkPermission('read-user');
        $section = $this->section;
        // $users = User::with('role')->get();
        $model_managements = ModelManagements::with('brand')->get();
     
        return view($section->folder.'.index', compact('model_managements', 'section'));
    }
    public function create()
    {
        checkPermission('create-user');
        $ads = [];
        $section = $this->section;
        $section->heading = 'Model';
        $section->title = 'Add Model';
        $section->method = 'POST';
        $brands_name = brand::pluck('brand_name',
        'id')->toArray();
        $section->route = $section->slug.'.store';
        $modelManagements = ModelManagements::pluck('model','id')->toArray();
        // $roles = Role::pluck('name', 'id')->toArray();
        // dd($roles);
        return view($section->folder.'.form',compact('section', 'modelManagements','brands_name'));
    }
    public function store(Request $request)
    {
        
        $section = $this->section;
        //define custom validation messages for validator
        $validationMessages = [
            'modelManagements.unique' => 'model is already exist.',
            
        ];
        // validate user input
        $validator = Validator::make($request->all(), [
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'price' => 'required|int|unique:ads,price',
            // 'phone_number' => 'required|int|unique:ads,phone_number',
            // 'year_id' => 'required|string|unique:ads,year_id'
        ], $validationMessages);

       // Validation fails
        if ($validator->fails()) {
            if ($request->header('Accept') == 'application/json') {
                $data['code']=400;
                $data['message']=$validator->errors()->first();
                return response()->json($data);
            } else {
                // If it's a web request, redirect back with validation errors
                return redirect()->back()->withInput($request->input())->withErrors($validator);
            }
        }
        else{
            $modelManagements = ModelManagements::create($request->all());
            if ($request->header('Accept') == 'application/json') {
                $data['code']=200;
                $data['message']='Successfully created';
                $data['data'] =   $modelManagements;
                return response()->json($data);
            } 
                $request->session()->flash('flash_message', 'Record has been added successfully.');
                return redirect()->route($section->slug.'.index');
            }
    }
    public function edit($id)
    {
        checkPermission('update-user');

        // $id = Crypt::decrypt($id);
      
        $section = $this->section;
        $section->heading = 'Model';
        $section->title = 'Edit Model';
        $section->method = 'PUT';
        $section->route = [$section->slug.'.update', $id];
        // $modelManagements = ModelManagements::pluck('model',
        // 'id')->toArray();
        // $roles = Role::pluck('ads', 'id')->toArray();
        $brands_name = brand::where('id', $id)->first();
        $modelManagements = ModelManagements::where('id', $id)->first();
        // dd($year_ads);
        return view($section->folder.'.form', compact('modelManagements', 'section'));
    }
    public function update(Request $request,$modelManagements_id)
    {
        $modelManagements = ModelManagements::where('id', $modelManagements_id)->first();
        // dd($modelManagements);
        // $this->checkPermission('edit-modules');
        $section = $this->section;
        if($modelManagements){
        $validationMessages = [
            'name.unique' => 'User name already exist. Please enter a unique username',
            'email.unique' => 'Email already exist. Please enter a unique email',
        ];
        $validator = Validator::make($request->all(), [
            'model' => 'required|string|unique:model_managements,model,'. $modelManagements->id . ',id',
        ], $validationMessages);
        if ($validator->fails()) {
            // If it's an API request, return JSON response
            
            if ($request->header('Accept') == 'application/json') {
                    return response()->json(['message' => $validator->errors()->first()], 422);
                } else {
                    // If it's a web request, redirect back with validation errors
                    return redirect()->back()->withInput($request->input())->withErrors($validator);
                }
        }
        else{
                $modelManagements->update($request->all());
                if ($request->header('Accept') == 'application/json') {
                    $data['code']=200;
                    $data['message']='Successfully Updated data';
                    $data['data'] =   $modelManagements;
                    
                    return response()->json($data);
                } 
                $request->session()->flash('alert-success', 'Record has been updated successfully.');
                return redirect()->route($section->slug . '.index');
        }
    }
    else{
        $data['code']=400;
        $data['message']='Something went wrong';
        
        return response()->json($data);
    }
    }
    public function show($id)
    {
        $modelManagements = ModelManagements::where('id', $id)->first();
        // dd($id);
        // $brands = Brand::where('id', $id)->first();
        if($modelManagements){
            $data['code']=200;
            $data['message']='Search Results';
            $data['data'] =   $modelManagements;
            return response()->json($data);
        }
        else{
            $data['code']=400;
            $data['message']='Something went wrong';
            return response()->json($data);
        }
        }
    public function destroy(Request $request,$modelManagements)
    {
        // dd($ads);
        $modelManagements = ModelManagements::where('id', $modelManagements)->first();
        if ($request->header('Accept') == 'application/json') {
            if($modelManagements){
                $modelManagements->delete();
                $data['code']=200;
                $data['message']='Successfully deleted';
             
                return response()->json($data);
            }
            else{
            $data['code']=400;
            $data['message']='Something went wrong';
            return response()->json($data);
            }
            // return response()->json($data);
        } 
        if ($modelManagements) {
        $section = $this->section;
        $modelManagements->delete();
        request()->session()->flash('alert-success', 'Record has been deleted successfully.');
        return redirect()->route($section->slug.'.index');
    } else {
        // Handle the case where the brand with the given ID is not found
        // You may want to redirect back with an error message or handle it in another way.
    }
    }
}