<?php

namespace Database\Factories;

use App\Models\Category;
// use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $randomCategory = Category::all()->random(); //TODO: my solution #mod8_lesson16
    // $randomUser = User::all()->random(); //TODO: teacher's solution

    return [
      'is_done' => $this->faker->boolean(),
      'title' => $this->faker->text(30),
      'description' => $this->faker->text(60),
      'due_date' => $this->faker->dateTime(),
      'user_id' => $randomCategory->user_id, //TODO: my solution
      'category_id' => $randomCategory->id //TODO: my solution
    ];
  }
}

/**
 ( ⛔ TEACHER'S SOLUCTION: Pode acontecer de um usuário não ter criado uma categoria, sendo possível ocasionar um erro ao inputar "category_id" na factory )
 */
