<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyTask extends Model
{
        protected $table="daily_tasks";

    protected $fillable=['name','slug','body', 'image', 'image2', 'image3'];
}
