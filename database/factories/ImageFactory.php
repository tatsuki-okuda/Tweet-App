<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // ディレクトリがなければ作成する
        if (!Storage::exists('public/images')) {
            Storage::makeDirectory('public/images');
        }
        return [
            //これだとfakerの不具合で0が帰ってくる
            // https://teratail.com/questions/4l2z4rtsvk8dkl
            // 'name' => $this->faker->image(storage_path('app/public/images'), 640, 480, null, false)
            'name' => 'https://i.picsum.photos/id/619/680/480.jpg?hmac=7lc3zLGnaOQfBFX4XHTRjy5ISbOGZtYqS6ZnT3KIXz8'
        ];
    }
}
