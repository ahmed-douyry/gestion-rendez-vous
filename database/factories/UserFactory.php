<?php

namespace Database\Factories;

use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use function Laravel\Prompts\password;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => "123",
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'recovery_email' => $this->faker->unique()->safeEmail(),
            'role' => $this->faker->randomElement(['admin', 'member', 'guest', 'banned']),
            'status' => $this->faker->randomElement(['active', 'inactive', 'banned']),
            'signon_date' => $this->faker->dateTimeBetween('-1 year', '-1 month'),
            'last_login' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
    public function afterCreating(Closure $callback)
    {
        $json = File::get('./UsersPasswords.json');
        $data = json_decode($json);
        foreach ($data as $key => $value) {
            $callback($this->model)->update([
                'password' => Hash::make($value->password),
            ]);
        }
    }


    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
