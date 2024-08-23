<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->title,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'mobile_phone' => $this->faker->phoneNumber,
            'date_of_birth' => $this->faker->date,
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'member_number' => $this->faker->unique()->numerify('MEM###'),
            'joined_at' => $this->faker->dateTimeThisDecade,
            'is_active' => $this->faker->boolean,
            'role_id' => 4,
            'last_login_at' => $this->faker->dateTimeThisYear,
        ];
    }
}
