<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OfferController;

Route::get('/offers', [OfferController::class, 'index']);
Route::post('/offers', [OfferController::class, 'store']);
Route::put('/offers/{id}', [OfferController::class, 'update']);
Route::delete('/offers/{id}', [OfferController::class, 'destroy']);
