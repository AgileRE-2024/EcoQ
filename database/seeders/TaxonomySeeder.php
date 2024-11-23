<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Phylum;
use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Kingdom;
use App\Models\PlantClass;
use App\Models\Species;
use Illuminate\Support\Facades\DB;

class TaxonomySeeder extends Seeder
{
    public function run()
    {
        // Tambahkan data Kingdom terlebih dahulu
        $kingdomId = Kingdom::where("name", "Plantae")->first()->id;

        $taxonomyData = [
            [
                'phylum' => 'Magnoliophyta',
                'classes' => [
                    [
                        'name' => 'Magnoliopsida',
                        'orders' => [
                            [
                                'name' => 'Urticales',
                                'families' => [
                                    [
                                        'name' => 'Moraceae',
                                        'genera' => [
                                            [
                                                'name' => 'Artocarpus',
                                                'species' => [],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Gentianales',
                                'families' => [
                                    [
                                        'name' => 'Apocynaceae',
                                        'genera' => [
                                            [
                                                'name' => 'Plumeria',
                                                'species' => [],
                                            ],
                                            [
                                                'name' => 'Rauvolfia',
                                                'species' => [
                                                    'Rauvolfia sumatrana Jack.',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Fabales',
                                'families' => [
                                    [
                                        'name' => 'Fabaceae',
                                        'genera' => [
                                            [
                                                'name' => 'Crotalaria',
                                                'species' => [
                                                    'Crotalaria retusa L.',
                                                ],
                                            ],
                                            [
                                                'name' => 'Parkia',
                                                'species' => [
                                                    'Parkia roxburghii G. Don.',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Sapindales',
                                'families' => [
                                    [
                                        'name' => 'Rutaceae',
                                        'genera' => [
                                            [
                                                'name' => 'Clausena',
                                                'species' => [
                                                    'Clausena lansium (Lour.) Skeels',
                                                ],
                                            ],
                                            [
                                                'name' => 'Citrus',
                                                'species' => [
                                                    'Citrus sp.',
                                                    'Citrus aurantifolia (Christm.) Swingle',
                                                ],
                                            ],
                                            [
                                                'name' => 'Limonia',
                                                'species' => [
                                                    'L acidissima',
                                                ],
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'Anacardiaceae',
                                        'genera' => [
                                            [
                                                'name' => 'Schinus',
                                                'species' => [
                                                    'Schinus terebinthifolius G. Raddl',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Myrtales',
                                'families' => [
                                    [
                                        'name' => 'Lythraceae',
                                        'genera' => [
                                            [
                                                'name' => 'Lawsonia',
                                                'species' => [
                                                    'Lawsonia inermis L.',
                                                ],
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'Myrtaceae',
                                        'genera' => [
                                            [
                                                'name' => 'Syzygium',
                                                'species' => [
                                                    'Syzygium sp.',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Rosales',
                                'families' => [
                                    [
                                        'name' => 'Crassulaceae',
                                        'genera' => [
                                            [
                                                'name' => 'Kalanchoe',
                                                'species' => [
                                                    'Kalanchoe sp.',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Asterales',
                                'families' => [
                                    [
                                        'name' => 'Asteraceae',
                                        'genera' => [
                                            [
                                                'name' => 'Coreopsis',
                                                'species' => [
                                                    'Coreopsis lanceolata L.',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Euphorbiales',
                                'families' => [
                                    [
                                        'name' => 'Euphorbiaceae',
                                        'genera' => [
                                            [
                                                'name' => 'Hura',
                                                'species' => [
                                                    'Hura crepitans L.',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Magnoliales',
                                'families' => [
                                    [
                                        'name' => 'Annonaceae',
                                        'genera' => [
                                            [
                                                'name' => 'Stelechocarpus',
                                                'species' => [
                                                    'Stelechocarpus burahol',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Solanales',
                                'families' => [
                                    [
                                        'name' => 'Solanaceae',
                                        'genera' => [
                                            [
                                                'name' => 'Physalis',
                                                'species' => [
                                                    'Physalis minima L.',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Proteales',
                                'families' => [
                                    [
                                        'name' => 'Proteaceae',
                                        'genera' => [
                                            [
                                                'name' => 'Helicia',
                                                'species' => [
                                                    'Helicia serrata (R.Br.) Bl.',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Violales',
                                'families' => [
                                    [
                                        'name' => 'Passifloraceae',
                                        'genera' => [
                                            [
                                                'name' => 'Passiflora',
                                                'species' => [
                                                    'Passiflora suberosa L.',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($taxonomyData as $phylumData) {
            $phylum = Phylum::firstOrCreate(['name' => $phylumData['phylum']]);

            foreach ($phylumData['classes'] as $classData) {
                $class = PlantClass::firstOrCreate(
                    ['name' => $classData['name'], 'phylum_id' => $phylum->id]
                );

                foreach ($classData['orders'] as $orderData) {
                    $order = Order::firstOrCreate(
                        ['name' => $orderData['name'], 'class_id' => $class->id]
                    );

                    foreach ($orderData['families'] as $familyData) {
                        $family = Family::firstOrCreate(
                            [
                                'name' => $familyData['name'],
                                'order_id' => $order->id
                            ]
                        );

                        foreach ($familyData['genera'] as $genusData) {
                            $genus = Genus::firstOrCreate(
                                ['name' => $genusData['name'], 'family_id' => $family->id]
                            );

                            foreach ($genusData['species'] as $speciesName) {
                                Species::firstOrCreate(
                                    [
                                        'name' => $speciesName,
                                        'genus_id' => $genus->id
                                    ]
                                );
                            }
                        }
                    }
                }
            }
        }
    }
}
