<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisdatSerposerveTelegram extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'visdat_serposerve_telegram';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'unit_id'
    ];

    /**
     * Get the unit associated with the serposerve telegram.
     */
    public function unit()
    {
        return $this->belongsTo(VisdatSerposerveUnit::class, 'unit_id');
    }
}
