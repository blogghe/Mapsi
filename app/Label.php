<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    //what can be passed down by a form
    protected $fillable = [ 'name','user_id' ];

    public function user()
    {
        return $this->belongsTo( User::class );
    }
    public function problems()
    {
        return  $this->belongsToMany(Problem::class);
    }
}
