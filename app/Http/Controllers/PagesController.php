<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recipes;

class PagesController extends Controller
{
    public function index() {
        $recipes= recipes::join('images', 'recipes.image_id', '=', 'images.id')
            ->join('users', 'recipes.user_id', '=', 'users.id')
            ->select('recipes.name', 'method', 'difficulty', 'total_time', 'image_path', 'users.name as user_name')
            ->get();
       return view('index', compact('recipes')); 
    }
}
