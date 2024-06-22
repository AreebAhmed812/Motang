<?php

namespace App\Http\Controllers;

use App\Models\MessageContact;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class MessageContactController extends Controller
{
    public function __construct()
    {
        $this->section = new \stdClass();
        $this->section->title = 'Message';
        $this->section->heading = 'Message';
        $this->section->slug = 'contact';
        $this->section->folder = 'contact-us';
    }
    public function index(Request $request) {
        if ($request->header('Accept') == 'application/json') {
            // API request
            return response()->json(['message' => 'Message Data', 'data' =>MessageContact::all()]);
        } 
        // checkPermission('read-user');
        $section = $this->section;
        // dd($section->folder);
        // $users = User::with('role')->get();
        // $model_managements = ModelManagements::with('brand')->get();
        $messageContact = MessageContact::all();
        // dd($messageContact);    
        return view($section->folder.'.index', compact('messageContact', 'section'));
    }
    public function create()
    {
        // checkPermission('create-user');
        $messageContact = [];
        $section = $this->section;
        $section->heading = 'Message';
        $section->title = 'Add Message';
        $section->method = 'POST';
        $section->route = $section->slug.'.store';
        // $roles = Role::pluck('name', 'id')->toArray();
        // dd($roles);
        return view($section->folder.'.form',compact('section', 'messageContact'));
    }
    public function store(Request $request)
    {
        $section = $this->section;
        
        $messageContact = MessageContact::create($request->all());

        // After successfully creating the data
        
        if ($request->header('Accept') == 'application/json') {
            $data['code']=200;
            $data['message']='Successfully created';
            $data['data'] =   $messageContact;
            
            return response()->json($data);
        } 
            // If it's a web request, redirect with a flash message
            $request->session()->flash('alert-success', 'Record has been added successfully.');
            return redirect()->back();
            // return $request->session()->flash('flash_message', 'Record has been added successfully.');;
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MessageContact  $messageContact
     * @return \Illuminate\Http\Response
     */
    public function show(MessageContact $messageContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MessageContact  $messageContact
     * @return \Illuminate\Http\Response
     */
    public function edit(MessageContact $messageContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageContactRequest  $request
     * @param  \App\Models\MessageContact  $messageContact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageContactRequest $request, MessageContact $messageContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MessageContact  $messageContact
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $request,$messageContactId)
    {
        // dd($request);
        $messageContact = MessageContact::find($messageContactId);
        if ($request->header('Accept') == 'application/json') {
        // if ($request->is('api/*') || $request->wantsJson()) {
            if($messageContact){
                $messageContact->delete();
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
        if ($messageContact) {
            $section = $this->section;
            $messageContact->delete();
            request()->session()->flash('alert-success', 'Record has been deleted successfully.');
            return redirect()->route($section->slug . '.index');
        } else {
            // Handle the case where the brand with the given ID is not found
            // You may want to redirect back with an error message or handle it in another way.
        }
    }

}
