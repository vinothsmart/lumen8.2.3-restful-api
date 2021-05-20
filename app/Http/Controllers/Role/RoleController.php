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
    public function show($role)
    {
        $role = Role::findOrFail($role);
        
        return $this->showOne($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        $role = Role::findOrFail($role);

        // Validation
        $rules = [
            'role' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->has('role')) {
            $role->role = $request->role;
        }

        if (!$role->isDirty()) {
            return $this->errorResponse('You need to specify a different value to update', 422);
        }

        $role->client_details = "";

        $role->save();

        return $this->showOne($role);
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
