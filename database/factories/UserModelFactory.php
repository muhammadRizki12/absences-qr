<?php

namespace Database\Factories;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserModelFactory extends Factory
{
    protected $model = UserModel::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('123'),
            'nama' => $this->faker->name(),
            'nip' => $this->faker->unique()->numerify('##########'),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'jenjang_jabatan' => $this->faker->jobTitle(),
            'pangkat' => $this->faker->regexify('IV/[a-e]'),
            'golongan' => $this->faker->regexify('III/[a-e]'),
            'jabatan_tugas_utama' => $this->faker->jobTitle(),
            'jabatan_tugas_tambahan' => $this->faker->optional()->jobTitle(),
        ];
    }
}
