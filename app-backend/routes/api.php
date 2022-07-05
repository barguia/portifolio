<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AclProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::resource('/users', UserController::class);

Route::name('manager.')->prefix('adm/')->middleware(['auth:api'])->group(function () {
    Route::resource('/profiles', AclProfileController::class);

    Route::get('/test', function () {
        #$person = \App\Models\PcoPerson::first();
        $tasks =  \App\Models\CtlTask::get();
        dd($tasks->first());
        #\App\Repositories\PcoTaskRepository::create();
        return $person;
    });
});

Route::name('client.')->prefix('cli/')->middleware(['auth:api'])->group(function () {

});
