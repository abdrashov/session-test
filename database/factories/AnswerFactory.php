<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question_id' => mt_rand(1, 1000),
            'title' => $this->faker->text(mt_rand(7, 40)),
            'status' => mt_rand(0, 1),
        ];
    }
}
