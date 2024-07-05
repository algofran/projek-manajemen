<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisdatSerposerveUserUnit extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'visdat_serposerve_user_unit';

    protected $fillable = [
        'user_id',
        'unit_id',
    ];
}
