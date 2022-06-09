<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $fillable = [
        'nom','tel','message','ref_article','id_article'
    ];
}
