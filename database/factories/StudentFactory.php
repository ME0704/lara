<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // added a Student factory to automatically fill students table
        return [
            'cne' => $this->faker->title(),
            'firstname' => $this->faker->firstName(),
            'secondname' => $this->faker->lastName(),
            'age' => $this->faker->buildingNumber(),
            'speciality' => $this->faker->text(),
        ];
    }
}
