<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RecipeController;


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


Route::get('/', [PagesController::class, 'index']);
//Route::get('/additem', [PagesController::class, 'additem']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('recipe', RecipeController::class);
Route::get('/', [RecipeController::class, 'create'])->name('recipe.create');
Route::post('/', [RecipeController::class, 'store'])->name('recipe.store');


Route::get('/modify', function () {
    return view('modify');
})->middleware('admin')->name('modify');

require __DIR__.'/auth.php';
