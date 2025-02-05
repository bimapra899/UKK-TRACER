<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\BidangKeahlian;
use Illuminate\Validation\Rule;

class ProgramKeahlianController extends Controller
{
    /**
     * Tampilkan daftar program keahlian.
     */
    public function index()
    {
        $programKeahlian = ProgramKeahlian::with('bidangKeahlian')->get(); // Ambil semua data program keahlian beserta bidang keahlian
        return view('admin.program_keahlian.index', compact('programKeahlian'));
        dd($programKeahlian); // Debug data
        
    }

    /**
     * Tampilkan form tambah program keahlian.
     */
    public function create()
{
    // Ambil data bidang keahlian untuk dropdown
    $bidangKeahlian = BidangKeahlian::all();
    
    // Initialize empty program keahlian
    $programKeahlian = new ProgramKeahlian();
    
    return view('admin.program_keahlian.create', compact('bidangKeahlian', 'programKeahlian'));
}

    /**
     * Simpan program keahlian baru.
     */
    public function store(Request $request)
    {
        $messages = [
            'kode_program_keahlian.required' => 'Kode program keahlian wajib diisi',
            'kode_program_keahlian.numeric' => 'Kode program keahlian harus berupa angka',
            'kode_program_keahlian.unique' => 'Kode program keahlian sudah digunakan',
            'nama_program_keahlian.required' => 'Nama program keahlian wajib diisi',
        ];

        $request->validate([
            'kode_program_keahlian' => [
                'required',
                'numeric',
                Rule::unique('tbl_program_keahlian', 'kode_program_keahlian')
                    ->ignore($request->id_program_keahlian, 'id_program_keahlian')
            ],
            'nama_program_keahlian' => 'required'
        ], $messages);

        ProgramKeahlian::create([
            'id_bidang_keahlian' => $request->id_bidang_keahlian,
            'kode_program_keahlian' => $request->kode_program_keahlian,
            'program_keahlian' => $request->program_keahlian,
        ]);

        return redirect()->route('admin.program_keahlian.index')->with('success', 'Program Keahlian berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit program keahlian.
     */
    public function edit($id)
{
    try {
        $program = ProgramKeahlian::findOrFail($id);
        $bidangKeahlian = BidangKeahlian::all();
        
        return view('admin.program_keahlian.edit', compact('program', 'bidangKeahlian'));
    } catch (\Exception $e) {
        return redirect()->route('admin.program_keahlian.index')
            ->with('error', 'Program Keahlian tidak ditemukan');
    }
}


    /**
     * Update program keahlian.
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'kode_program_keahlian.required' => 'Kode program keahlian wajib diisi',
            'kode_program_keahlian.numeric' => 'Kode program keahlian harus berupa angka',
            'kode_program_keahlian.unique' => 'Kode program keahlian sudah digunakan',
            'nama_program_keahlian.required' => 'Nama program keahlian wajib diisi',
        ];

        $request->validate([
            'kode_program_keahlian' => [
                'required',
                'numeric',
                Rule::unique('tbl_program_keahlian', 'kode_program_keahlian')
                    ->ignore($id, 'id_program_keahlian')
            ],
            'nama_program_keahlian' => 'required'
        ], $messages);

        $programKeahlian = ProgramKeahlian::findOrFail($id);
        $programKeahlian->update([
            'id_bidang_keahlian' => $request->id_bidang_keahlian,
            'kode_program_keahlian' => $request->kode_program_keahlian,
            'program_keahlian' => $request->program_keahlian,
        ]);

        return redirect()->route('admin.program_keahlian.index')->with('success', 'Program Keahlian berhasil diperbarui!');
    }

    /**
     * Hapus program keahlian.
     */
    public function destroy($id)
{
    $program = ProgramKeahlian::where('id_program_keahlian', $id)->firstOrFail();
    $program->delete();
    return redirect()->back()->with('success', 'Program keahlian berhasil dihapus');
}
}
