<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\webSocket\Chat;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::match(['post','get'], 'login/form',function(){
    return view('login.login');
});
Route::prefix('admin')->group(function(){
    Route::post('/panel',[PanelController::class,'showPanel'] )->name('admin.showPanel');
});
Route::post('api.login',[AuthController::class,'login'])->name('api.login');

Route::prefix('chat')->group(function(){
    Route::get('/',function(){
        return view('chat.message');
    });
});