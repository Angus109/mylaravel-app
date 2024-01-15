<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded = [];

    public function user () {
        return $this->belongsTo('App\User');
    }

    public function submittask () {
        return $this->belongsTo('App\SubmitTask');
    }
}
