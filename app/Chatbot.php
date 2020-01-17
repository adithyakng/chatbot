<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Chatbot extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'chatdata';
    
    protected $fillable = [
        'keyword', 'value'
    ];
}