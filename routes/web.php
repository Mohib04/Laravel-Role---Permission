<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesPermissionsController;
use App\Models\Profile;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $profiles = Profile::all();
    return view('welcome', compact('profiles'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Spatie
Route::middleware(['permission:edit articles'])->group(function () {
    // Routes that require the 'edit articles' permission
});

// Route::middleware(['role:super admin'])->group(function () {
//     Route::get('/', [Controller::class, 'index']);
// });


//Roles
Route::get('/create-roles', [RolesPermissionsController::class,'roleCreate'])->name('create-roles');
Route::post('/store-roles', [RolesPermissionsController::class,'storeRole'])->name('store.roles');
Route::get('/roles/{role}/edit', [RolesPermissionsController::class,'roleEdit'])->name('edit.role');
Route::put('/roles/{role}', [RolesPermissionsController::class,'roleUpdate'])->name('update.role');
Route::delete('/roles/{role}', [RolesPermissionsController::class,'roleDelete'])->name('delete.role');



// Permission
Route::get('/create-permissions', [RolesPermissionsController::class,'permissionCreate'])->name('create-permissions');

Route::post('/store-permissions', [RolesPermissionsController::class,'storePermission'])->name('store.permissions');

// Assign Permission to Role
Route::post('/assign-permissions', [RolesPermissionsController::class, 'assignPermissions'])
    ->name('assign.permissions');














require __DIR__.'/auth.php';
