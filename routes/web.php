<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CategoryController;


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
Route::get('/', [PagesController::class, 'index']);
Route::get('/recipe/{id}', [PagesController::class, 'recipePage'])->name('page');

Route::resources([
    'recipe' => RecipeController::class,
    'ingredient' => IngredientController::class,
    'unit' => UnitController::class,
    'category' => CategoryController::class
]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::resource('recipe', RecipeController::class);
//Route::resource('ingredient', IngredientController::class);



Route::get('/modify', function () {
    return view('modify');
})->middleware('admin')->name('modify');

require __DIR__.'/auth.php';
