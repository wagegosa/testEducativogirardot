<?php

namespace Database\Factories;

use App\Models\Career;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = User::class;

    public function definition()
    {
        $gender = $this->faker->randomElement(['male','female']);
        $dateBirth = $this->faker->dateTimeBetween($startDate = '-33 years', $endDate = '-20 years');

        return [
            'name' => $this->faker->firstName($gender).' '.$this->faker->lastName
            ,'email' => $this->faker->unique()->safeEmail()
            ,'date_birth' => $dateBirth
            ,'gender' => $gender
            ,'identity_number' => $this->faker->unique()->numerify('########')
            ,'career_id' => Career::all()->random()->id()
            ,'password' => Hash::make('password')
            ,'email_verified_at' => Carbon::now()
            ,'remember_token' => Str::random(10)
        ];
    }
}
