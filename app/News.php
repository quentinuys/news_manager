<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //Validates the keys for mass update
    protected $fillable = [
        'title',
        'description',
        'image_path'
    ];
}
