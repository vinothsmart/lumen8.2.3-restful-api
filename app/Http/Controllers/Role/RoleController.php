<?php

namespace App\Http\Controllers\Role;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class RoleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles= Role::all();

        return $this->showAll($roles);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $roles = Role::select('id', 'role')->get();

        return $this->showList($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $rules = [
                    'role' => 'required',
                ];
        
        $this->validate($request, $rules);
        
        $data = $request->all();
        $data['role'] = $request->role;
        $data['client_details'] = "";
        
        $role = Role::create($data);
        
        return $this->showOne($role, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $roleId
     * @return \Illuminate\Http\Response
     */
    // public function show($Role $role)
    public function show($roleId)
    {
        $role = Role::where('id', $roleId)->get();
        // return $this->showOne($role);
        return $role;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
