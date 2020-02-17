<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Problem;
use Faker\Generator as Faker;

$factory->define( Problem::class, function ( Faker $faker ) {
    return [
        'service_id'  => factory(\App\Service::class)->create(),
        'title'       => $faker->name,
        'description' => $faker->text,
        'status'      => $faker->numberBetween( 0, 4 ),
    ];
} );
