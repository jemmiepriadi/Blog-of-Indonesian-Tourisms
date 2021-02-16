<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(Request $request, $id)
    {
        if(User::where('id',$id)->exists()){
            $user = User::find($id);
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->phone = is_null($request->phone) ? $user->phone : $request->phone;
            $user->save();

            return '<script>alert("Edit Successfull!");window.location.href="/user/profile";</script>';
        }
        
        return '<script>alert("Edit Failed!");window.location.href="/user/profile";</script>';
    }
}
