<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Attachment;
use App\Models\Year;
use App\Models\ModelManagements;
class BrandController extends Controller
{
    //
    public function __construct()
    {
        $this->section = new \stdClass();
        $this->section->title = 'Brands';
        $this->section->heading = 'Brands';
        $this->section->slug = 'brands';
        $this->section->folder = 'brands';
    }
    public function index(Request $request) {
        if ($request->header('Accept') == 'application/json') {
            // API request
            return response()->json(['message' => 'Brand Data', 'data' =>Brand::all()]);
        } 
        checkPermission('read-user');
        $section = $this->section;
        // $users = User::with('role')->get();
        $brands = Brand::all();
        return view($section->folder.'.index', compact('brands', 'section'));
    }
    public function create()
    {
        checkPermission('create-user');
        $brands = [];
        $section = $this->section;
        $section->heading = 'Brands';
        $section->title = 'Add Brands';
        $section->method = 'POST';
        $section->route = $section->slug.'.store';
        // $roles = Role::pluck('name', 'id')->toArray();
        // dd($roles);
        return view($section->folder.'.form',compact('section', 'brands'));
    }
    public function store(Request $request)
    {
        $section = $this->section;
        // Define custom validation messages for the validator
        $validationMessages = [
            'brand_name.unique' => 'Brand name already exists. Please enter a unique brand name.',
        ];

        // Validate user input
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required|string|unique:brands,brand_name',
        ], $validationMessages);

        // Validation fails
        if ($validator->fails()) {
            // If it's an API request, return JSON response
            
        if ($request->header('Accept') == 'application/json') {
                $data['code']=400;
                $data['message']=$validator->errors()->first();
                return response()->json($data);
            } else {
                // If it's a web request, redirect back with validation errors
                return redirect()->back()->withInput($request->input())->withErrors($validator);
            }
        }

        // Validation passes, continue with data creation
        // ... (your existing logic)

        $brands = Brand::create([
            'brand_name' => $request->input('brand_name'),
            // Add other fields as needed
        ]);

        // After successfully creating the data
        
        if ($request->header('Accept') == 'application/json') {
            $data['code']=200;
            $data['message']='Successfully created';
            $data['data'] =   $brands;
            
            return response()->json($data);
        } 
            // If it's a web request, redirect with a flash message
            $request->session()->flash('flash_message', 'Record has been added successfully.');
            return redirect()->route($section->slug.'.index');
        
    }
    public function edit($id)
    {
        checkPermission('update-user');
        // $id = Crypt::decrypt($id);
        $section = $this->section;
        $section->heading = 'Brands';
        $section->title = 'Edit Brands';
        $section->method = 'PUT';
        $section->route = [$section->slug.'.update', $id];
        $roles = Role::pluck('name', 'id')->toArray();
        $brands = Brand::where('id', $id)->first();
        return view($section->folder.'.form', compact('brands', 'section', 'roles'));
    }
    public function update(Request $request,  $brand_id)
    {
        // dd($request->all());
        // $data = $request->json()->all();
        // $this->checkPermission('edit-modules');
        $section = $this->section;
        $brands = Brand::where('id', $brand_id)->first();
        if($brands){
        //define custom validation messages for validator
        $validationMessages = [
            'name.unique' => 'User name already exist. Please enter a unique username',
            'email.unique' => 'Email already exist. Please enter a unique email',
        ];
        // validate user input
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required|string|unique:brands,brand_name,'. $brands->id . ',id',
            // 'email' => 'required|string|email|unique:users,email,'. $brands->email . ',email',
            // 'password' => 'confirmed',
            // 'user_type' => 'required',
            // 'status' => 'required|boolean'
        ], $validationMessages);
        if ($validator->fails()) {
            // If it's an API request, return JSON response
            
        if ($request->header('Accept') == 'application/json') {
                return response()->json(['message' => $validator->errors()->first()], 422);
            } 

            return redirect()->back()->withInput($request->input())->withErrors($validator);
        } else {


//              dd($request->toArray());
                if ($request->password) {
                    $request->request->add([
                        'password'=>bcrypt($request->password),
                    ]);
                $brands->update($request->all());
                }else{
                $brands->update($request->except('password','password_confirmation'));
                }
                        // After successfully creating the data
                        
            if ($request->header('Accept') == 'application/json') {
                $data['code']=200;
                $data['message']='Successfully Updated data';
                $data['data'] =   $brands;
                
                return response()->json($data);
            } 
            $request->session()->flash('alert-success', 'Record has been updated successfully.');
            return redirect()->route($section->slug . '.index');
            // return redirect()->back()->with('alert-success', 'Record has been updated successfully.');

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
        // dd($id);
        $brands = Brand::where('id', $id)->first();
        if($brands){ 
        $data['code']=200;
            $data['message']='Search Results';
            $data['data'] =   $brands;
            return response()->json($data);
        }
            else{
                $data['code']=400;
                $data['message']='Something went wrong';
                return response()->json($data);
            }
    }
    public function destroy(Request $request,$brandId)
    {
        // dd($request);
        $brand = Brand::find($brandId);
        if ($request->header('Accept') == 'application/json') {
        // if ($request->is('api/*') || $request->wantsJson()) {
            if($brand){
                $brand->delete();
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
        if ($brand) {
            $section = $this->section;
            $brand->delete();
         
            request()->session()->flash('alert-success', 'Record has been deleted successfully.');
            return redirect()->route($section->slug . '.index');
        } else {
            // Handle the case where the brand with the given ID is not found
            // You may want to redirect back with an error message or handle it in another way.
        }
    }
    
}