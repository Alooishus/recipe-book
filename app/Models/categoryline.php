<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryline extends Model
{
    use HasFactory;

    protected $table = 'categorylines';
    protected $fillable = [
        'recipe_id',
        'category_id'
    ];
}
