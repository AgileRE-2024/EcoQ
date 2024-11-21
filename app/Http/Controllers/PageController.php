<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use App\Models\Garden;
use App\Models\Event;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function index()
    {
        $posts = [
            [
                'title' => 'Plants Around Us',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt facilisis nuncLorem ipsum dolor sit amet, consectetur adipiscing elit. elit. Tincidunt facilisis nuncLorem ipsum dolor sit amet, consectetur adipiscing elit. elit. Tincidunt facilisis nuncLorem ipsum dolor sit amet, consectetur adipiscing elit',
                'date' => 'December 23, 2021',
                'image' => 'plant.jpeg',
                'featured' => true,
            ],
            [
                'title' => 'Lorem Ipsum',
                'description' => 'Lorem ipsum dolor sit amet, consectetur donec adipiscing elit. Tincidunt facilisis nunc lorem.',
                'date' => 'December 16, 2021',
                'image' => 'plant.jpeg',
                'featured' => false,
            ],
            [
                'title' => 'Lorem Ipsum',
                'description' => 'Lorem ipsum dolor sit amet, consectetur donec adipiscing elit. Tincidunt facilisis nunc lorem.',
                'date' => 'November 11, 2021',
                'image' => 'plant.jpeg',
                'featured' => false,
            ],
            [
                'title' => 'Lorem Ipsum',
                'description' => 'Lorem ipsum dolor sit amet, consectetur donec adipiscing elit. Tincidunt facilisis nunc lorem.',
                'date' => 'November 3, 2021',
                'image' => 'plant.jpeg',
                'featured' => false,
            ],
        ];
        return view("welcome", compact("posts"));
    }

    public function plants()
    {
        $featuredPlants = [
            [
                'name' => 'Monstera Deliciosa',
                'image' => '/placeholder.svg?height=300&width=400',
                'category' => 'Indoor',
                'care' => 'Medium Care',
                'description' => 'Known for its unique leaf patterns and air-purifying qualities.',
            ],
            [
                'name' => 'Lavender',
                'image' => '/placeholder.svg?height=300&width=400',
                'category' => 'Outdoor',
                'care' => 'Low Maintenance',
                'description' => 'Fragrant herb with beautiful purple flowers, perfect for gardens.',
            ],
            [
                'name' => 'Echeveria Elegans',
                'image' => '/placeholder.svg?height=300&width=400',
                'category' => 'Succulent',
                'care' => 'Low Care',
                'description' => 'A beautiful rosette-shaped succulent with pale blue-green leaves.',
            ],
        ];
        $plants = Plant::paginate(10);
        return view("pages.plants.index", compact("featuredPlants", "plants"));
    }

    public function showPlant(Plant $plant)
    {
        $relatedPlants = Plant::where('id', '!=', $plant->id)
            ->whereHas('classification', function ($query) use ($plant) {
                $query->where('genus', $plant->classification->genus)
                    ->orWhere('family', $plant->classification->family);
            })
            ->take(4)
            ->get();

        return view("pages.plants.show", compact("plant", "relatedPlants"));
    }


    public function indexGardens()
    {
        $gardens = Garden::orderBy("name", "asc")->paginate(5);
        $featuredGardens =
            Garden::orderBy("name", "asc")->paginate(5);
        return view("pages.gardens.index", compact("gardens", "featuredGardens"));
    }

    public function indexEvents()
    {
        $events = Event::orderBy("title", "asc")->paginate(5);
        return view("pages.events.index", compact("events"));
    }
}
