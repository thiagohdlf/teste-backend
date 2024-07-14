<?php

use App\Http\Controllers\Admin\{
    ProducerController,
    PropertyController
};

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\UserController;

Route::post('/login', [UserController::class, 'auth'])->name('user.auth');

Route::middleware(['auth:sanctum'])->group(function(){

    //Rotas do CRUD de produtores
    Route::get('/produtor', [ProducerController::class, 'index'])->name('producer.index');
    Route::post('/produtor', [ProducerController::class, 'store'])->name('producer.store');
    Route::put('/produtor/{id}', [ProducerController::class, 'update'])->name('producer.update');
    Route::delete('/produtor/{id}', [ProducerController::class, 'destroy'])->name('producer.destroy');
    Route::post('/produtor/{id}', [ProducerController::class, 'filter'])->name('producer.filter');

    //Rotas do CRUD de propiedades
    Route::get('/propiedade', [PropertyController::class, 'index'])->name('property.index');
    Route::post('/propiedade', [PropertyController::class, 'store'])->name('property.store');
    Route::put('/propiedade/{idProperty}', [PropertyController::class, 'update'])->name('property.update');
    Route::delete('/propiedade/{idProperty}', [PropertyController::class, 'destroy'])->name('property.destroy');
    Route::post('/propiedade/{idProperty}', [PropertyController::class, 'filter'])->name('property.filter');
});
