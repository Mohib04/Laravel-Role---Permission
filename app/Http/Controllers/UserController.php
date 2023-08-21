<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // Other methods ...

    public function makeSuperAdmin()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the "Super Admin" role
        $superAdminRole = Role::where('name', 'super admin')->first();

        // Assign the role to the user
        $user->assignRole($superAdminRole);

        return View("super-admin");
    }
}
