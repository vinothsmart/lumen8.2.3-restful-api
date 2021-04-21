<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\ApiController;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleUserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($roleId)
    {
        $users = $role->users;

        return $this->showAll($users);
        $role = Role::where('id', $roleId)->get();
        // return $this->showOne($role);
        return $role;
    }
}
