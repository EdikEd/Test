<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkHistory extends Model
{
    protected $fillable = [
      'shortUrl','ip','userAgent'
    ];
}
