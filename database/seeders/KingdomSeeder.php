<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kingdom;


class KingdomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kingdoms = [
            ['name' => 'Plantae', 'description' => 'Kingdom of plants, including trees, flowers, and grasses.'],
            ['name' => 'Animalia', 'description' => 'Kingdom of animals, including mammals, birds, and insects.'],
            ['name' => 'Fungi', 'description' => 'Kingdom of fungi, including mushrooms, yeasts, and molds.'],
            ['name' => 'Protista', 'description' => 'Kingdom of protists, including algae and protozoa.'],
            ['name' => 'Archaea', 'description' => 'Kingdom of archaea, single-celled microorganisms.'],
            ['name' => 'Bacteria', 'description' => 'Kingdom of bacteria, single-celled microorganisms.'],
            ['name' => 'Chromista', 'description' => 'Kingdom of chromists, including certain algae and protists.'],
        ];

        foreach ($kingdoms as $kingdom) {
            Kingdom::create($kingdom);
        }
    }
}
