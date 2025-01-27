<?php

namespace App\Http\Controllers;

use App\Models\BidangKeahlian;
use Illuminate\Http\Request;

class BidangKeahlianController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bidangKeahlians = BidangKeahlian::all(); // Fetch all records
        return view('admin.bidang_keahlian.index', compact('bidangKeahlians')); // Pass data to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bidang_keahlian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'kode_bidang_keahlian' => 'required|unique:tbl_bidang_keahlian,kode_bidang_keahlian',
            'bidang_keahlian' => 'required',
        ]);

        // Create a new record
        BidangKeahlian::create([
            'kode_bidang_keahlian' => $request->kode_bidang_keahlian,
            'bidang_keahlian' => $request->bidang_keahlian,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to the index page with success message
        return redirect()->route('admin.bidang_keahlian.index')->with('success', 'Bidang keahlian created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BidangKeahlian $bidangKeahlian)
    {
        return view('admin.bidang_keahlian.show', compact('bidangKeahlian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BidangKeahlian $bidangKeahlian)
    {

        return view('admin.bidang_keahlian.edit', compact('bidangKeahlian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BidangKeahlian $bidangKeahlian)
    {
 
        // Validate the input
        $request->validate([
            'kode_bidang_keahlian' => 'required',
            'bidang_keahlian' => 'required',
        ]);

    
        // Update the record
        $bidangKeahlian->update([
            'kode_bidang_keahlian' => $request->kode_bidang_keahlian,
            'bidang_keahlian' => $request->bidang_keahlian,
        ]);

        // Redirect to the index page with success message
        return redirect()->route('admin.bidang_keahlian.index')->with('success', 'Bidang Keahlian updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BidangKeahlian $bidangKeahlian)
    {
        //$bidangKeahlian = BidangKeahlian::where('id_bidang_keahlian',$id)->first();
   
        // Delete the record
        $bidangKeahlian->delete();

        // Redirect to the index page with success message
        return redirect()->route('admin.bidang_keahlian.index')->with('success', 'Bidang keahlian deleted successfully.');
    }

    public function programKeahlian()
{
    return $this->hasMany(ProgramKeahlian::class, 'id_bidang_keahlian');
}

}
