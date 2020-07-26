<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class facultad extends Model
{
    //
    protected $fillable = ['id_Decano','nombre','estado'];
    protected $table = ('facultades');

}
