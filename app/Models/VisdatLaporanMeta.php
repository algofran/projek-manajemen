<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisdatLaporanMeta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'mysql2';
    protected $table = 'visdat_laporan_meta';
    protected $primaryKey = 'id';

    protected $fillable = [
        'meta_key',
        'laporan_id',
        'meta_value',
        'types',
        'user_id'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the laporan associated with the meta.
     */
    public function laporan()
    {
        return $this->belongsTo(VisdatLaporanData::class, 'laporan_id');
    }

    /**
     * Get the user associated with the meta.
     */
    public function user()
    {
        return $this->belongsTo(VisdatSerposerveUserUnit::class, 'user_id');
    }
}
