<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\units;
use App\Models\recipes;
use App\Models\recipeline;
use App\Models\ingredients;
use App\Models\quantities;
use App\Models\images;

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
        return view('recipes.insert', ['units'=>$units, 'ingredients'=>$ingredients]);
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
        $ingredient = $request->input('ingredient');
        $quantity = $request->input('quantity');
        $unit = $request->input('unit');
        $method = $request->input('method');
        $cardImage = $request->file('cardImage');
        $picture = $request->file('picture');
        $cardImageID = '';
        $userID = Auth::id();

        $recipe = new recipes();
        $rLine = new recipeline();

        // Upload card image to images table and get the ID for the recipe table
        if($cardImage){
            // Add better validation for file upload as not even sure this is working
            $request->validate([
                'cardImage' => 'mimes:png,jpg,jpeg'
            ]);

            $newCardImageName = time() . '-' . $title . '.' . $cardImage->extension();
            $cardImage->move(public_path('images'), $newCardImageName);

            $image = new images();
            $image->image_path = $newCardImageName;
            $image->save();
            $cardImageID = $image->id;
        }

        // If we are uploading additional pictures, check how many, upload to images and save ID's for use in recipe line table
        if($picture){
            // Add validation for files
            $count = count($picture);
            $pictureArr = [];
            for($i=0;$i<$count;$i++){
                $newPicName = time() . '-' . $picture[$i]->getClientOriginalName(). '.' . $picture[$i]->extension();
                $picture[$i]->move(public_path('images'), $newPicName);

                $image = new images();
                $image->image_path = $newPicName;
                $image->save();
                array_push($pictureArr, $image->id);
            }
        }


        



        return 'end';
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
