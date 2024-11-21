<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kingdom;
use App\Models\Phylum;

class PhylumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kingdoms = [
            'Plantae' => [
                ['name' => 'Bryophyta', 'description' => 'Mosses and liverworts.'],
                ['name' => 'Pteridophyta', 'description' => 'Ferns and horsetails.'],
                ['name' => 'Magnoliophyta', 'description' => 'Flowering plants.'],
            ],
            'Fungi' => [
                ['name' => 'Ascomycota', 'description' => 'Sac fungi.'],
                ['name' => 'Basidiomycota', 'description' => 'Club fungi.'],
                ['name' => 'Zygomycota', 'description' => 'Bread molds.'],
            ],
            'Chromista' => [
                ['name' => 'Heterokontophyta', 'description' => 'Brown algae and diatoms.'],
                ['name' => 'Oomycota', 'description' => 'Water molds.'],
                ['name' => 'Haptophyta', 'description' => 'Coccolithophores.'],
            ],
        ];

        foreach ($kingdoms as $kingdomName => $phylums) {
            $kingdom = Kingdom::where('name', $kingdomName)->first();

            if ($kingdom) {
                foreach ($phylums as $phylum) {
                    Phylum::create([
                        'kingdom_id' => $kingdom->id,
                        'name' => $phylum['name'],
                        'description' => $phylum['description'],
                    ]);
                }
            }
        }
    }
}
