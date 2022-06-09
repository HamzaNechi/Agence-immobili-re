<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $fillable = [
        'ref','nom','type' ,'image', 'lieu','superficie','prix','date','description','titre','objectif','louerpar','status',
    ];
}
