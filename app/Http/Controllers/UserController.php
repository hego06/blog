<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::permitido()->get();;

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',new User);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name','id'); 
        return view('admin.users.create', compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new User);
        $rules =[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ];

        $data = $this->validate($request,$rules);

        $user= User::create($data);
        if($request->filled('roles'))
        {
            $user->assignRole($request->roles);
        }
        if($request->filled('permissions'))
        {
            $user->givePermissionTo($request->permissions);
        }

        return redirect()->route('user.index')->withFlash('El usaurio ha sido creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view',$user);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        //$roles = Role::pluck('name','id');
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name','id');
        return view('admin.users.edit',compact('user','roles','permissions'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update',$user);
        $rules =[
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id)]
        ];

        if($request->filled('password'))
        {
            $rules['password'] = ['confirmed','min:6'];
        }
        
        $data = $this->validate($request,$rules);
        
        $user->update($data);
        return back()->withflash('Datos actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
