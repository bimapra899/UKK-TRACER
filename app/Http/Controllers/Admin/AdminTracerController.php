<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TracerKerja;
use App\Models\TracerKuliah;
use Illuminate\Http\Request;

class AdminTracerController extends Controller
{
    public function kerja()
    {
        $tracerKerja = TracerKerja::with('alumni')->latest()->paginate(10);
        return view('admin.tracer.kerja', compact('tracerKerja'));
    }

    public function kuliah()
    {
        $tracerKuliah = TracerKuliah::with('alumni')->latest()->paginate(10);
        return view('admin.tracer.kuliah', compact('tracerKuliah'));
    }
} 