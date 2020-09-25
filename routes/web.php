<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Models\Note;


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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //retornar a un controlador y funcion especifica
    return redirect()->action([NoteController::class, 'index']);
})->name('dashboard');

Route::resource('notes', NoteController::class);
