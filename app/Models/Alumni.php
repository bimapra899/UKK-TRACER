<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'tbl_alumni';
    protected $primaryKey = 'id_alumni';
    
    protected $fillable = [
        'user_id',
        'id_tahun_lulus',
        'id_konsentrasi_keahlian',
        'id_status_alumni',
        'nisn',
        'nik',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'no_hp',
        'akun_fb',
        'akun_ig',
        'akun_tiktok',
        'email',
        'password',
        'status_login'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function konsentrasiKeahlian()
    {
        return $this->belongsTo(KonsentrasiKeahlian::class, 'id_konsentrasi_keahlian', 'id_konsentrasi_keahlian');
    }

    public function tahunLulus()
    {
        return $this->belongsTo(TahunLulus::class, 'id_tahun_lulus', 'id_tahun_lulus');
    }

    public function tracerKerja()
    {
        return $this->hasOne(TracerKerja::class, 'id_alumni');
    }

    public function tracerKuliah()
    {
        return $this->hasOne(TracerKuliah::class, 'id_alumni');
    }

    public function testimoni()
    {
        return $this->hasMany(Testimoni::class, 'id_alumni');
    }
} 