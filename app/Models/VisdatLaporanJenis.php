<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisdatLaporanJenis extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'mysql2';
    protected $table = 'visdat_laporan_jenis';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the laporan data associated with the jenis.
     */
    public function laporanData()
    {
        return $this->hasMany(VisdatLaporanData::class, 'jenis_id');
    }
}
