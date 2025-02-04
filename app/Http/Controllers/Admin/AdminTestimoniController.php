<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Alumni;

class AdminTestimoniController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonis = Testimoni::paginate(10); // or whatever number you want per page
    return view('admin.testimoni.index', compact('testimonis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumni = Alumni::all();
        return view('admin.testimoni.create', compact('alumni'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'testimoni' => 'required|string|max:65535',
            'tgl_testimoni' => 'required|date'
        ]);

        Testimoni::create($validated);

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $alumni = Alumni::all();
        return view('admin.testimoni.edit', compact('testimoni', 'alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'testimoni' => 'required|string',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $testimoni->update([
            'testimoni' => $request->testimoni,
            'tgl_testimoni' => now(),
        ]);

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}