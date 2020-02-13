<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'name'  => '',
        'email' => '',
    ];

    public function problems()
    {
        return $this->hasMany( Problem::class );
    }
}
