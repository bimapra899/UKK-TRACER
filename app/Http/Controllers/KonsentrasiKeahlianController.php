<?php

namespace App\Http\Controllers;

use App\Models\KonsentrasiKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KonsentrasiKeahlianController extends Controller
{
    // Menampilkan daftar konsentrasi keahlian
    public function index()
    {
        // dd('ok');
        $konsentrasiKeahlian = KonsentrasiKeahlian::with('programKeahlian')->get();

        return view('admin.konsentrasi_keahlian.index', compact('konsentrasiKeahlian'));
    }
    

    // Menampilkan form tambah data
    public function create()
    {
        $programKeahlian = ProgramKeahlian::all(); // Ambil semua data dari `tbl_program_keahlian`
        return view('admin.konsentrasi_keahlian.create', compact('programKeahlian'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        //dd('ok');
        $request->validate([
            'id_program_keahlian' => 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => 'required|unique:tbl_konsentrasi_keahlian,kode_konsentrasi_keahlian',
            'konsentrasi_keahlian' => 'required',
        ]);

        KonsentrasiKeahlian::create([
            'id_program_keahlian' => $request->id_program_keahlian,
            'kode_konsentrasi_keahlian' => $request->kode_konsentrasi_keahlian,
            'konsentrasi_keahlian' => $request->konsentrasi_keahlian,
        ]);

        return redirect()->route('admin.konsentrasi_keahlian.index')
            ->with('success', 'Konsentrasi keahlian berhasil ditambahkan.');
    }

    // Menampilkan form edit data
    public function edit($id)
    {
        // dd('ok');
        $konsentrasi = KonsentrasiKeahlian::findOrFail($id);
        $programKeahlian = ProgramKeahlian::all();
        return view('admin.konsentrasi_keahlian.edit', compact('konsentrasi', 'programKeahlian'));
    }

    // Menyimpan perubahan data
    public function update(Request $request, $id)
    {
        $konsentrasi = KonsentrasiKeahlian::findOrFail($id);
    
        ///dd('ok');
        $request->validate([
            'id_program_keahlian' => 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => [
                'required',
                Rule::unique('tbl_konsentrasi_keahlian', 'kode_konsentrasi_keahlian')
                    ->ignore($konsentrasi->id_konsentrasi_keahlian, 'id_konsentrasi_keahlian')
            ],
            'konsentrasi_keahlian' => 'required',
        ]);

        $konsentrasi->update([
            'id_program_keahlian' => $request->id_program_keahlian,
            'kode_konsentrasi_keahlian' => $request->kode_konsentrasi_keahlian,
            'konsentrasi_keahlian' => $request->konsentrasi_keahlian,
        ]);

        return redirect()->route('admin.konsentrasi_keahlian.index')
            ->with('success', 'Konsentrasi keahlian berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy($id)
    {
        $konsentrasi = KonsentrasiKeahlian::findOrFail($id);
        $konsentrasi->delete();

        return redirect()->route('admin.konsentrasi_keahlian.index')
            ->with('success', 'Konsentrasi keahlian berhasil dihapus.');
    }
}
