<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admindashboard'); // Mengarahkan ke view adminDashboard.blade.php
        
    }

    
    
}


