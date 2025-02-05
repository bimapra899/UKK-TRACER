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
            'tahun_lulus' => 'required|string|unique:tb_tahun_lulus,tahun_lulus',
        ]);

        TahunLulus::create([
            'tahun_lulus' => $request->tahun_lulus,
            'keterangan' => $request->keterangan ?? null,
        ]);

        return redirect()->route('admin.tahun_lulus.index')->with('success', 'Tahun lulus berhasil ditambahkan.');
    }

    public function edit($tahun_lulus)
    {
        $tahun_lulus = TahunLulus::findOrFail($tahun_lulus);
        return view('admin.tahun_lulus.edit', compact('tahun_lulus'));
    }

    public function update(Request $request, $tahun_lulus)
    {
        $request->validate([
            'tahun_lulus' => 'required|string|unique:tb_tahun_lulus,tahun_lulus,' . $tahun_lulus . ',id_tahun_lulus',
        ]);

        $tahun_lulus = TahunLulus::findOrFail($tahun_lulus);
        $tahun_lulus->update([
            'tahun_lulus' => $request->tahun_lulus,
            'keterangan' => $request->keterangan ?? null,
        ]);

        return redirect()->route('admin.tahun_lulus.index')->with('success', 'Tahun lulus berhasil diperbarui.');
    }

    public function destroy($tahun_lulus)
    {
        $tahun_lulus = TahunLulus::findOrFail($tahun_lulus);
        // Cek apakah ada alumni yang menggunakan TahunLulus ini
        if ($tahun_lulus->alumni()->count() > 0) {
            return redirect()->route('admin.tahun_lulus.index')->with('error', 'Data Tahun Lulus tidak dapat dihapus karena masih digunakan oleh alumni.');
        }

        $tahun_lulus->delete();

        return redirect()->route('admin.tahun_lulus.index')->with('success', 'Tahun lulus berhasil dihapus.');
    }
}
