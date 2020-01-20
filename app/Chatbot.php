<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Chatbot extends Eloquent
{
    protected $connection = 'mongodb_conn';
    protected $collection = 'chatdata';
    
    protected $fillable = [
        'keyword', 'value'
    ];
}