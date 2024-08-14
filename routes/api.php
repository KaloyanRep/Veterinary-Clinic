<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Front\Owner\OwnersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;
use Illuminate\Http\Request;

Route::post('clients', [ClientController::class, 'store'])->name('clients.store');

//Route::get('/test',function(Request $request){
//    return 'Authenticated';
//});

Route::middleware('auth:api')->prefix('v1')->group(function() {
    Route::get('/user',function(Request $request){
        return $request->user();
    });

   // Route::get('/owners/{owner}',[OwnersController::class, 'show']);

  //  Route::get('/owners',[OwnersController::class, 'index']);

    Route::apiResource('/owners',OwnersController::class);
});

    Route::post('register',[RegisterController::class,'create']);

//owner/{owner}
//For on specific owner


//Route::middleware('auth:api')->get('/user',function(Request $request){
//    return $request->user();
//});

