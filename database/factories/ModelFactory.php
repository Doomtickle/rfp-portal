<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name'    =>$faker->firstName,
        'last_name'     =>$faker->lastName,
        'company'       =>$faker->word,
        'email'         =>$faker->unique()->safeEmail,
        'password'      =>$password ?: $password=bcrypt('secret'),
        'remember_token'=>str_random(10),
    ];
});

$factory->define(App\ProposalRequest::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'clientName'      =>$faker->name,
        'user_id'         =>factory('App\User')->create()->id,
        'clientIndustry'  =>$faker->jobTitle,
        'campaignName'    =>$faker->colorName,
        'basicDescription'=>str_random(40),
        'flightDateStart' =>$faker->date('Y-m-d'),
        'flightDateEnd'   =>$faker->date('Y-m-d'),
        'staggered'       =>'Yes',
        'budget'          =>$faker->numberBetween(10000, 500000)

    ];


});

$factory->define(App\Client::class, function (Faker\Generator $faker) {

    return [
        'name'    =>$faker->company,
        'industry'=>$faker->jobTitle
    ];
});

$factory->define(App\ClientContact::class, function (Faker\Generator $faker) {

    return [
        'first_name'     =>$faker->firstName,
        'last_name'      =>$faker->lastName,
        'client_id'      =>factory('App\Client')->create()->id,
        'email'          =>$faker->email,
        'title'          =>$faker->jobTitle,
        'phone'          =>$faker->phoneNumber
    ];


});

