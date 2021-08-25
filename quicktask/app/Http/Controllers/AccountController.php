<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AccountController extends Controller
{
    public function showUser ($id)
    {
        $users = Role::find($id)->users->pivot->all();
        return $users;
    }

    public function showRole ($id)
    {
        $users = User::find($id)->roles->all();
        return $users;
    }
    public function testPivot ($id)
    {
        $role = Role::find($id);
        $arr = [];
        foreach ($role->users as $user) {
            array_push($arr, $user->pivot);
        }
        return $arr;
    }
}
