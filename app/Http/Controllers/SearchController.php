<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Garden;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 12);

        // Start with a base query
        $query = Plant::query();

        // Apply Scout search if keyword is provided
        if ($request->filled('keyword')) {
            $query->whereIn('id', Plant::search($request->keyword)->keys());
        }


        // Filter by tags
        if ($request->filled('tags')) {
            $tagIds = is_array($request->tags) ? $request->tags : explode(',', $request->tags);
            $query->whereHas('tags', function (Builder $q) use ($tagIds) {
                $q->whereIn('tags.id', $tagIds);
            });
        }

        // Apply sorting
        switch ($request->input('sort', 'newest')) {
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default: // newest
                $query->orderBy('created_at', 'desc');
                break;
        }

        // Eager load relationships
        $query->with(['tags']);

        // Execute query with pagination
        $plants = $query->paginate($perPage)->withQueryString();

        // Get all available filters
        $tags = Tag::orderBy('name')->get();
        $gardens = Garden::orderBy('name')->get();

        if ($request->ajax()) {
            return view('partials.plants', compact('plants'));
        }

        return view('pages.search.index', compact('plants', 'tags', 'gardens'));
    }

    public function search(Request $request)
    {
        $query = Plant::query();

        if ($request->has('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->has('gardens')) {
            $gardenIds = explode(',', $request->gardens);
            $query->whereIn('garden_id', $gardenIds);
        }

        if ($request->has('tags')) {
            $tagIds = explode(',', $request->tags);
            $query->whereHas('tags', function ($q) use ($tagIds) {
                $q->whereIn('tags.id', $tagIds);
            });
        }

        $plants = $query->get();

        return view('partials.plants', compact('plants'));
    }
}
