<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
         $user = User::factory();
         $category = Category::factory();
        return [
            'user_id'=>$user,
            'category_id'=>$category,
            'title'=>$this->faker->sentence,
            'image_path'=>$this->faker->image('public/images/',400,300,null,false),
            'slug'=>$this->faker->slug,
            'excerpt'=>$this->faker->sentence,
            'body'=>$this->faker->paragraph,

        ];
    }
}
