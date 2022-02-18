<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\recipes;

class PagesController extends Controller
{
    public function index() {
        $recipes = DB::table('recipes')
            ->join('images', 'recipes.image_id', '=', 'images.id')
            ->join('users', 'recipes.user_id', '=', 'users.id')
            ->select('recipes.id', 'recipes.name', 'method', 'difficulty', 'total_time', 'image_path', 'users.name as user_name')
            ->get(); 
       return view('index', compact('recipes')); 
    }

    public function recipePage($id) {
        $recipe = DB::table('recipes')
            ->join('images', 'recipes.image_id', '=', 'images.id')
            ->join('users', 'recipes.user_id', '=', 'users.id')
            ->where ('recipes.id', $id)
            ->select('recipes.id', 'recipes.name', 'method', 'difficulty', 'total_time', 'image_path', 'users.name as user_name')
            ->get();

        $lines = DB::table('recipelines')
            ->join('ingredients', 'recipelines.ingredient_id', '=', 'ingredients.id')
            ->join('units', 'recipelines.unit_id', '=', 'units.id')
            ->where('recipe_id', $id)
            ->select('ingredients.name as ingredient', 'quantity', 'units.name as unit')
            ->get();
        
        //$images = DB::table('images')
            
        return view('recipes.index', compact('recipe', 'lines'));
    }
}
