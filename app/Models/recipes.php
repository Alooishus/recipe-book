<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipes extends Model
{
    use HasFactory;

    protected $table = 'recipes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'method',
        'total_time',
        'difficulty',
        'user_id',
        'image_id'
    ];
}
