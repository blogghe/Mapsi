<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    public function getGenderAttribute( $attribute )
    {
        return [
                   0 => 'male',
                   1 => 'female',
                   2 => ' other',
               ][ $attribute ];
    }
}
