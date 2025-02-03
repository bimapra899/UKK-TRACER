<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\TahunLulus;
use App\Models\KonsentrasiKeahlian;
use App\Models\StatusAlumni;
use Illuminate\Http\Request;

class AdminAlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::with(['konsentrasiKeahlian', 'tahunLulus', 'tracerKerja', 'tracerKuliah'])
            ->latest()
            ->paginate(10);
            
        return view('admin.alumni.index', compact('alumni'));
    }

    public function create()
    {
        $tahunLulus = TahunLulus::all();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();

        return view('admin.alumni.create', compact('tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:tbl_alumni',
            'nik' => 'required|unique:tbl_alumni',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_tahun_lulus' => 'required|exists:tb_tahun_lulus,id_tahun_lulus',
            'id_konsentrasi_keahlian' => 'required|exists:tbl_konsentrasi_keahlian,id_konsentrasi_keahlian',
        ]);

        Alumni::create($request->all());

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Data alumni berhasil ditambahkan');
    }

    public function edit(Alumni $alumni)
    {
        $tahunLulus = TahunLulus::all();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();

        return view('admin.alumni.edit', compact('alumni', 'tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'nisn' => 'required|unique:tbl_alumni,nisn,' . $alumni->id_alumni . ',id_alumni',
            'nik' => 'required|unique:tbl_alumni,nik,' . $alumni->id_alumni . ',id_alumni',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_tahun_lulus' => 'required|exists:tb_tahun_lulus,id_tahun_lulus',
            'id_konsentrasi_keahlian' => 'required|exists:tbl_konsentrasi_keahlian,id_konsentrasi_keahlian',
        ]);

        $alumni->update($request->all());

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Data alumni berhasil diperbarui');
    }

    public function destroy(Alumni $alumni)
    {
        $alumni->delete();

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Data alumni berhasil dihapus');
    }

    public function show(Alumni $alumni)
    {
        $alumni->load(['konsentrasiKeahlian', 'tahunLulus', 'tracerKerja', 'tracerKuliah', 'testimoni']);
        return view('admin.alumni.show', compact('alumni'));
    }
} 