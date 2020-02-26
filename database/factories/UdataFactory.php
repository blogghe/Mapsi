<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Udata;
use Faker\Generator as Faker;

$factory->define( Udata::class, function ( Faker $faker ) {
    return [
        'type'     => 0,
        'phone'    => " ",
        'language' => 0,
        'selfmail' => 0,
    ];
    /*return [
        'type'     => $faker->numberBetween( 0, 3 ),
        'phone'    => "133256",
        'language' => $faker->numberBetween( 0, 4 ),
        'selfmail' => $faker->numberBetween( 0, 1 ),
    ];*/
} );
