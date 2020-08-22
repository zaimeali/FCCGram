<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];

    public function user()
    {
        // it will create the relationship and will fetch the user_id
        return $this->belongsTo(User::Class);
    }
}
