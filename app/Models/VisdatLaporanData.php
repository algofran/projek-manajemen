<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisdatLaporanData extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'mysql2';
    protected $table = 'visdat_laporan_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'keterangan',
        'unit_id',
        'bulan',
        'tahun',
        'user_id',
        'jenis_id',
        'status',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the unit associated with the laporan data.
     */
    public function unit()
    {
        return $this->belongsTo(VisdatSerposerveUnit::class, 'unit_id');
    }

    /**
     * Get the user associated with the laporan data.
     */
    public function user()
    {
        return $this->belongsTo(VisdatSerposerveUserUnit::class, 'user_id');
    }

    /**
     * Get the jenis associated with the laporan data.
     */
    public function jenis()
    {
        return $this->belongsTo(VisdatLaporanJenis::class, 'jenis_id');
    }
}
