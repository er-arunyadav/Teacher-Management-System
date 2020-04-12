<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
	$filePath = storage_path('images');
    return [
       'full_name' => $faker->name,
       'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
       'gender' => $faker->randomElement(['male', 'female'])[0],
       'contact_mobile' => $faker->phoneNumber,
       'contact_mail' => $faker->unique()->safeEmail,
       'class' => $faker->randomDigitNotNull,
       'avatar' => ''

    ];
});
