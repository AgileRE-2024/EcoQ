<?php

namespace Database\Seeders;

use App\Models\PlantClass;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $orders = [
            'Bryopsida' => [
                ['name' => 'Bryaceae', 'description' => 'A family of mosses that includes genera such as Bryum, commonly found in temperate regions.'],
                ['name' => 'Brachytheciaceae', 'description' => 'Family of mosses including genera such as Brachythecium, which grow on tree trunks and rocks.'],
                ['name' => 'Grimmiaceae', 'description' => 'Family of mosses, characterized by their presence in arctic and alpine regions.'],
                ['name' => 'Dicranaceae', 'description' => 'A family of mosses that includes genera like Dicranum, commonly found in temperate forests and woodlands.'],
                ['name' => 'Pottiaceae', 'description' => 'A large family of mosses, typically found in dry, open habitats such as roadsides and rocky slopes.'],
                ['name' => 'Mniaceae', 'description' => 'Includes mosses such as Mnium and Rhynchostegium, which grow in damp habitats.'],
                ['name' => 'Orthotrichaceae', 'description' => 'Family of mosses found in a wide variety of habitats, including tropical and temperate zones.'],
            ],
            'Polytrichopsida' => [
                ['name' => 'Buxbaumiidae', 'description' => 'Buxbaumia species.'],
                ['name' => 'Diphysciidae', 'description' => 'Diphyscium species.'],
                ['name' => 'Timmiidae', 'description' => 'Timmia species.'],
            ],
            'Sphagnopsida' => [
                ['name' => 'Sphagnaceae', 'description' => 'Mosses of the genus Sphagnum.'],
                ['name' => 'Amblystegiaceae', 'description' => 'Mosses of the genus Amblystegium.'],
                ['name' => 'Calliergonaceae', 'description' => 'Mosses of the genus Calliergon.'],
            ],
            'Lycopodiopsida' => [
                ['name' => 'Lycopodiales', 'description' => 'Clubmosses.'],
                ['name' => 'Selaginellales', 'description' => 'Spike mosses.'],
                ['name' => 'Isoetales', 'description' => 'Quillworts.'],
            ],
            'Polypodiopsida' => [
                ['name' => 'Polypodiales', 'description' => 'True ferns.'],
                ['name' => 'Pteridales', 'description' => 'Includes the genus Pteris.'],
                ['name' => 'Cyatheales', 'description' => 'Tree ferns.'],
            ],
            'Equisetopsida' => [
                ['name' => 'Equisetales', 'description' => 'Horsetails.'],
                ['name' => 'Cannabaceae', 'description' => 'Includes hemp and cannabis species.'],
                ['name' => 'Thuidiaceae', 'description' => 'Moss family found in Equisetopsida.'],
            ],
            'Liliopsida' => [
                ['name' => 'Liliales', 'description' => 'Includes lilies and tulips.'],
                ['name' => 'Asparagales', 'description' => 'Includes asparagus and orchids.'],
                ['name' => 'Poales', 'description' => 'Includes grasses and cereals.'],
            ],
            'Magnoliopsida' => [
                ['name' => 'Caryophyllales', 'description' => 'Includes carnations and beets.'],
                ['name' => 'Rhamnales', 'description' => 'Includes buckthorns.'],
                ['name' => 'Rosales', 'description' => 'Includes apples and cherries.'],
            ],
            'Caryophyllales' => [
                ['name' => 'Caryophyllaceae', 'description' => 'Family of carnations and pinks.'],
                ['name' => 'Amaranthaceae', 'description' => 'Includes beets and spinach.'],
                ['name' => 'Chenopodiaceae', 'description' => 'Includes quinoa and beets.'],
            ],
            'Saccharomycetes' => [
                ['name' => 'Saccharomycetaceae', 'description' => 'Family of yeasts.'],
                ['name' => 'Candida', 'description' => 'Yeast genus including Candida albicans.'],
                ['name' => 'Saccharomyces', 'description' => 'Yeast genus including Saccharomyces cerevisiae.'],
            ],
            'Eurotiomycetes' => [
                ['name' => 'Eurotiaceae', 'description' => 'Fungi including Aspergillus species.'],
                ['name' => 'Trichocomaceae', 'description' => 'Family of fungi including Penicillium.'],
                ['name' => 'Aspergillaceae', 'description' => 'Fungi from the Aspergillus genus.'],
            ],
            'Pezizomycetes' => [
                ['name' => 'Pezizaceae', 'description' => 'Cup fungi and morels.'],
                ['name' => 'Helvellaceae', 'description' => 'Fungi including the genus Helvella.'],
                ['name' => 'Morchellaceae', 'description' => 'Fungi including morels.'],
            ],
            'Agaricomycetes' => [
                ['name' => 'Agaricaceae', 'description' => 'Mushrooms and gilled fungi.'],
                ['name' => 'Polyporaceae', 'description' => 'Bracket fungi and shelf fungi.'],
                ['name' => 'Boletaceae', 'description' => 'Includes boletes and their relatives.'],
            ],
            'Ustilaginomycetes' => [
                ['name' => 'Ustilaginaceae', 'description' => 'Smuts and plant pathogens.'],
                ['name' => 'Tilletiaceae', 'description' => 'Includes plant pathogen species.'],
                ['name' => 'Entylomataceae', 'description' => 'Fungi associated with plant diseases.'],
            ],
            'Pucciniomycetes' => [
                ['name' => 'Pucciniaceae', 'description' => 'Rust fungi species including Puccinia.'],
                ['name' => 'Melampsoraceae', 'description' => 'Includes rust fungi on willows.'],
                ['name' => 'Coleosporiaceae', 'description' => 'Rust fungi affecting grasses.'],
            ],
            'Mucoromycotina' => [
                ['name' => 'Mucoraceae', 'description' => 'Bread molds and other fungi.'],
                ['name' => 'Rhizopus', 'description' => 'Mold genus commonly found on food.'],
                ['name' => 'Mortierellaceae', 'description' => 'Fungi found in soil.'],
            ],
            'Entomophthoromycota' => [
                ['name' => 'Entomophthoraceae', 'description' => 'Fungi parasitic on insects.'],
                ['name' => 'Basal Entomophthoromycota', 'description' => 'More primitive fungal species.'],
                ['name' => 'Entomophthorales', 'description' => 'Includes species infecting insects.'],
            ],
            'Glomeromycota' => [
                ['name' => 'Glomeraceae', 'description' => 'Arbuscular mycorrhizal fungi species.'],
                ['name' => 'Acaulosporaceae', 'description' => 'Fungi in symbiosis with plant roots.'],
                ['name' => 'Gigasporaceae', 'description' => 'Large mycorrhizal fungi species.'],
            ],
            'Bacillariophyceae' => [
                ['name' => 'Naviculaceae', 'description' => 'Diatoms found in freshwater.'],
                ['name' => 'Achnanthaceae', 'description' => 'Includes diatoms that grow in biofilms.'],
                ['name' => 'Cymbellaceae', 'description' => 'Diatoms of marine environments.'],
            ],
            'Phaeophyceae' => [
                ['name' => 'Fucaceae', 'description' => 'Includes large brown algae.'],
                ['name' => 'Laminariales', 'description' => 'Kelp species.'],
                ['name' => 'Sargassaceae', 'description' => 'Includes Sargassum species.'],
            ],
            'Xanthophyceae' => [
                ['name' => 'Vaucheriaceae', 'description' => 'Yellow-green algae.'],
                ['name' => 'Xanthophyceae species', 'description' => 'Green and yellow algae.'],
                ['name' => 'Vaucheriella', 'description' => 'Includes species growing in freshwater.'],
            ],
            'Peronosporomycetes' => [
                ['name' => 'Peronosporaceae', 'description' => 'Water molds affecting plants.'],
                ['name' => 'Saprolegnaceae', 'description' => 'Includes water molds affecting fish.'],
            ],
            'Saprolegniales' => [
                ['name' => 'Saprolegniales species', 'description' => 'Water molds affecting aquatic organisms.'],
                ['name' => 'Achlya', 'description' => 'Water mold genus found in freshwater.'],
                ['name' => 'Saprolegnia', 'description' => 'Common mold in aquatic environments.'],
            ],
            'Albugonales' => [
                ['name' => 'Albugonaceae', 'description' => 'Water molds infecting plants.'],
                ['name' => 'Albugo species', 'description' => 'Affects cruciferous plants.'],
                ['name' => 'Bremia', 'description' => 'Affects vegetables like lettuce.'],
            ],
            'Prymnesiophyceae' => [
                ['name' => 'Coccolithophoraceae', 'description' => 'Marine algae with calcareous plates.'],
            ],
            'Isochrysidales' => [
                ['name' => 'Isochrysidaceae', 'description' => 'Marine algae found in oceans.'],
                ['name' => 'Prymnesiaceae', 'description' => 'Species of golden algae.'],
            ],
            'Eustigmatophyceae' => [
                ['name' => 'Eustigmataceae', 'description' => 'Marine and freshwater algae.'],
                ['name' => 'Stygobromus', 'description' => 'Aquatic algae found in freshwater.'],
                ['name' => 'Eustigmatophyceae species', 'description' => 'Includes photosynthetic marine algae.'],
            ],
        ];

        foreach ($orders as $className => $orderData) {
            $class = PlantClass::where('name', $className)->first();

            foreach ($orderData as $order) {
                Order::create([
                    'name' => $order['name'],
                    'description' => $order['description'],
                    'class_id' => $class->id,
                ]);
            }
        }
    }
}
