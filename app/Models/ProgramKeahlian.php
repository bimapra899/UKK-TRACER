<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    
    protected $table = 'tbl_program_keahlian';
    protected $primaryKey = 'id_program_keahlian';
    
    protected $fillable = [
        'id_bidang_keahlian',
        'kode_program_keahlian',
        'program_keahlian'
    ];
        // Debug: tampilkan semua properti yang diset
        protected static function boot()
        {
            parent::boot();
            static::retrieved(function ($model) {
                \Log::info('Model retrieved:', $model->toArray());
            });
        }
    

    // Relasi ke Bidang Keahlian
    public function bidangKeahlian()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bidang_keahlian');
    }

    public function store(Request $request)
{
    $request->validate([
        'bidang_keahlian' => 'required',
        'kode_program_keahlian' => 'required|unique:tbl_program_keahlian,kode_program_keahlian',
        'program_keahlian' => 'required|string|max:255',
    ]);

    ProgramKeahlian::create([
        'bidang_keahlian' => $request->bidang_keahlian,
        'kode_program_keahlian' => $request->kode_program_keahlian,
        'program_keahlian' => $request->program_keahlian,
    ]);

    return redirect()->route('admin.program_keahlian.index')->with('success', 'Program Keahlian berhasil ditambahkan!');
}

}
