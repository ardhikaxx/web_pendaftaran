<?php

namespace Database\Factories;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasienFactory extends Factory
{
    /**
     * Menentukan model yang akan dihasilkan oleh factory ini.
     *
     * @var string
     */
    protected $model = Pasien::class;

    /**
     * Mendefinisikan hasil dari setiap atribut model.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address,
            'nomor_telepon' => $this->faker->phoneNumber,
            'penyakit' => $this->faker->word,
        ];
    }
}