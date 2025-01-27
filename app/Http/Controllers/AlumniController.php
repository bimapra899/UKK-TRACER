<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\TahunLulus;
use App\Models\KonsentrasiKeahlian;
use App\Models\StatusAlumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlumniController extends Controller
{
    public function create()
    {
        $tahunLulus = TahunLulus::all();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();

        return view('alumni.register', compact('tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
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

        $alumni = new Alumni($request->all());
        $alumni->user_id = auth()->id();
        $alumni->email = auth()->user()->email;
        $alumni->password = Hash::make('password'); // Set default password
        $alumni->id_status_alumni = 1; // Set default status
        $alumni->save();

        return redirect()->route('home')->with('success', 'Registrasi alumni berhasil!');
    }
} 