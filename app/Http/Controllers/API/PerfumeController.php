<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// models
use App\Models\Perfume;

class PerfumeController extends Controller
{
    public function index(Request $request){

        // Ottieni il parametro 'brand' dalla query string
        $brandNames = $request->query('brand');
    
        // Se il parametro 'brand' è presente, lo esplodi in un array (se ci sono più brand separati da virgola)
        $brandNames = $brandNames ? explode(',', $brandNames) : [];
    
        // Inizializza la query per i profumi
        $query = Perfume::query();
    
        // Se sono stati passati dei brand da filtrare
        if (!empty($brandNames)) {
            foreach ($brandNames as $brandName) {
                $query->where('brand', $brandName);
            }
        }
    
        // Impaginazione dei profumi
        $perfumes = $query->orderBy('brand', 'asc')->get();
    
        return response()->json([
            'success' => true,
            'code' => 200,
            'perfumes' => $perfumes
        ]);
    }
    
}