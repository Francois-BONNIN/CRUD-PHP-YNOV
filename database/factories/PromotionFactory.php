<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promotion;
use Faker\Generator as Faker;

$factory->define(Promotion::class, function (Faker $faker, $id) {
    return [
        'promotion_id' => $id,
        'name' => $faker -> randomElement($array = array('B1','B2','B3','M1','M2')),
        'speciality' => $faker -> randomElement($array = array('Informatique','Design','Marketing','Animation 3D','Audiovisuel'))
    ];
});
