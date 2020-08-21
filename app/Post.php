<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // one to many relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
