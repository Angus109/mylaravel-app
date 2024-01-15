<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
        protected $fillable = [
        'name', 'email', 'phone', 'address', 'amount', 'payment_status', 'reference', 'status', 'payment_type', 'user_id', 'plan', 'verification_status', 'plan'
    ];

    public function user () {
        return $this->belongsTo('App\User');
    }
}
