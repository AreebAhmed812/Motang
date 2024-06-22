<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->section = new \stdClass();
        $this->section->title = 'Years';
        $this->section->heading = 'Years';
        $this->section->slug = 'years';
        $this->section->folder = 'years';
    }
    public function index() {
        checkPermission('read-user');
        $section = $this->section;
        // $users = User::with('role')->get();
        $years = Year::all();
        return view($section->folder.'.index', compact('years', 'section'));
    }
    public function create()
    {
        checkPermission('create-user');
        $years = [];
        $section = $this->section;
        $section->heading = 'Years';
        $section->title = 'Add years';
        $section->method = 'POST';
        $section->route = $section->slug.'.store';
        // $roles = Role::pluck('name', 'id')->toArray();
        // dd($roles);
        return view($section->folder.'.form',compact('section', 'years'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $section = $this->section;

        //define custom validation messages for validator
        $validationMessages = [
            'years.unique' => 'Years is already exist.',
            
        ];
        // validate user input
        $validator = Validator::make($request->all(), [
            'year' => 'required|string|unique:years,year',
        ], $validationMessages);

        //validation fails
        if ($validator->fails()) {
            if( $request->ajax() ) {
                // return $request->query('q');
                return response()->json([
                    'status'=>400,
                    'message'=> $validator->messages()
                ],400);
            }
            return redirect()->back()->withInput($request->input())->withErrors($validator);
        } else {

            $plain_pass = $request->password;
        
            $years = Year::create([
                'year' => $request->input('year'),
                
            ]);
            $extra = [
                'plain_password' => $plain_pass,
                'url' => env('APP_URL')
            ];

            $merge = array_merge($years->toArray(),$extra);

            $request->session()->flash('flash_message', 'Record has been added successfully.');
            if( $request->ajax() ) {

                return response()->json([
                    'status'=>200,
                    'message'=> 'Years Successfully added'
                ],200);
            }
            //   return 'Not Ajax!';
            return redirect()->route($section->slug.'.index');
        }
    }
    public function edit($id)
    {
        checkPermission('update-user');

        // $id = Crypt::decrypt($id);
    
        $section = $this->section;
        $section->heading = 'Years';
        $section->title = 'Edit years';
        $section->method = 'PUT';
        $section->route = [$section->slug.'.update', $id];
        // $roles = Role::pluck('year', 'id')->toArray();
        $years = Year::where('id', $id)->first();
        return view($section->folder.'.form', compact('years', 'section'));
    }
    public function update(Request $request, $id)
    {
        
        // $this->checkPermission('edit-modules');
        $section = $this->section;
        
        $years = Year::where('id', $id)->first();
        //define custom validation messages for validator
        $validationMessages = [
            'name.unique' => 'User name already exist. Please enter a unique username',
            'email.unique' => 'Email already exist. Please enter a unique email',
        ];
        // validate user input
        $validator = Validator::make($request->all(), [
            'year' => 'required|string|unique:years,year,'. $years->id . ',id',
            // 'email' => 'required|string|email|unique:users,email,'. $brands->email . ',email',
            // 'password' => 'confirmed',
            // 'user_type' => 'required',
            // 'status' => 'required|boolean'
        ], $validationMessages);

        //validation fails
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator);
        } else {
           
                $years->update($request->all());
            $request->session()->flash('alert-success', 'Record has been updated successfully.');
            return redirect()->route($section->slug . '.index');
            // return redirect()->back()->with('alert-success', 'Record has been updated successfully.');

        }
    }
    public function destroy($id)
    {

        $year = Year::where('id', $id)->first();
        $section = $this->section;
        $year->delete();
        request()->session()->flash('alert-success', 'Record has been deleted successfully.');
        return redirect()->route($section->slug.'.index');
    }
    public function show(year $year)
    {
        return view('inner-product',['year' => $year]);
    }
}