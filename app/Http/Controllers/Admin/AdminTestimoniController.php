<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminAlumniController;
use App\Http\Controllers\Admin\AdminTracerController;
class AdminTestimoniController extends Controller
{
    protected $routeMiddleware = [
        // ... existing middlewares ...
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];

    public function index()
    {
        $testimoni = Testimoni::with('alumni')->latest()->paginate(10);
        return view('admin.testimoni.index', compact('testimoni'));
    }

    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();
        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil dihapus');
    }
} 