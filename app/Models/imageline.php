<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imageline extends Model
{
    use HasFactory;

    protected $table = 'imagelines';
    protected $fillable = [
        'recipe_id',
        'image_id'
    ];
}
