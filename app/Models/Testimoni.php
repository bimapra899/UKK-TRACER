<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'tbl_testimoni';
    protected $primaryKey = 'id_testimoni';
    
    protected $fillable = [
        'id_alumni',
        'testimoni',
        'tgl_testimoni'
    ];

    // Cast dates to Carbon instances
    protected $casts = [
        'tgl_testimoni' => 'datetime'
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni');
    }
} 