<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisdatLaporanBbm extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'mysql2';
    protected $table = 'visdat_laporan_bbm';
    protected $primaryKey = 'id';

    protected $fillable = [
        'unit_id',
        'user_id',
        'jumlah',
        'kilometer',
        'tanggal',
        'images'
    ];

    protected $dates = ['tanggal', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the unit associated with the laporan BBM.
     */
    public function unit()
    {
        return $this->belongsTo(VisdatSerposerveUnit::class, 'unit_id');
    }

    /**
     * Get the user associated with the laporan BBM.
     */
    public function user()
    {
        return $this->belongsTo(VisdatSerposerveUserUnit::class, 'user_id');
    }
}
