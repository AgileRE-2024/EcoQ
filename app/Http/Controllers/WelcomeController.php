<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Mocking Data
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

        return view('welcome', compact('posts'));
    }
}
