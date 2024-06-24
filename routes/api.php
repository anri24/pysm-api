<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

require __DIR__.'/auth.php';


Route::controller(ServiceController::class)->group(function (){
    Route::get('/services','getAll');
    Route::get('/service/{id}','find');
    Route::post('/service/store','store');
    Route::put('/service/update/{id}','update');
    Route::delete('/service/delete/{id}','destroy');
});
