<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\MemberProfileController;



 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('login.login');
});

// Login route
Route::get('login', function () {
    return view('login.login');
})->name('login');
Route::post('login',[AuthController::class,'login'])->name('loginPost');

// Logout Route
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');



Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('home', function () {
        return view('admin.home');
    })->name('admin.home');

    // Cast Route

Route::get('show-cast',[CastController::class,'cast'])->name('admin.showAllCast');
Route::get('add-cast',[CastController::class,'addCastView'])->name('admin.addCast');
Route::post('add-cast',[CastController::class,'addCast'])->name('admin.addCastPost');
Route::get('edit-cast/{id}',[CastController::class,'editCastView'])->name('admin.editCastView');
Route::post('edit-cast',[CastController::class,'castUpdate'])->name('admin.castUpdate');
Route::get('delete-cast/{id}',[CastController::class,'deletecast'])->name('admin.deleteCast');

 // Member Route
 Route::get('show-member',[AdminHomeController::class,'showMember'])->name('admin.showMember');
 Route::get('add-member',[AdminHomeController::class,'addMemberView'])->name('admin.addMemberView');
 Route::post('add-member',[AdminHomeController::class,'addmemberstore'])->name('admin.addmemberstore');
 Route::get('edit-member/{id}',[AdminHomeController::class,'editMemberView'])->name('admin.editMemberView');
 Route::post('edit-member',[AdminHomeController::class,'memberUpdate'])->name('admin.memberUpdate');

 Route::get('delete-member/{id}',[AdminHomeController::class,'memberDelete'])->name('admin.memberDelete');


});


Route::group(['prefix' => 'member','middleware' => 'is_member'], function () {
    Route::get('home',function () {
        return view('member.home');
    })->name('member.home');
    
    Route::get('profile-update',[MemberProfileController::class,'memberProfileView'])->name('member.memberProfileView');
    // Add Family
    Route::get('add-family',[FamilyController::class,'addFamilyView'])->name('member.addFamilyView');


});


