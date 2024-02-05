<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/' , 'App\Http\Controllers\RouteController@index');

Route::get('/pesan', function () {
    // Menggunakan fungsi request() untuk mendapatkan nilai parameter dari URL
    $id = request('id');
    $filmName = request('film');
    
    // Get the authenticated user's ID
    $userId = Auth::id();
    $user = User::find($userId);

    // Mendapatkan nama pengguna dari data user
    $userid = $user->id;
    $userName = $user->nama;

    // Now $filmName, $userId, and $id contain the necessary data
    // You can use them as needed in your logic...

    return view('pesan', ['filmName' => $filmName, 'id' => $id,'nama' => $userName,'id'=>$userid]);
})->middleware('auth');



Route::middleware(['guest'])->group(function(){
    //loginAuth
    Route::post('/login' , [UserController::class, 'Login']);
    
});
Route::middleware(['auth'])->group(function(){
    Route::post('/pesan/add' , [RouteController::class, 'pesanadd']);
    Route::post('/pesan/up' , [UserController::class, 'update']);
    Route::get('/delete/{id}' , 'App\Http\Controllers\UserController@deltiket');
    Route::get('/edit/{id}' , 'App\Http\Controllers\UserController@edittiket');
    
});

Route::post('/register' , [UserController::class, 'register']);

Route::get('/logout' , [UserController::class, 'Logout']);
