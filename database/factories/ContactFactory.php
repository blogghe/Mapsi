<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define( Contact::class, function ( Faker $faker ) {
    return [
        'name'      => $faker->name,
        'email'     => $faker->unique()->safeEmail,
        'street'    => $faker->streetName,
        'sNumber'   => $faker->randomDigit,
        'bus'       => $faker->randomDigit,
        'city'      => $faker->city,
        'zip'       => $faker->randomDigit,
        'gender'    => $faker->numberBetween( 0, 2),
        'phone'     => $faker->randomDigit,
        'birthdate' => $faker->date(),
    ];
} );
