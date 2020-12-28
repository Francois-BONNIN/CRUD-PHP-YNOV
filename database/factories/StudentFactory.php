<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker, $id) {
    return [
        'promotion_id' => $id,
        'firstname' => $faker -> firstname,
        'lastname' => $faker -> lastname,
        'email' => $faker -> email
    ];
});
