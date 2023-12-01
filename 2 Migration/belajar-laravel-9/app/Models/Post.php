<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //add mass assigntment
    protected $fillable = [
        'image',
        'title',
        'content',
    ];
}
