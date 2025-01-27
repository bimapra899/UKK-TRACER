<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;

class AdminAlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::with(['konsentrasiKeahlian', 'tahunLulus'])->latest()->paginate(10);
        return view('admin.alumni.index', compact('alumni'));
    }

    // Add other CRUD methods as needed
} 