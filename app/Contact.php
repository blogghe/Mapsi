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
            0 => 'male',
            1 => 'female',
            2 => 'other',
        ];
    }
}
