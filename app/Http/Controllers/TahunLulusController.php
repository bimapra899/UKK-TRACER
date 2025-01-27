<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TahunLulus;
use Illuminate\Http\Request;

class TahunLulusController extends Controller
{
    public function index()
    {
        $tahun_lulus = TahunLulus::all();
        return view('admin.tahun_lulus.index', compact('tahun_lulus'));
    }

    public function create()
    {
        return view('admin.tahun_lulus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|string|unique:tb_tahun_lulus,tahun_lulus',
        ]);

        TahunLulus::create([
            'tahun_lulus' => $request->tahun,
            'keterangan' => $request->keterangan ?? null,
        ]);

        return redirect()->route('admin.tahun_lulus.index')->with('success', 'Tahun lulus berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tahun_lulus = TahunLulus::findOrFail($id);
        return view('admin.tahun_lulus.edit', compact('tahun_lulus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|string|unique:tb_tahun_lulus,tahun_lulus,' . $id . ',id_tahun_lulus',
        ]);

        $tahun_lulus = TahunLulus::findOrFail($id);
        $tahun_lulus->update([
            'tahun_lulus' => $request->tahun,
            'keterangan' => $request->keterangan ?? null,
        ]);

        return redirect()->route('admin.tahun_lulus.index')->with('success', 'Tahun lulus berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tahun_lulus = TahunLulus::findOrFail($id);
        $tahun_lulus->delete();

        return redirect()->route('admin.tahun_lulus.index')->with('success', 'Tahun lulus berhasil dihapus.');
    }
}
