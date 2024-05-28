<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenTahun extends Model
{
    use HasFactory;
    protected $table = 'dokumens_projeks';
    protected $guarded = ['id'];
}
