<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // override guarded feature so we can create post
    protected $guarded = [];

    // one to many relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
