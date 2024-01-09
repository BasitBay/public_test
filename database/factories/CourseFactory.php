<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //this factory is associated with the Course model
    protected $model = Course::class;
    
    public function definition(): array
    {
        return [
            //Creates fake data for the Course model
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'max_participants' => $this->faker->numberBetween(10, 30),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
