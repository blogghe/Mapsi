<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'name'      => '',
        'email'     => '',
        'birthdate' => '',
        'gender'    => '0',
        'street'    => '',
        'sNumber'   => '',
        'bus'       => '',
        'city'      => '',
        'zip'       => '',
        'phone'     => '',
    ];

    public function getGenderAttribute( $attribute )
    {
        return $this->genderOptions()[ $attribute ];
    }

    public function genderOptions()
    {
        return [
            0 => trans( 'text.male' ),
            1 => trans( 'text.female' ),
            2 => trans( 'text.other' ),
        ];
    }

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function problems()
    {
        return $this->hasMany( Problem::class );
    }
}
