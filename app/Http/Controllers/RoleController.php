<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->section = new \stdClass();
        $this->section->title = 'Roles';
        $this->section->heading = 'Roles';
        $this->section->slug = 'roles';
        $this->section->folder = 'role';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        checkPermission('read-role');
	    $section = $this->section;
        $roles = Role::get();
        return view($section->folder.'.index', compact('roles', 'section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        checkPermission('create-role');
        $role = [];
        $section = $this->section;
        $section->title = 'Add New Role';
        $section->method = 'POST';
        $section->route = $section->slug.'.store';
        $permissions = Permission::get();
        $rolePermissions = [];
        return view($section->folder.'.form',compact('section', 'permissions', 'role', 'rolePermissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        //
        $section = $this->section;

        //define custom validation messages for validator
        $validationMessages = [
            'name.unique' => 'Role name already exist. Please enter a unique role name',
        ];
        // validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:roles,name'
        ], $validationMessages);

        //validation fails
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator);
        } else {

            $request->request->add([
                'name'=>$request->name,
                'user_id'=>auth()->user()->id
            ]);
            $role = Role::create($request->all());

            if($request->has('permissions')){
                foreach ($request->permissions as $permission){
                    $item = RolePermission::create([
                    'role_id' => $role->id,
                    'permission_id' => $permission,
                    'user_id' => $request->user_id,
                    ]);
                }
            }
            $request->session()->flash('flash_message', 'Record has been added successfully.');
            return redirect()->route($section->slug.'.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        checkPermission('update-role');
        $section = $this->section;
        $section->heading = 'Roles';
        $section->title = 'Edit Role';
        $section->method = 'PUT';
        $section->route = [$section->slug.'.update', $role];
        $permissions = Permission::get();
        $rolePermissions = RolePermission::where('role_id', $role->id)->pluck('permission_id')->toArray();

        return view($section->folder.'.form', compact('role', 'section', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
                // $this->checkPermission('edit-modules');
                $section = $this->section;

                //define custom validation messages for validator
                $validationMessages = [
                    'name.unique' => 'Role name already exist. Please enter a unique role name',
                ];
                // validate user input
                $validator = Validator::make($request->all(), [
                    'name' => 'string|unique:roles,name,'. $role->id . ',id',
                ], $validationMessages);

                //validation fails
                if ($validator->fails()) {
                    return redirect()->back()->withInput($request->input())->withErrors($validator);
                } else {
                    $request->request->add(['user_id'=>auth()->user()->id]);
                    if($request->has('permissions')){
                        RolePermission::where('role_id', $role->id)->delete();
                        foreach ($request->permissions as $permission){
                            $item = RolePermission::create([
                                'role_id' => $role->id,
                                'permission_id' => $permission,
                                'user_id' => $request->user_id,
                            ]);
                        }
                    }
                    $role->update($request->all());
                    $request->session()->flash('alert-success', 'Record has been updated successfully.');
                    return redirect()->route($section->slug . '.index');
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
