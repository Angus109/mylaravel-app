<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeBoard extends Model
{
    protected $table="noticeboards";

    protected $fillable = ['title', 'description', 'status', 'slug', 'image'];
}
