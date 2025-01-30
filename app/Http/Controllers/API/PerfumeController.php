<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// models
use App\Models\Perfume;

class PerfumeController extends Controller
{
    public function index(){

        // paginazione per mostrarne 5 a pagina
        $perfumes = Perfume::orderBy('brand', 'asc')->paginate(12);

        return response()->json([
            'success' => true,
            'code' => 200,
            'perfumes' => $perfumes
        ]);
    }

    public function show(string $id){
        $perfumes = Perfume::where('id', $id)->first();

        if($perfumes){
            return response()->json([
                'success' => true,
                'code' => 200,
                'perfumes' => $perfumes
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Profumo non trovato'
            ]);
        }
    }
}