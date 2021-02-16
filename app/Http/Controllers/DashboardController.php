<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('role','user')->get();
        return view('admin.user',['userlist'=>$user]);
    }
    public function delete($id)
    {
        if(User::where('id',$id)->exists()){
            $user = User::find($id);
            $user->delete();

            return '<script>alert("Delete Successful!");window.location.href="/admin/user";</script>';
        }

        return '<script>alert("Delete Failed!");window.location.href="/admin/user";</script>';
    }
}
