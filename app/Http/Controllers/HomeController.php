<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Testimoni;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Remove or modify this if it exists
        // $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $testimonials = Testimoni::with(['alumni.user', 'alumni.konsentrasiKeahlian'])
            ->when(auth()->check(), function($query) {
                return $query->latest('tgl_testimoni')->take(4);
            }, function($query) {
                return $query->whereHas('alumni')->latest('tgl_testimoni')->take(4);
            })
            ->get();

        return view('users.home', compact('testimonials'));
    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('admin.adminHome');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }
}
