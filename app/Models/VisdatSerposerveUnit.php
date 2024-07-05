<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisdatSerposerveUnit extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'visdat_serposerve_unit';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama'
    ];
}
