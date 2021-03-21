<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [ 
            'code' => str_replace(' ', '-', str_replace('.', '', $this->faker->unique()->text(80))),
            'user_id' => mt_rand(1, 5),
            'title' => $this->faker->unique()->text(40),
        ];
    }
}
