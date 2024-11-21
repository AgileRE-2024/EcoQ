<?php

namespace Database\Seeders;

use App\Models\Phylum;
use App\Models\Clas;
use App\Models\PlantClass;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    public function run()
    {
        $classes = [
            'Bryophyta' => [
                ['name' => 'Bryopsida', 'description' => 'True mosses.'],
                ['name' => 'Polytrichopsida', 'description' => 'Haircap mosses.'],
                ['name' => 'Sphagnopsida', 'description' => 'Sphagnum mosses.'],
            ],
            'Pteridophyta' => [
                ['name' => 'Lycopodiopsida', 'description' => 'Clubmosses.'],
                ['name' => 'Polypodiopsida', 'description' => 'True ferns.'],
                ['name' => 'Equisetopsida', 'description' => 'Horsetails.'],
            ],
            'Magnoliophyta' => [
                ['name' => 'Liliopsida', 'description' => 'Monocots.'],
                ['name' => 'Magnoliopsida', 'description' => 'Dicots.'],
                ['name' => 'Caryophyllales', 'description' => 'Carnations and beets.'],
            ],
            'Ascomycota' => [
                ['name' => 'Saccharomycetes', 'description' => 'Yeasts.'],
                ['name' => 'Eurotiomycetes', 'description' => 'Fungi such as Aspergillus.'],
                ['name' => 'Pezizomycetes', 'description' => 'Cup fungi.'],
            ],
            'Basidiomycota' => [
                ['name' => 'Agaricomycetes', 'description' => 'Mushrooms and bracket fungi.'],
                ['name' => 'Ustilaginomycetes', 'description' => 'Smuts.'],
                ['name' => 'Pucciniomycetes', 'description' => 'Rust fungi.'],
            ],
            'Zygomycota' => [
                ['name' => 'Mucoromycotina', 'description' => 'Bread molds.'],
                ['name' => 'Entomophthoromycota', 'description' => 'Insect pathogens.'],
                ['name' => 'Glomeromycota', 'description' => 'Arbuscular mycorrhizal fungi.'],
            ],
            'Heterokontophyta' => [
                ['name' => 'Bacillariophyceae', 'description' => 'Diatoms.'],
                ['name' => 'Phaeophyceae', 'description' => 'Brown algae.'],
                ['name' => 'Xanthophyceae', 'description' => 'Yellow-green algae.'],
            ],
            'Oomycota' => [
                ['name' => 'Peronosporomycetes', 'description' => 'Downy mildews.'],
                ['name' => 'Saprolegniales', 'description' => 'Water molds.'],
                ['name' => 'Albugonales', 'description' => 'Albugo.'],
            ],
            'Haptophyta' => [
                ['name' => 'Prymnesiophyceae', 'description' => 'Coccolithophorids.'],
                ['name' => 'Isochrysidales', 'description' => 'Marine algae.'],
                ['name' => 'Eustigmatophyceae', 'description' => 'Eustigmatophytes.'],
            ],
        ];

        foreach ($classes as $phylumName => $classesList) {
            $phylum = Phylum::where('name', $phylumName)->first();

            if ($phylum) {
                foreach ($classesList as $class) {
                    PlantClass::create([
                        'phylum_id' => $phylum->id,
                        'name' => $class['name'],
                        'description' => $class['description'],
                    ]);
                }
            }
        }
    }
}
