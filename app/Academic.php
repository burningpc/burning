<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'id';
    }
}
