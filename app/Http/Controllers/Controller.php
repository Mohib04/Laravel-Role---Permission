<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        // Get the authenticated user
        $user = Auth::user();

        // Find the "Super Admin" role
        $superAdminRole = Role::where('name', 'super admin')->first();

        // Assign the role to the user
        $user->assignRole($superAdminRole);
        
        $profiles = Profile::all();
        return view('welcome', compact('profiles'));
    }
}
