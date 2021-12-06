<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 500),
            'eventTitle' => 'event' . ucfirst($this->faker->text(30)),
            'eventDate' => $this->faker->dateTime,
            'eventType' => array_rand(['view'=>'view','addtocart'=>'addtocart','subscribe'=>'subscribe']), // Randomize preset values
            'eventMessage' => array_rand(['View product X'=>'View product X','Added product X'=>'Added product X','Subscribed to X'=>'Subscribed to X']), // Randomize preset values
        ];
    }
}
