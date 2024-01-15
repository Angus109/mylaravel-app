<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LGA extends Model
{
    protected $table = "local_governments";

    protected $fillable = ['name'];
}
