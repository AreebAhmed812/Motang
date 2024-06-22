<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attachment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

use App\Models\Role;


class UserController extends Controller
{
 
    public function __construct()
    {
        $this->section = new \stdClass();
        $this->section->title = 'Users';
        $this->section->heading = 'Users';
        $this->section->slug = 'users';
        $this->section->folder = 'user';
    }
        public function index(Request $request) { 
            if ($request->header('Accept') == 'application/json') {
                // API request
                $user = User::where('email', $request->email)->first();
            
                if (!$user || !Hash::check($request->password, $user->password)) {
                    // Log failed authentication attempt
                    // Log::warning('Authentication failed for email: ' . $request->email);
            
                    return response([
                        'message' => $request->email
                    ], 401);
                }
            
                $token = $user->createToken('my-app-token')->plainTextToken;
                $response = [
                    'user' => $user,
                    'token' => $token,
                ];
            
                return response($response, 201);
            }            
           
        //    }
        checkPermission('read-user');
        $section = $this->section;
        // $users = User::with('role')->get();
        $users = User::whereIn('user_type', [1,2])->with('role','ads')->get();
        return view($section->folder.'.index', compact('users', 'section'));
    }
    public function show(Request $request,$id)
    {
        if ($request->header('Accept') == 'application/json') {
            // API request
            return response()->json(['message' => 'User Data', 'data' =>User::all()]);
        } 
        $user = User::where('id', $id)->first();
        // dd($id);
        // $brands = Brand::where('id', $id)->first();
        if($user){
            $data['code']=200;
            $data['message']='Search Results';
            $data['data'] =   $user;
            return response()->json($data);
        }
        else{
            $data['code']=400;
            $data['message']='Something went wrong';
            return response()->json($data);
        }
        }
    public function create()
    {
        checkPermission('create-user');
        $user = [];
        $section = $this->section;
        $section->heading = 'Users';
        $section->title = 'Add User';
        $section->method = 'POST';
        $section->route = $section->slug.'.store';
        $statusFlag = true;
        $roles = Role::Where('id','!=','3')->pluck('name', 'id')->toArray();
        // $roles = Role::pluck('name', 'id')->toArray();
        // dd($roles);
        return view($section->folder.'.form',compact('section', 'user','roles','statusFlag'));
    }
    public function store(Request $request)
    {
     
        $section = $this->section;
        // dd("han");
        //define custom validation messages for validator
        $validationMessages = [
            'name.unique' => 'User name already exist. Please enter a unique username',
        ];
        // validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required',
            'status' => 'required|string'
        ], $validationMessages);
        //validation fails
     
        if ($validator->fails()) {
            if ($request->header('Accept') == 'application/json') {
                $data['code']=400;
                $data['message']=$validator->errors()->first();
                return response()->json($data);
            } else {
                // If it's a web request, redirect back with validation errors
                return redirect()->back()->withInput($request->input())->withErrors($validator);
            }
        } else {
            // $plain_pass = $request->password;
            $request->request->add([
                'password'=>bcrypt($request->password),
                'birth_date'=> Carbon::now()->format('Y-m-d')
            ]);
            // if(User::where('email',$request->email)->first()){
            //     return response([
            //         'message' =>"Already Exists",
            //         'status' => 'failed'
            //     ],401);
            // }
            $user = User::create($request->all());
            $attachments = new AttachmentController();
            $attachments = $attachments->addNewAttachment($request);
            if (!is_null($attachments)) {
                User::where('id',$user->id)->update(['attachment_id'=>implode(',', $attachments)]);
            }
            // dd($request->all());
        
            if ($request->header('Accept') == 'application/json') {
                $data['code']=200;
                $data['message']='Successfully created';
                $data['data'] =   $user;
                return response()->json($data);
            } 
            // $extra = [
            //     'plain_password' => $plain_pass,
            //     'url' => env('APP_URL')
            // ];
            // $merge = array_merge($user->toArray(),$extra);
            // Mail::to($user->email)->send(new SendCredentials($merge));
            $request->session()->flash('flash_message', 'Record has been added successfully.');
            return redirect()->route($section->slug.'.index');

        }
    }
    public function edit($id)
    {
        checkPermission('update-user');
        $section = $this->section;
        $section->heading = 'Users';
        $section->title = 'Edit User';
        $section->method = 'PUT';
        $section->route = [$section->slug.'.update', $id];
        $roles = Role::Where('id','!=','3')->pluck('name', 'id')->toArray();
        $user = User::where('id', $id)->first();
        $statusFlag = ($user->user_type == 3) ? false : true;
        return view($section->folder.'.form', compact('user', 'section', 'roles','statusFlag'));
    }
    public function update(Request $request, User $user)
    {
        // $this->checkPermission('edit-modules');
        $section = $this->section;
        // dd($user->name);
        //define custom validation messages for validator
        
        $validationMessages = [
            'name.unique' => 'User name already exist. Please enter a unique username',
            'email.unique' => 'Email already exist. Please enter a unique email',
        ];
        // validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:users,name,'. $user->id . ',id',
            'email' => 'required|string|email|unique:users,email,'. $user->email . ',email',
            'password' => 'confirmed',
            // 'user_type' => 'required',
            // 'status' => 'required|boolean'
        ], $validationMessages);

        //validation fails
        if ($validator->fails()) {
            // If it's an API request, return JSON response
            
            if ($request->header('Accept') == 'application/json') {
                return response()->json(['message' => $validator->errors()->first()], 422);
            } else {
                // If it's a web request, redirect back with validation errors
                return redirect()->back()->withInput($request->input())->withErrors($validator);
            }
        } else {

            $attachments = new AttachmentController();
            $attachments = $attachments->addNewAttachment($request);
            if (!is_null($attachments)) {
                User::where('id',$user->id)->update(['attachment_id'=>implode(',', $attachments)]);
            }
//              dd($request->toArray());
                if ($request->password) {
                    $request->request->add([
                        'password'=>bcrypt($request->password),
                    ]);
                $user->update($request->all());
                if ($request->header('Accept') == 'application/json') {
                    $data['code']=200;
                    $data['message']='Successfully Updated data';
                    $data['data'] =   $user;
                    
                    return response()->json($data);
                } 
                }else{
                    if($request->header('Accept') == 'application/json'){
                        $data['code']=400;
                        $data['message']='Something went wrong';
                        
                        return response()->json($data);
                    }
                $user->update($request->except('password','password_confirmation'));
                }
            $request->session()->flash('alert-success', 'Record has been updated successfully.');
            // return redirect()->route($section->slug . '.index');
            return redirect()->back()->with('alert-success', 'Record has been updated successfully.');

        }
    }
    public function destroy(Request $request,User $user)
    {
        // dd($user);
        $section = $this->section;
        if ($request->header('Accept') == 'application/json') {
            if($user){
                $user->delete();
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
        $user->delete();
        request()->session()->flash('alert-success', 'Record has been deleted successfully.');
        return redirect()->route($section->slug.'.index');
    }
    public function seller()
    {
        $section = $this->section;
        $section->heading = 'Seller';
        $section->title = 'Seller';
        $users = User::where('user_type', 3)->with('role')->get();
        return view('seller.index', compact('users', 'section'));
    }
    public function profileEdit($id)
    {
        checkPermission('update-user');
        $section = $this->section;
        $section->heading = 'Profile';
        $section->title = 'Edit Profile';
        $section->method = 'PUT';
        $section->route = [$section->slug.'.profile', $id];
        $roles = Role::Where('id','!=','3')->pluck('name', 'id')->toArray();
        $user = User::where('id', $id)->first();
        return view($section->folder.'.form', compact('user', 'section', 'roles'));
    }
    public function profile(  Request $request, User $user){
      
        // $this->checkPermission('edit-modules');
        $section = $this->section;
        // dd($user->name);
        //define custom validation messages for validator
        
        $validationMessages = [
            'name.unique' => 'User name already exist. Please enter a unique username',
            'email.unique' => 'Email already exist. Please enter a unique email',
        ];
        // validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:users,name,'. $user->id . ',id',
            'email' => 'required|string|email|unique:users,email,'. $user->email . ',email',
            'password' => 'confirmed',
            // 'user_type' => 'required',
            // 'status' => 'required|boolean'
        ], $validationMessages);

        //validation fails
        if ($validator->fails()) {
            // If it's an API request, return JSON response
            
            if ($request->header('Accept') == 'application/json') {
                return response()->json(['message' => $validator->errors()->first()], 422);
            } else {
                // If it's a web request, redirect back with validation errors
                return redirect()->back()->withInput($request->input())->withErrors($validator);
            }
        } else {

            if($request->has('image')){
                // Picture Upload process
                // $image = $request->file('image');
                $imageName = strtolower($request->name).'.'.$request->image->extension();
                $request->image->move(public_path('pictures'), $imageName);
                $request->request->add(['picture'=> $imageName]);
            }
//              dd($request->toArray());
                if ($request->password) {
                    $request->request->add([
                        'password'=>bcrypt($request->password),
                    ]);
                $user->update($request->all());
                if ($request->header('Accept') == 'application/json') {
                    $data['code']=200;
                    $data['message']='Successfully Updated data';
                    $data['data'] =   $user;
                    
                    return response()->json($data);
                } 
                }else{
                    if($request->header('Accept') == 'application/json'){
                        $data['code']=400;
                        $data['message']='Something went wrong';
                        
                        return response()->json($data);
                    }
                $user->update($request->except('password','password_confirmation'));
                }
            $request->session()->flash('alert-success', 'Record has been updated successfully.');
            return redirect()->route($section->slug . '.index');
            // return redirect()->back()->with('alert-success', 'Record has been updated successfully.');

        }
    }
}