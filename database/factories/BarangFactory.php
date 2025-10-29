<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    protected $model = Barang::class;

    public function definition(): array
    {
        return [
            'nama_barang' => $this->faker->word(),
            'stok' => $this->faker->numberBetween(1, 100),
            'kategori_id' => Kategori::inRandomOrder()->first()->id ?? Kategori::factory(),
        ];
    }
}

