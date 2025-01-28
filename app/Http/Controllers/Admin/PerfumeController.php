<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerfumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfumes = Perfume::all();
        return view('admin.perfumes.index', compact('perfumes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.perfumes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_perfume' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:2048',
            'img' => 'nullable|image|max:2048',
        ]);

        // Salva l'immagine se presente
        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('perfumes', 'public');
        }

        Perfume::create($validated);

        return redirect()->route('admin.perfumes.index')->with('success', 'Perfume created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perfume $perfume)
    {
        return view('admin.perfumes.show', compact('perfume'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perfume = Perfume::findOrFail($id);
        return view('admin.perfumes.edit', compact('perfume'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_perfume' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:2048',
            'img' => 'nullable|image|max:2048',
        ]);

        $perfume = Perfume::findOrFail($id);

        // Controlla se è stato richiesto di rimuovere l'immagine
        if ($request->has('remove_image') && $request->input('remove_image') == '1') {
            if ($perfume->img && Storage::disk('public')->exists($perfume->img)) {
                Storage::disk('public')->delete($perfume->img);
            }
            $perfume->img = null; // Resetta l'immagine
        }

        // Controlla se è stata caricata una nuova immagine
        if ($request->hasFile('img')) {
            // Rimuove l'immagine precedente se esiste
            if ($perfume->img && Storage::disk('public')->exists($perfume->img)) {
                Storage::disk('public')->delete($perfume->img);
            }

            // Salva la nuova immagine
            $validated['img'] = $request->file('img')->store('perfumes', 'public');
            $perfume->img = $validated['img'];
        }

        // Aggiorna gli altri campi
        $perfume->update($validated);

        return redirect()->back()->with('success', 'Dettagli del profumo aggiornati con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perfume $perfume)
    {
        // Elimina l'immagine se esiste
        if ($perfume->img && Storage::disk('public')->exists($perfume->img)) {
            Storage::disk('public')->delete($perfume->img);
        }

        $perfume->delete();

        return redirect()->route('admin.perfumes.index')->with('success', 'Perfume deleted successfully.');
    }
}
