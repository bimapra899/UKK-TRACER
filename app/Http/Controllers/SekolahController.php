<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::first();
        return view('admin.sekolah.index', compact('sekolah'));
    }

    public function create()
    {
        return view('admin.sekolah.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'npsn' => 'required|string|max:10|unique:tbl_sekolah,npsn',
            'nss' => 'required|string|max:20|unique:tbl_sekolah,nss',
            'nama_sekolah' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'website' => 'nullable|string|max:50',
            'email' => 'required|email|max:50|unique:tbl_sekolah,email',
        ]);

        Sekolah::create($validated);

        return redirect()->route('admin.sekolah.index')
            ->with('success', 'Data sekolah berhasil ditambahkan');
    }

    public function edit(Sekolah $sekolah)
    {
        return view('admin.sekolah.edit', compact('sekolah'));
    }

    public function update(Request $request, Sekolah $sekolah)
    {
        $validated = $request->validate([
            'npsn' => 'required|string|max:10|unique:tbl_sekolah,npsn,'.$sekolah->id_sekolah.',id_sekolah',
            'nss' => 'required|string|max:20|unique:tbl_sekolah,nss,'.$sekolah->id_sekolah.',id_sekolah',
            'nama_sekolah' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'website' => 'nullable|string|max:50',
            'email' => 'required|email|max:50|unique:tbl_sekolah,email,'.$sekolah->id_sekolah.',id_sekolah',
        ]);

        $sekolah->update($validated);

        return redirect()->route('admin.sekolah.index')
            ->with('success', 'Data sekolah berhasil diperbarui');
    }

    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();
        return redirect()->route('admin.sekolah.index')
            ->with('success', 'Data sekolah berhasil dihapus');
    }

    public function showProfile()
    {
        $sekolah = Sekolah::first();
        return view('users.sekolah.profile', compact('sekolah'));
    }
}
