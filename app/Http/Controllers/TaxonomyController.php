<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kingdom;
use App\Models\Phylum;
use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;
use App\Models\PlantClass;
use App\Models\Species;


class TaxonomyController extends Controller
{
    public function getKingdoms(Request $request)
    {
        $query = $request->get('query');
        return Kingdom::where('name', 'like', "%{$query}%")->get();
    }

    public function getPhylums(Request $request)
    {
        $kingdomId = $request->get('kingdom_id');
        $query = $request->get('query');
        return Phylum::where('kingdom_id', $kingdomId)
            ->where('name', 'like', "%{$query}%")
            ->get();
    }

    public function getClasses(Request $request)
    {
        $phylumId = $request->get('phylum_id');
        $query = $request->get('query');
        return PlantClass::where('phylum_id', $phylumId)
            ->where('name', 'like', "%{$query}%")
            ->get();
    }

    public function getOrders(Request $request)
    {
        $classId = $request->get('class_id');
        $query = $request->get('query');
        return Order::where('class_id', $classId)
            ->where('name', 'like', "%{$query}%")
            ->get();
    }

    public function getFamilies(Request $request)
    {
        $orderId = $request->get('order_id');
        $query = $request->get('query');
        return Family::where('order_id', $orderId)
            ->where('name', 'like', "%{$query}%")
            ->get();
    }

    public function getGenera(Request $request)
    {
        $familyId = $request->get('family_id');
        $query = $request->get('query');
        return Genus::where('family_id', $familyId)
            ->where('name', 'like', "%{$query}%")
            ->get();
    }

    public function getSpecies(Request $request)
    {
        $genusId = $request->get('genus_id');
        $query = $request->get('query');
        return Species::where('genus_id', $genusId)
            ->where('name', 'like', "%{$query}%")
            ->get();
    }
}
