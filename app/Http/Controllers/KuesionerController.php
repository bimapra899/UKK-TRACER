<?php

namespace App\Http\Controllers;

use App\Models\TracerKerja;
use App\Models\TracerKuliah;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    public function create()
    {
        return view('kuesioner.create');
    }

    public function store(Request $request)
    {
        $alumni = auth()->user()->alumni;
        
        // Validate common fields
        $request->validate([
            'testimoni' => 'required|string',
        ]);

        // Handle Tracer Kerja if submitted
        if ($request->has('is_kerja')) {
            $request->validate([
                'tracer_kerja_pekerjaan' => 'required|string|max:50',
                'tracer_kerja_nama' => 'required|string|max:50',
                'tracer_kerja_jabatan' => 'required|string|max:50',
                'tracer_kerja_status' => 'required|string|max:50',
                'tracer_kerja_lokasi' => 'required|string|max:50',
                'tracer_kerja_alamat' => 'required|string|max:50',
                'tracer_kerja_tgl_mulai' => 'required|date',
                'tracer_kerja_gaji' => 'required|string|max:50',
            ]);

            TracerKerja::create([
                'id_alumni' => $alumni->id_alumni,
                'tracer_kerja_pekerjaan' => $request->tracer_kerja_pekerjaan,
                'tracer_kerja_nama' => $request->tracer_kerja_nama,
                'tracer_kerja_jabatan' => $request->tracer_kerja_jabatan,
                'tracer_kerja_status' => $request->tracer_kerja_status,
                'tracer_kerja_lokasi' => $request->tracer_kerja_lokasi,
                'tracer_kerja_alamat' => $request->tracer_kerja_alamat,
                'tracer_kerja_tgl_mulai' => $request->tracer_kerja_tgl_mulai,
                'tracer_kerja_gaji' => $request->tracer_kerja_gaji,
            ]);
        }

        // Handle Tracer Kuliah if submitted
        if ($request->has('is_kuliah')) {
            $request->validate([
                'tracer_kuliah_kampus' => 'required|string|max:45',
                'tracer_kuliah_status' => 'required|string|max:45',
                'tracer_kuliah_jenjang' => 'required|string|max:45',
                'tracer_kuliah_jurusan' => 'required|string|max:45',
                'tracer_kuliah_linier' => 'required|string|max:45',
                'tracer_kuliah_alamat' => 'required|string|max:45',
            ]);

            TracerKuliah::create([
                'id_alumni' => $alumni->id_alumni,
                'tracer_kuliah_kampus' => $request->tracer_kuliah_kampus,
                'tracer_kuliah_status' => $request->tracer_kuliah_status,
                'tracer_kuliah_jenjang' => $request->tracer_kuliah_jenjang,
                'tracer_kuliah_jurusan' => $request->tracer_kuliah_jurusan,
                'tracer_kuliah_linier' => $request->tracer_kuliah_linier,
                'tracer_kuliah_alamat' => $request->tracer_kuliah_alamat,
            ]);
        }

        // Create testimoni
        Testimoni::create([
            'id_alumni' => $alumni->id_alumni,
            'testimoni' => $request->testimoni,
            'tgl_testimoni' => now(),
        ]);

        return redirect()->route('home')->with('success', 'Kuesioner berhasil disimpan!');
    }
} 