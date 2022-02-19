<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\units;
use App\Models\recipes;
use App\Models\recipeline;
use App\Models\ingredients;
use App\Models\images;
use App\Models\categories;
use App\Models\categoryline;
use App\Models\imageline;

class RecipeController extends Controller
{
    /* *
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = units::all();
        $ingredients = ingredients::all();
        $categories = categories::all();
        return view('recipes.insert', ['units'=>$units, 'ingredients'=>$ingredients, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $title = $request->input('title');
        $difficulty = $request->input('difficulty');
        $total_time = $request->input('hours') .'-'. $request->input('minutes');
        $ingredient = $request->input('ingredient');
        $quantity = $request->input('quantity');
        $unit = $request->input('unit');
        $method = $request->input('method');
        $tags = $request->input('category');
        $userID = Auth::id();
        
        // Check if there is a card image file otherwise use the default
        if($request->file('cardImage')){
            
            // Validator and Upload for recipe card homepage image
            $request->validate([
                'cardImage.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
            ]);
            // check if file exist 
            if($request->hasFile('cardImage')){
                $cardImage = $request->file('cardImage');
                $newCardImageName = time() . '-' . $title . '.' . $cardImage->extension();
                $cardImage->storeAs('public/',$newCardImageName);
            }
        }else{
            $newCardImageName = 'Fam 2021.jpg';
        }
        
        $image = new images();
        $image->image_path = $newCardImageName;
        $image->save();
        $cardImageID = $image->id;

        $recipe = new recipes();
        $recipe->name = $title;
        $recipe->method = $method;
        $recipe->total_time = $total_time;
        $recipe->difficulty = $difficulty;
        $recipe->user_id = $userID;
        $recipe->image_id = $cardImageID;
        $recipe->save();
        $recipeID = $recipe->id;

        // If categories are choosen, add them to category line table
        if($tags){
            //$catCount = count($tags);
            for($i=0;$i<count($tags);$i++){
                $category = new categoryline();
                $category->recipe_id = $recipeID;
                $category->category_id = $tags[$i];
                $category->save();
            }
        }

        // Validator and Upload for pictures that will appear on the the actual recipe
       if($request->file('picture')){
            // Add validation for files

            $request->validate([
                'picture.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
            ]);
            
            // check if file exist 
            if($request->hasFile('picture')){
                $picture = $request->file('picture');
            }
            $pictureCount = count($picture);
            for($i=0;$i<$pictureCount;$i++){
                $newPicName = time() . '-' . $picture[$i]->getClientOriginalName(). '.' . $picture[$i]->extension();
                $picture[$i]->storeAs('public/',$newPicName);

                $image = new images();
                $image->image_path = $newPicName;
                $image->save();
                
                $imageLine = new imageline();
                $imageLine->recipe_id = $recipeID;
                $imageLine->image_id = $image->id;
                $imageLine->save();
            }
        }
        
        $lineCount = count($ingredient);
        for($i=0;$i<$lineCount;$i++){
            $rLine = new recipeline();
            $rLine->recipe_id = $recipeID;
            $rLine->quantity = $quantity[$i];
            $rLine->unit_id = $unit[$i];
            $rLine->ingredient_id = $ingredient[$i];
            $rLine->save();
        }

        return redirect('/recipe/create')->with('status', 'Recipe Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
