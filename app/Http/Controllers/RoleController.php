<?php

namespace App\Http\Controllers;
//use App\Models\Role;
//use Spatie\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()

    {   

         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);

         $this->middleware('permission:role-create', ['only' => ['create','store']]);

         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:role-delete', ['only' => ['destroy']]);

    }
    public function index(Request $request)

    {$roles = Role::all();
        return view('roles.all_roles',compact('roles'));
        }

        // $roles = Role::orderBy('id','DESC')->paginate(5);

        // return view('roles.index',compact('roles'))

        //     ->with('i', ($request->input('page', 1) - 1) * 5);
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
     {$roles = Role::all();
        return view('roles.all_roles',compact('roles'));
        
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            ]);
            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));
            return redirect()->route('roles.index')
            ->with('success','Role created successfully');
            
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id);
$rolePermissions=Permission::join("role_has_permissions","role_has_permissions.permission_id","=",
"permissions.id")->where("role_has_permissions.role_id",$id)->get();
return view('roles.show_role',compact('role','rolePermissions'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
->all();
return view('roles.edit_role',compact('role','permissions','rolePermissions'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
            ]);
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();
            $role->syncPermissions($request->input('permission'));
            return redirect()->route('roles.index')
            ->with('success','Role updated successfully');
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
$role->delete();
return redirect()->route('roles.index')->with('success','Role deleted
successfully');

    }
}
