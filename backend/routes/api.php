<?php

use App\Http\Controllers\BooksController;
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

//Since no need for authentication...
Route::prefix('books')->group(function() {
    Route::get('/details/{id}', [BooksController::class, 'index']);
    Route::get('/list', [BooksController::class, 'list']);
    Route::post('/store', [BooksController::class, 'store']);
    Route::patch('/update/{id}', [BooksController::class, 'update']);
});

// this is for the api endpoint demo, you should create a controller for your endpoints
Route::get('/start', function () {
    return [
        'message' => 'All requests with `/api/` prefix are set up to go to the backend',
    ];
});
