<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Register extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'login';
    
    protected $fillable = [
        'Username', 'Password','Email','Phonenumber'
    ];
}