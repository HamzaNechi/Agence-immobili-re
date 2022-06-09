<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    protected $fillable = [
        'image','id_article'
    ];
}
