<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
     protected $table = 'uapi';
	 protected $fillable = [
        'name', 'fullname', 'html_url', 'description', 'url', 'size'
    ];
}
