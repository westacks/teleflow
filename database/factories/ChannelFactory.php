<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChannelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Channel::class;

    /**
     * Collection of user ID's to init relation
     *
     * @var mixed
     */
    private $users = false;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->randomNumber(),
            'title' => $this->faker->sentence(2),
            'photo_url' => "https://picsum.photos/640",
            'description' =>  $this->faker->paragraph(),
            'user_id' => $this->users()->random()
        ];
    }

    private function users() {
        if ($this->users === false) {
            return $this->users = User::pluck('id');
        }
        return $this->users;
    }
}
