<?php

namespace Database\Factories;

use App\Models\Waitlist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Waitlist>
 */
class WaitlistFactory extends Factory
{
    protected $model = Waitlist::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(1),
            'user_id' => $this->faker->randomElement([1]),
            'submit_text' => $this->faker->sentence(1),
            'submit_color' => $this->faker->safeHexColor(),
            'success_message' => $this->faker->sentence(3),
            'shareable_link' => Str::uuid()->toString(),
            'is_shareable' => false,
        ];
    }
}
