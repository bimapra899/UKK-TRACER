<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusAlumni extends Model
{
    protected $table = 'tbl_status_alumni';
    protected $primaryKey = 'id_status_alumni';
    
    protected $fillable = [
        'status'
    ];
} 