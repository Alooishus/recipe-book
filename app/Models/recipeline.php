<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipeline extends Model
{
    use HasFactory;

    protected $table = 'recipelines';
    protected $fillable = [
        'recipe_id',
        'quantity',
        'unit_id',
        'ingredient_id',
    ];
}
