<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //add a role
    public function role(Request $request){
        $role = new Role();
        $role->role = $request->input('role');

        $role->save();

        return $role;
    }
}
