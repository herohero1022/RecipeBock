<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prosess extends Model
{
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
