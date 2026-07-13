<?php

namespace Database\Factories;

use App\Models\CareerOpportunity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CareerOpportunity>
 */
class CareerOpportunityFactory extends Factory
{
    protected $model = CareerOpportunity::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'        => $this->faker->jobTitle(),
            'location'     => $this->faker->city(),
            'type'         => $this->faker->randomElement(['full-time', 'part-time', 'contract']),
            'description'  => $this->faker->paragraph(),
            'closing_date' => $this->faker->dateTimeBetween('+1 week', '+2 months'),
            'status'       => 'published',
        ];
    }
}
