<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ChirpResource;
use App\Models\Chirp;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/chirp/{chirpid}', function (string $id) {
    return new ChirpResource(Chirp::with('user')->findOrFail($id));
});

Route::get('/chirps', function () {
    return ChirpResource::collection(Chirp::all());
});
