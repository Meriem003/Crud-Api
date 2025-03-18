<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Category;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    // Afficher toutes les offres
    public function index()
    {
        $offers = Offer::with('category')->get(); // Charger la relation Category
        return response()->json($offers);
    }

    // Créer une nouvelle offre
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $offer = Offer::create($request->all());
        return response()->json($offer, 201);
    }

    // Mettre à jour une offre
    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->update($request->all());
        return response()->json($offer);
    }

    // Supprimer une offre
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return response()->json(['message' => 'Offer deleted']);
    }
}
