<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class History extends Eloquent
{
    protected $connection = 'mongodb_conn';
    protected $collection = 'chat_history';
    
    protected $fillable = [
        'Username', 'bot','user'
    ];
}